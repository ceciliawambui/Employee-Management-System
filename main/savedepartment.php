<?php
session_start();
include('../connect.php');
$a = $_POST['department'];

// query
$sql = "INSERT INTO departments (department_name) VALUES (:a)";
$q = $link->prepare($sql);
$q->execute(array(':a'=>$a));
header("location: department.php");


?>