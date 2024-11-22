
<?php  require('../db.php');?>

<?php 
session_start(); 
if($_POST){
	
	
			  
	$arr=$_POST['arr'];
	
			 $arr2=array(); 
	$total=count($arr);
	  $dis=mysqli_query($con,"SELECT * from users, referals where users.user_id=referals.child and referals.status=1");
	  while($row=mysqli_fetch_assoc($dis)){
   for($i=0;$i<$total;$i++){
if($row['user_id']==$arr[$i])
                  {  
			 array_push($arr2,$arr[$i]);
                  }
       }
      }
	  echo json_encode($arr2);
}
?>