<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $link->prepare("DELETE FROM job_titles WHERE job_title_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>