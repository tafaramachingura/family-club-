<html>
<head>
<?php require('db.php');
session_start(); ?>
<link rel='stylesheet' href='css/bootstrap.min.css'>
<link rel='stylesheet' href='css/bootstrap-theme.css'>
<link rel='stylesheet' href='css/style.css'>
<title>Family Club Login</title>
</head>
<body>
<br></br>
<div class='col-lg-12 col-md-10  col-sm-4'>
<div class='container'>
<div class='form' role='form'>
<form class='login' method='post'>
<div class='form-group' >

<div class='col-lg-5 col-md-4 col-sm-3 '>
<span id='error' class='alert-danger'></span>
 <h2 style='text-align:center'>Please Sign in</h2>
<input type='email' class='form-control' placeholder='email' name='name'  minlength='4' maxlength='20' required>
<br>
<input type='password' class='form-control' name="password" placeholder='password' minlength='4' maxlength='8' required>
<br>
<button type='submit' class='btn btn-primary form-control' > Sign In  <i class='glyphicon glyphicon-log-in'></i> </button>
<p> not a member yet? <a href='register.php' target='blank'> click to register</a></p>

</form>
</div>

<div class='form-group'>

</div>
</div>
</div> 
</div>
</div>
<?php  if($_POST){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$qr=mysqli_query($con,"select * from users where email='".$name."' and password='".$password."'");
	$row=mysqli_fetch_assoc($qr);
	
	if(mysqli_num_rows($qr)>0){
		$_SESSION['user']=$row['name'];
		       if($row['role']=='admin'){
		         echo "<script> window.location.href='admin/index.php'</script>";
		              }
		             else{
		         echo "<script> window.location.href='users/info.php'</script>";

		                }
	    }
	else{
		echo "<script>
var err=document.getElementById('error');
err.innerHTML='invalid username or password'
		</script>";
	}
	
		
	
}?>
<script src="jquery-3.5.1.min.js"></script>
<script src="bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.bundle.js"></script>
<script src="bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.js"></script>

</body>

</html>