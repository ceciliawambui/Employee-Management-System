<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['job_title'];

// query
$sql = "UPDATE job_titles
        SET job_title=?
		WHERE id=?";
$q = $link->prepare($sql);
$q->execute(array($a,$id));
header("location: job_title.php");

?>