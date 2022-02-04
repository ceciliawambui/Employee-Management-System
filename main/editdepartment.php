<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $link->prepare("SELECT * FROM departments WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditdepartment.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Department</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Department Name : </span><input type="text" style="width:265px; height:30px;" name="department" value="<?php echo $row['department_name']; ?>" /><br>

<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>