<?php
session_start();
include('mailer/sendEmail.php');
// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'company-sky');


// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        $errmsg_arr[] = 'The two passwords do not match';
        $errflag = true;

    }
    if ($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("location: register.php");
        exit();
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            $errmsg_arr[] = 'Username exists';
            $errflag = true;


        }

        if ($user['email'] === $email) {
            $errmsg_arr[] = 'Email already exist';
            $errflag = true;
        }
    }

    if ($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("location: register.php");
        exit();
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = ($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        $results = mysqli_query($db, $query);

        if (!$results) {
            var_dump("error");
            $errmsg_arr[] = 'There was an error. try again!';
            $errflag = true;
        } else {
            var_dump("success");
            $user = mysqli_fetch_assoc($results);
            sendMail($user->name, $user->email,"subject", "Some text");
            $errflag = false;
            $_SESSION['success'] = "Sucessfully registered..please login";
        }
        session_write_close();
        header("location: index.php");
        exit();
    }
}


?>