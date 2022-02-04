<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $link->prepare("DELETE FROM employees WHERE employee_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>