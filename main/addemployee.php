<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.css" rel="stylesheet">
<form action="saveemployee.php" method="post">
<center><h4><i class="icon-plus-sign icon-small"></i> Add Employee</h4></center>
<hr>
<div id="ac">
<span>First Name : </span><input type="text" style="width:265px; height:30px;" name="first" placeholder="First Name" Required/><br>
<span>Last Name : </span><input type="text" style="width:265px; height:30px;" name="last" placeholder="Last Name" Required/><br>
<span>Email: </span><input type="text" style="width:265px; height:30px;" name="email" placeholder="Email" Required/><br>
<!-- <span>Job Title : </span><input type="text" style="width:265px; height:30px;" name="job" placeholder="Job Title" Required/><br> -->
<span>Salary</span><input type="number" style="width:265px; height:30px;" name="salary" placeholder="Salary"/><br>


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
     <!-- </span><input type="text" style="width:265px; height:30px;" name="department" placeholder="Department"/><br> -->
<!-- <span>Salary</span><input type="number" style="width:265px; height:30px;" name="salary" placeholder="Salary"/><br> -->
<!-- <span>Product Name : </span><textarea style="height:70px; width:265px;" name="prod_name"></textarea><br> -->
<!-- <span>Total: </span><input type="text" style="width:265px; height:30px;" name="memno" placeholder="Total"/><br> -->
<!-- <span>Note : </span><textarea style="height:60px; width:265px;" name="note"></textarea><br> -->
<!-- <span>Expected Date: </span><input type="date" style="width:265px; height:30px;" name="date" placeholder="Date"/><br> -->
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
