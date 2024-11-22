
<?php  require('../db.php');?>
<?php 

$id=$_POST['user_id'];
mysqli_query($con,"update referals set parent=0 where parent='".$id."'");
mysqli_query($con,"update referals set uncle=0 where uncle='".$id."'");
mysqli_query($con,"update referals set grand_uncle=0 where grand_uncle='".$id."'");
mysqli_query($con,"update users set level=1 where user_id='".$id."'")



?>