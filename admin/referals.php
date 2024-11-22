
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