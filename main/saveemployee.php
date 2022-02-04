<?php
session_start();
include('../connect.php');
include('../mailer/sendEmail.php');
$a = $_POST['first'];
$b = $_POST['last'];
$c = $_POST['email'];
$d = $_POST['job'];
$e = $_POST['department'];
$f = $_POST['salary'];

// query
$sql = "INSERT INTO employees (first_name,last_name,email, job_title_id, department_id, salary) VALUES (:a,:b,:c,:d,:e,:f)";
$q = $link->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':f'=>$f));
if (!$q) {
    $errmsg_arr[] = 'There was an error. try again!';
    $errflag = true;
} else {

    $userId = $link->lastInsertId();
    $stmt = $link->prepare("SELECT * FROM employees WHERE employee_id=?");
    $stmt->execute([$userId]);
    $user = $stmt->fetchObject();
  
   sendMail($user->email, $user->name,"Congratulations", "Welcome to Sky Technologies!");
   
   $errflag = false;
   $_SESSION['success'] = "Sucessfully registered..please login";
}
header("location: employees.php");


?>