<!DOCTYPE html>
<html>
<head>
<title>
EMS
</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
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
<?php
require_once('auth.php');
?>
<?php
function createRandomPassword()
{
	$chars = "003232303232023232023456789";
	srand((double)microtime() * 1000000);
	$i = 0;
	$pass = '';
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode = 'RS-' . createRandomPassword();
?>
</head>

<body style="background:white" >
<?php include('navfixed.php'); ?>
	<?php
$position = $_SESSION['SESS_LAST_NAME']; ?>
	
	
	<div class="container">
	<div class="contentheader">
			<i class="icon-dashboard"></i> Dashboard
			</div>
			<ul class="breadcrumb">
			<li class="active">Dashboard</li>
			</ul>
<div id="mainmain">
<a href="department.php">
	<article class="links four">
		<i class="icon-group icon-4x"></i><br>Departments
	</article>
</a> 

<a href="job_title.php">
	<article class="links two">
		<i class="icon-list-alt icon-4x"></i><br>Job Titles
	</article>
</a> 

<a href="employees.php">
	<article class="links three">
		<i class="icon-group icon-4x"></i><br>Employees
	</article>
</a>   


<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</body>
<?php include('footer.php'); ?>
</html>
