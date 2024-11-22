<html>
<head>
<?php  require('db.php');?>
<link rel='stylesheet' href='css/bootstrap.min.css'>
<link rel='stylesheet' href='css/bootstrap-theme.css'>
<link rel='stylesheet' href='css/style.css'>
<title>Family Club Registration</title>

</head>
<body>
<br></br>
<div class='col-lg-12 col-md-10  col-sm-4'>
<div class='container'>
<div class='register' role='form'>
<span id='error' class='alert-danger'></span>
<span id='success' class='alert-success'></span>
 <h2 class='navbar-inverse register-head' >Family club registration</h2>
<form class='form-horizontal' role='form' id='rg' method='post' enctype='multipart/form-data'>
<div class='form-group' >

<div class='col-sm-4'><label for='name' class='control-label'>Name </label><input type='text' name='name' class='form-control' placeholder='first name'  minlength='4' maxlength='32' required></div>

<div class='col-sm-4'><label for='surname' class='control-label' > Surname</label><input type='text' name='surname' class='form-control' placeholder='surname' minlength='4' maxlength='32' required>
</div>
</div>

<div class='form-group' >
<div class='col-sm-4'><label for='address' class='control-label' > Home Address </label><input type='text' name='address' class='form-control' placeholder='Home Address' minlength='4' maxlength='32' required>

</div>
<div class="col-sm-4"><label for='cell'>Cell Number</label><input type='text' placeholder='+263789034456' name='cell' class='form-control' required></div>


</div>
<div class='form-group'>
<div class='col-sm-4'><label for='secname' class='control-label' > Password</label><input type='password' name='pass' class='form-control' placeholder='password' minlength='4' maxlength='16' required>
</div>

<div class='col-sm-4'><label for='name' class='control-label' >Refered by </label>
<select class='form-control' name='refid' required>
<option></option>
<?php $s=mysqli_query($con,"select * from users, referals where referals.child=users.user_id and referals.status=1 and users.role!='admin'");
while($ro=mysqli_fetch_assoc($s)){
 ?>
<option value="<?php echo $ro['user_id']?>"> <?php echo $ro['name'].' '.$ro['surname']?></option>
<?php
}
?>
</select>
</div>
</div>

<div class='form-group'>
<div class="col-sm-4"><label for='email'>Email</label><input type='email' placeholder='example@gmail.com' name='email' class='form-control' required></div>
<div class="col-sm-4"><label for='email'>National ID</label><input type='text' placeholder='national id' name='natid' class='form-control' required></div>

</div>

<div class='form-group'>
<div class='col-sm-4'><label for='payment' class='control-label' >Proof of payment <a>$100</a></label><input type='file' name='payment' class='form-control' required>
</div>

<!--<div class='col-sm-4'><label for='senior' class='control-label' >Please Not you are paying</label> &nbsp;<a href='#'><?php $q=mysqli_query($con,'SELECT * from levels, users where levels.levID=4 and users.level=4');
while($row=mysqli_fetch_assoc($q)){
	echo $row['name'].' '.$row['surname']; 
}
?></a>
</div>
-->
</div>

<div class='col-lg-7 col-md-6 col-sm-4'>
<button class='btn btn-primary form-control'>Register</button>
<br><br>
 <a href='index.php' class='btn btn-primary'>Sign In</a>
</div>
</br>
</form>

<div class='form-group'>

</div>
</div>
</div> 
</div>
</div>

<script src="jquery-3.5.1.min.js"></script>
<script src="bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.bundle.js"></script>
<script src="bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.js"></script>
<?php 

if($_POST){
	// validation code
	$n = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
	// end of validation code
	//begining of sql 
	$name=mysqli_real_escape_string($con,$_POST['name']);
		$address=mysqli_real_escape_string($con,$_POST['address']);

	$surname=mysqli_real_escape_string($con,$_POST['surname']);
	$celln=mysqli_real_escape_string($con,$_POST['cell']);
	$refid=$_POST['refid'];
	$pass=mysqli_real_escape_string($con,$_POST['pass']);
		$natID=mysqli_real_escape_string($con,$_POST['natid']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$payment=$_FILES['payment']['name'];
		// first we need to locate the parent
		//$a=mysqli_query($con,"select user from referals where refered='".$refid."'");
		
		
		// checking to see if user have already refered more than 2  users
		$c=mysqli_query($con,"select * from referals, users where referals.parent=users.user_id and referals.parent='".$refid."' ");
			$cell='/^([+]{1})+([0-9])+$/';
			//checking if user exists
$s=mysqli_query($con,"select * from users where name='".$name."' && surname='".$surname."' or email='".$email."'");

//validation of form feilds
		 if(!preg_match($n,$name) or !preg_match($n,$surname)){
					echo "<script>
var err=document.getElementById('error');
err.innerHTML='enter text only for name , surname or second name'
		</script>";
		}
		else if(!preg_match($cell,'+078344444'))
           {
	         								echo "<script>
var err=document.getElementById('error');
err.innerHTML='invalid cell number'
		</script>";
           }
		else if(!preg_match($emailValidation,$email))
		{
								echo "<script>
var err=document.getElementById('error');
err.innerHTML='enter valid email address'
		</script>";
		}
		else if(mysqli_num_rows($s)>0){
									echo "<script>
var err=document.getElementById('error');
err.innerHTML='user already exist'
		</script>";
	
}
		else if(mysqli_num_rows($c)>=2)
		{
										echo "<script>
var err=document.getElementById('error');
err.innerHTML='The selected user have already refered more than 2 people'
		</script>";
		}

		else {
			$succ=mysqli_query($con,"insert into `users` (`name`,`address`,`surname`,`cell`,`nat_id`,`level`,`password`,`email`,`role`) values('".$name."',
			'".$address."','".$surname."', '".$celln."','".$natID."',1,'".$pass."','".$email."','user') ");
			$inserted=mysqli_query($con,"select user_id from users ORDER by user_id DESC limit 1");
			$rw=mysqli_fetch_assoc($inserted);
			$id=$rw['user_id'];
     if( mysqli_query($con ,"insert into `referals` (`child`,`parent`,`status`) values('".$id."','".$refid."',0) ")){
		 
	        move_uploaded_file($_FILES['payment']['tmp_name'], 'uploads/'.$payment);
			$date=date('Y-m-d');
             $pynt=mysqli_query($con,"insert into `payments` (`user_id`,`value`,`date`) values('".$id."',  '".$payment."', '".$date."') " );
	  							echo "<script>
var err=document.getElementById('success');
err.innerHTML='Registration complete you can now sign in';
		</script>";
		}
		
}
}

?>
</body>

</html>