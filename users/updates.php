
<?php session_start(); 
 ?>
<html>
<head>
<?php  require('../db.php');?>
<link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/bootstrap-theme.css'>
<link rel='stylesheet' href='../css/style.css'>
<title>Family Club Admin</title>
<style>
#referals{
	border:1px solid #bbb;
}
</style>
</head>
<body>
<div class='container'>
<nav class='navbar navbar-inverse'>
<ul class='nav navbar-nav'>
<li><a href='../changepass.php'><i class='glyphicon glyphicon-lock'></i> Change Password</a></li>
<li><a href='updates.php'><i class='glyphicon glyphicon-level-up'></i> Updates</a></li>
<li><a href='../logout.php'><i class='glyphicon glyphicon-log-out'></i> Logout</a></li></ul>
</nav>
<div class='col-sm-4 col-md-6 col-lg-6'>
<?php require('../db.php');?>

</div>
</body>
</html>