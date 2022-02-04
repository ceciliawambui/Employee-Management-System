<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['id'];
$a = $_POST['first_name'];
$b = $_POST['last_name'];
$c = $_POST['email'];
$d = $_POST['job_title_id'];
$e = $_POST['department_id'];
$f = $_POST['salary'];
// $f = $_POST['note'];
// $g = $_POST['date'];
// query
$sql = "UPDATE employees 
        SET first_name=?, last_name=?,email=?, job_title_id=?, department_id=?, salary=?
		WHERE employee_id=?";
$q = $link->prepare($sql);
$q->execute(array($a,$b,$c,$d,$e,$f,$id));
header("location: employees.php");

?>