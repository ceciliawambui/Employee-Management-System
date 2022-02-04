<?php
session_start();
include('../connect.php');
$a = $_POST['job_title'];

// query
$sql = "INSERT INTO job_titles (job_title) VALUES (:a)";
$q = $link->prepare($sql);
$q->execute(array(':a'=>$a));
header("location: job_title.php");


?>