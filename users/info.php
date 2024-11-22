
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


      <div id="view">


  <div id='inner-view' class="animated zoomIn">
  <i class='glyphicon glyphicon-remove close'  data-dismiss="modal"></i>
  <img src="" id="views">

  </div>

                </div>

<div class='container'>
<nav class='navbar navbar-inverse'>
<ul class='nav navbar-nav'>
<li><a href=''><i class='glyphicon glyphicon-lock'></i> Change Password</a></li>
<li><a href='updates.php'><i class='glyphicon glyphicon-level-up'></i> Updates</a></li>
<li><a href='../logout.php'><i class='glyphicon glyphicon-log-out'></i> Logout</a></li></ul>
</nav>
<div class='col-sm-4 col-md-6 col-lg-6'>
<?php require('../db.php');

$sl= mysqli_query($con,"select * from users,levels where users.name= '".$_SESSION['user']."' and levels.levID=users.level");
$row=mysqli_fetch_assoc($sl);
$stats=$row['user_id'];
$status=mysqli_query($con,"select * from referals where child='".$stats."'");
$sr=mysqli_fetch_assoc($status);
if($sr['status']==0){
	echo "<h3 class='text-danger'>approval pending</h3>";
}
 echo ('<h3>welcome'.' '."<span class ='text-danger'>". $_SESSION['user']."</span>".' '.'you are at level '.' ' .$row['levID'].' '."<strong>(".$row['levName'] ."</strong>)</h3>");

  

      
?>
<br>
  <h4>Your Payment</h4>
  <?php  $ps=mysqli_query($con,"SELECT *  FROM users, payments WHERE payments.user_id= users.user_id and users.name='".$_SESSION['user']."'");
  $rm=mysqli_fetch_assoc($ps);

  ?>
  <table class='table table-responsive table-striped'>
 <tr> <th>Payment Date</th>   <th>Recipt</th> <th>Amount</th></tr>
<tr> <td><?php echo $rm['date']?></td>  <td><?php echo '<img src="../uploads/'.$rm['value'].'" class="zoom py" onclick= "return zoom(this)">' ?></td> <td>$100</td></tr>
  
  </table>
  <?php if($row['levID']==4){
	  $xbb=mysqli_query($con,"SELECT * from payments, users where payments.payed_to='".$rm['user_id']."' and users.user_id =payments.user_id");
	  echo "<h4 >you have recieved payments from</h4>"?>
	   <table class='table table-responsive table-striped'>
	   <tr>  <th>Name</th><th>Amount</th> </tr>
	   <?php while($rg=mysqli_fetch_assoc($xbb)){
		   ?>
		   <tr>  <td><?php echo $rg['name']?></td> <td>$100</td> </tr>
		
		   <?php
		   
	   }?>
	   <tr> <td><strong>Total</strong></td> <td><strong>$800</strong></td></tr>
	   </table>
	   <button class='btn btn-primary' id="<?php echo $row['user_id']?>" onclick="reset(this.id)">Confirm Payment</button> 
	  <?php
	  
  }?>
</div>

<div class='col-sm-4 col-md-4 col-lg-5' id="referals">

<h3 class='btn btn-primary form-control'> Referals Historry</h3>

<?php
//getting user id
$m=mysqli_query($con,"select user_id from users where users.name='".$_SESSION['user']."'");
$k=mysqli_fetch_assoc($m);



