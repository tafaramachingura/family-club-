
<?php 
session_start(); 

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
<nav class='navbar navbar-inverse'>
<ul class='nav navbar-nav'>
<li><a href=''><i class='glyphicon glyphicon-dashboard'></i> Dashboard</a></li>
<li><a href='../logout.php'><i class='glyphicon glyphicon-log-out'></i> Logout</a></li></ul>
</nav>
<div class='container'>
<?php 

$post=$_GET['user1'];
$nms=mysqli_query($con,"select * from users,levels where user_id='".$post."' and levels.levID=users.level");

$rf=mysqli_fetch_assoc($nms);
$nams=$rf['name'];

 
?>
<div class='col-sm-8 col-md-8 col-lg-9' id="referals">


<?php
//getting user id
$m=mysqli_query($con,"select user_id from users where users.name='".$nams."'");
$k=mysqli_fetch_assoc($m);



// fetching children of this user
$m1=mysqli_query($con,"SELECT child,user_id,name,surname from referals ,users where referals.parent='".$k['user_id']."' and users.user_id=referals.child");
?>
<h3 class='text-success'><?php echo $nams .' '?> is at level <?php echo $rf['level'].' ('.$rf['levName'].')'?></h3>
</br>
<h3><?php echo $nams .' '?> refered</h3>
<ol>
<?php
if(mysqli_num_rows($m1)==0){
	
	echo "<span class='alert-danger'>0 referals</span>";
}
while($s=mysqli_fetch_assoc($m1))
{
	?>
<li class='btn-default form-control'><a href="?user=<?php echo $s['user_id']?>&user1=<?php echo $post?>"><?php echo $s['name'].' '. $s['surname'] ?></a></li> 
<?php
}
 ?>
 </ol>
  <?php if($_GET){
      if(@$_GET['user']){
		 $user=$_GET['user']; 
	 $sx=mysqli_query($con,"select* from users where user_id='".$_GET['user']."'");
	 $x=mysqli_fetch_assoc($sx);
	 $name=$x['name'].' '.$x['surname'];
	echo "<h3>".$name.' '."refered</h3>";
	?>
	    <ol>
	  <?php
	//chidren of the first parent
	        $m2=mysqli_query($con,"SELECT child,user_id,name,surname from referals ,users where referals.parent='".$_GET['user']."' and users.user_id=referals.child");
      
              if(mysqli_num_rows($m2)==0){
	        echo "<span class='alert-danger'>0 referals</span>";
             }
	         while($row=mysqli_fetch_assoc($m2))
	            {
		 
		      $u=$_GET['user'];   
	           ?>
	
	         <li class='btn-default form-control'><a href="?secondchildren=<?php echo $row['user_id'];?>&user=<?php echo $u;?>&user1=<?php echo $post?>"><?php echo $row['name'].' '.$row['surname'] ?></a></li> 

	
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
	                  $m3=mysqli_query($con,"SELECT child,user_id,name,surname from referals ,users where referals.parent='".$_GET['secondchildren']."' and users.user_id=referals.child");

         
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
	
	                   <li class=' btn-default form-control' ><a href="?secondchildren=<?php echo $sc;?>&thirdchild=<?php echo $res['user_id'];?>&user=<?php echo $u;?>&user1=<?php echo $post?>"><?php echo $res['name'].' '.$res['surname'] ?></a></li> 

	
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
					  
					  	                  $m4=mysqli_query($con,"SELECT child,user_id,name,surname from referals ,users where referals.parent='".$thirdchild."' and users.user_id=referals.child");

										  	                  if(mysqli_num_rows($m4)==0){
	                                     echo "<span class='alert-danger'>0 referals</span>";
                                     }?>
					                  <ol>
                       <?php		   
	                               while($res2=mysqli_fetch_assoc($m4))
	                                {
		 
		                           
	                                 ?>
	
	                            <li class=' btn-default form-control'><a>  <?php echo $res2['name'].' '. $res2['surname']?></a></li> 

	
	                               <?php 
	                               }
	                              ?>
	                              </ol>
								  <?php
								        }
						
                       }?>
</div>
</body>
</html>