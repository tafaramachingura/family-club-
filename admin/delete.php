

<?php 
session_start(); 

?>
<?php  require('../db.php');?>
<html>
<body>
<script src="../jquery-3.5.1.min.js"></script>
<script src="../bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.bundle.js"></script>
<script src="../bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.js"></script>
<script src="../javascript/javas.js"></script>

<?php 

mysqli_query($con,"DELETE FROM `users` WHERE user_id='".$_GET['id']."' ");
mysqli_query($con,"DELETE FROM `referals` WHERE child='".$_GET['id']."' ");
mysqli_query($con,"DELETE FROM `payments` WHERE user_id='".$_GET['id']."' ");

echo "<script>
window.location.href='index.php'
</script>";

 ?>

</body>
</html>
