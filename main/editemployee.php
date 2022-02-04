<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $link->prepare("SELECT * FROM employees WHERE employee_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditemployee.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Employee</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<span>First Name : </span><input type="text" style="width:265px; height:30px;" name="first_name" value="<?php echo $row['first_name']; ?>" /><br>
<span>Last Name : </span><input type="text" style="width:265px; height:30px;" name="last_name" value="<?php echo $row['last_name']; ?>" /><br>
<span>Email : </span><input type="text" style="width:265px; height:30px;" name="email" value="<?php echo $row['email']; ?>" /><br>


<span>Department :</span>
<select name="department"  style="width:265px; height:30px; margin-left:-5px;" >
<option></option>
	<?php
	include('../connect.php');
	$result = $link->prepare("SELECT * FROM departments");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	
		<option value="<?PHP echo $row['id']; ?>" > <?PHP echo $row['department_name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Job Title :</span>
<select name="job"  style="width:265px; height:30px; margin-left:-5px;" >
<option></option>
	<?php
	include('../connect.php');
	$result = $link->prepare("SELECT * FROM job_titles");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option value="<?PHP echo $row['id']; ?>" > <?PHP echo $row['job_title']; ?></option>
		
	<?php
	}
	?>
</select><br>


<!-- <span>Job Title : </span><input type="text" style="width:265px; height:30px;" name="job" value="<?php echo $row['job_title_id']; ?>" /><br>
<span>Department : </span><input type="text" style="width:265px; height:30px;" name="department" value="<?php echo $row['department_id']; ?>" /><br> -->
<span>Salary : </span><input type="number" style="width:265px; height:30px;" name="salary" value="<?php echo $row['salary']; ?>" /><br>

<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>