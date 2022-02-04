<html>
<head>
<title>
EMS
</title>
<?php
require_once('auth.php');
?>
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<style type="text/css">
	body {
	padding-top: 60px;
	padding-bottom: 40px;
	}
	.sidebar-nav {
	padding: 9px 0;
	}
</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('a[rel*=facebox]').facebox({
	loadingImage : 'src/loading.gif',
	closeImage   : 'src/closelabel.png'
})
})
</script>
</head>


<body style="background:white" >
<?php include('navfixed.php'); ?>

	<div class="container">
	<div class="contentheader">
			<i class=""></i> Employees
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li> /
			<li class="active">Employees</li>
			</ul>

		<div class="dash-links container">
			<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon-dashboard icon-2x"></i> DashBoard</button></a>
			<a  href="job_title.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon-list-alt icon-2x"></i> Job Titles</button></a>
			<a  href="employees.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon-group icon-2x"></i> Employees</button></a>
			<a  href="department.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon-group icon-2x"></i> Departments</button></a>
			
		</div>
	<div>
			<?php 
		include('../connect.php');
		$result = $link->prepare("SELECT * FROM employees ORDER BY employee_id DESC");
		$result->execute();
		$rowcount = $result->rowcount();
		?>
				<div style="text-align:center; margin-bottom: 10px;">
				Total Number of Employees: <span style="color: #fff; font-size: 12pt; background:#388E3C; width:200px; margin: auto; padding: 5px; border-radius: 10px;" class="badge"><?php echo $rowcount; ?></span>
				</div>
	</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Search Employee..." autocomplete="off" />
<a rel="facebox" href="addemployee.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add Employee</button></a><br><br>

<div class="table-container">
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%"> First Name</th>
            <th width="17%"> Last Name</th>
            <th width="17%"> Email</th>
            <th width="17%"> Job Title </th>
            <th width="17%"> Department Name</th>
			<th width="10%"> Salary</th>
			<th width="14%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
		include('../connect.php');
	
		// SELECT * FROM employees ORDER BY employee_id DESC

		$result = $link->prepare("SELECT employee_id, first_name, last_name, email, job_title,department_name, salary
		FROM
		employees
		LEFT JOIN
		job_titles ON job_titles.id = employees.job_title_id
		LEFT JOIN 
		departments ON departments.id = employees.department_id");
		$result->execute();
		for ($i = 0; $row = $result->fetch(); $i++) {
			?>
			<tr class="record">
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['job_title']; ?></td>
			<td><?php echo $row['department_name']; ?></td>
            <td><?php echo $row['salary']; ?></td>
	

			<td><a  title="Click To Edit Employee" rel="facebox" href="editemployee.php?id=<?php echo $row['employee_id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
			<a href="#" id="<?php echo $row['employee_id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
			</tr>
			<?php

	}
	?>
		
	</tbody>
</table>
</div>
<div class="clearfix"></div>

</div>
</div>
</div>
<script src="js/jquery.js"></script>
	<script type="text/javascript">
		$(function() {


		$(".delbutton").click(function(){

			//Save the link in a variable called element
			var element = $(this);

			//Find the id of the link that was clicked
			var del_id = element.attr("id");

			//Build a url to send
			var info = 'id=' + del_id;
			if(confirm("Are you sure want to delete? There is NO undo!"))
			{
				$.ajax({
				type: "GET",
				url: "deleteemployee.php",
				data: info,
				success: function(){	
			}
			});
			$(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
				.animate({ opacity: "hide" }, "slow");
			}
			return false;
			});
		});
	</script>
</body>
<?php include('footer.php'); ?>

</html>