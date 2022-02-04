<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $link->prepare("DELETE FROM departments WHERE id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>