// fetching children of this user
$m1=mysqli_query($con,"SELECT * from referals ,users where referals.parent='".$k['user_id']."' and users.user_id=referals.child");
?>
<h3>You refered</h3>
<ol>
<?php
if(mysqli_num_rows($m1)==0){
	
	echo "<span class='alert-danger'>0 referals</span>";
}
while($s=mysqli_fetch_assoc($m1))
{
	?>
<li class='btn-default form-control'><a href="?user=<?php echo $s['user_id']?>"><?php echo $s['name'].' '. $s['surname'] ?></a>
	&nbsp;&nbsp;<a><?php if($s['status']==0){ echo "<i class='text-danger'>pedding</i>" ;} ?></a></li> 
<?php
}
 ?>
 </ol>
  <?php if($_GET){
      if($_GET['user']){
		 $user=$_GET['user']; 
	 $sx=mysqli_query($con,"select* from users where user_id='".$_GET['user']."'");
	 $x=mysqli_fetch_assoc($sx);
	 $name=$x['name'].' '.$x['surname'];
	echo "<h3>".$name.' '."refered</h3>";
	?>
	    <ol>
	  <?php
	//chidren of the first parent
	        $m2=mysqli_query($con,"SELECT * from referals ,users where referals.parent='".$_GET['user']."' and users.user_id=referals.child");
      
              if(mysqli_num_rows($m2)==0){
	        echo "<span class='alert-danger'>0 referals</span>";
             }
	         while($row=mysqli_fetch_assoc($m2))
	            {
		 
		      $u=$_GET['user'];   
	           ?>
	
	         <li class='btn-default form-control'><a href="?secondchildren=<?php echo $row['user_id'];?>&user=<?php echo $u;?>"><?php echo $row['name'].' '.$row['surname'] ?></a>

               &nbsp;&nbsp;<a><?php if($row['status']==0){ echo "<i class='text-danger'>pedding</i>" ;} ?></a>
	         </li> 

	
	       <?php 
	       }
	       ?>
	        </ol>
			   <?php 
			          
				   ?>
	      <?php 
            }        if(@$_GET['secondchildren'])
                       {
                       $secondchildren=$_GET['secondchildren'];
					   
					    $dx=mysqli_query($con,"select* from users where user_id='".$secondchildren."'");
	                   $vb=mysqli_fetch_assoc($dx);
	                    $name1=$vb['name'].' '.$vb['surname'];
	                  echo "<h3>".$name1.' '."refered</h3>";
	                  $m3=mysqli_query($con,"SELECT * from referals ,users where referals.parent='".$_GET['secondchildren']."' and users.user_id=referals.child");

         
	                  if(mysqli_num_rows($m3)==0){
	                  echo "<span class='alert-danger'>0 referals</span>";
                         }

 
                       ?>
		               <ol >
                       <?php		   
	                  while($res=mysqli_fetch_assoc($m3))
	                    {
		 
		               $sc=$_GET['secondchildren'];   
	                   ?>
	
	                   <li class=' btn-default form-control' ><a href="?secondchildren=<?php echo $sc;?>&thirdchild=<?php echo $res['user_id'];?>&user=<?php echo $u;?>"><?php echo $res['name'].' '.$res['surname'] ?></a>

                               &nbsp;&nbsp;<a><?php if($res['status']==0){ echo "<i class='text-danger'>pedding</i>" ;} ?></a>
	                   </li> 

	
	                     <?php 
	                     }
	                   ?>
	                   </ol>
                       <?php 	   
                        }
						         if(@$_GET['thirdchild']){
									 
								
									     $thirdchild=$_GET['thirdchild'];
					   
					           $last=mysqli_query($con,"select * from users where user_id='".$thirdchild."'");
	                          $lst=mysqli_fetch_assoc($last);
	                             $lastname=$lst['name'].' '.$lst['surname'];
	                           echo "<h3>".$lastname.' '."refered</h3>";
					  
					  	                  $m4=mysqli_query($con,"SELECT * from referals ,users where referals.parent='".$thirdchild."' and users.user_id=referals.child");

										  	                  if(mysqli_num_rows($m4)==0){
	                                     echo "<span class='alert-danger'>0 referals</span>";
                                     }?>
					                  <ol>
                       <?php		   
	                               while($res2=mysqli_fetch_assoc($m4))
	                                {
		 
		                           
	                                 ?>
	
	                            <li class=' btn-default form-control'><a>  <?php echo $res2['name'].' '. $res2['surname']?></a>

                                     &nbsp;&nbsp;<a><?php if($res2['status']==0){ echo "<i class='text-danger'>pedding</i>" ;} ?></a>
	                            </li> 

	
	                               <?php 
	                               }
	                              ?>
	                              </ol>
								  <?php
								        }
						
                       }?>
</div>
</div>

<script src="../jquery-3.5.1.min.js"></script>
<script src="../bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.bundle.js"></script>
<script src="../bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.js"></script>
<script src="../javascript/javas.js"></script>

</div>
<script>

function reset(e){
	var val=e;
	
	$.ajax({
		type:'post',
		url:'reset.php',
		data:{'user_id':val},
		success:function(data){
		
			window.location.href='http://localhost/familyclub/users/info.php'
		}
	})
}
</script>
</body>
</html>