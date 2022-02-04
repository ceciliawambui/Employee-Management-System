<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['department'];

// query
$sql = "UPDATE departments
        SET department_name=?
		WHERE id=?";
$q = $link->prepare($sql);
$q->execute(array($a,$id));
header("location: department.php");

?>