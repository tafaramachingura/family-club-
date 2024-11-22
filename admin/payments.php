<?php 
session_start(); 
if(isset($_SESSION['user'])){
?>
<?php  require('../db.php');?>

<html>
<head>

<link rel='stylesheet' href='../css/bootstrap.min.css'>
<link rel='stylesheet' href='../css/bootstrap-theme.css'>
<link rel='stylesheet' href='../css/style.css'>
<title>Family Club Admin</title>

</head>
<body>
<div class='container'>
<nav class='navbar navbar-inverse'>
<ul class='nav navbar-nav'>
<li><a href='index.php'><i class='glyphicon glyphicon-dashboard'></i> Dashboard</a></li>
<li><a href='payments.php'><i class='glyphicon glyphicon-dashboard'></i> View Payments</a></li>

<li><a href='../logout.php'><i class='glyphicon glyphicon-log-out'></i> Logout</a></li></ul>
</nav>


<!-- code for zooming image -->

      <div id="view">


  <div id='inner-view' class="animated zoomIn">
  <img src="" id="views">

  </div>

                </div>
<div class='col-sm-6 col-md-10 col-lg-12'>
<table class='table table-responsive table-striped table-bordered'>
<tr class='btn-primary'>
 <th>User ID</th>
 <th>Name</th>
  <th>Surname</th> 
 
   <th>Cell Number</th> <th>Email</th> <th>Recipt
<th>Payed To</th>
</tr>
<?php
require('function.php'); 
$qr=mysqli_query($con,"select* from users,payments  where users.role='user' and payments.user_id=users.user_id  order by users.datereg desc limit $offset, $rows_page ");
$q2=mysqli_query($con,"select users.name from users, payments where users.user_id=payments.payed_to");

   $resul=mysqli_fetch_assoc($q2);
   $count=count($resul);
	while($row=mysqli_fetch_assoc($qr)){
	echo "<tr>
	<td>".$row['user_id']."</td>
	<td>".$row['name']."</td>
		<td>".$row['surname']."</td>
			
				<td>".$row['cell']."</td>
				
					<td>".$row['email']."</td>"?> 
					
					<td><a href="../uploads/<?php echo $row['value'] ?>." target='blank'> <?php echo $row['value']; ?> </a></td>
					<td> <?php  echo $row['payed_to']?></td>
						<?php 


?>


<?php 


	echo "</tr>";
?>
<?php }?>
<tr><td colspan="11">

<ul class='pagination'>
<?php
$current_page="payments.php";
$page_link="";
for($i=1;$i<=$tpages;$i++)
          {
              if($page==$i)

              $page_link.="<li class='active'><a href='$current_page?page=".$i."''>".$i."</a></li>";

          else


              $page_link.="<li><a href='$current_page?page=".$i."'>".$i."</a></li>";


          }
		  echo "<p style='float:left;margin-right:20px'><b> Pages</b></p>";  echo $page_link;
 ?>
</ul>

</td>
</tr>
</table>
</div>
<script src="../jquery-3.5.1.min.js"></script>
<script src="../bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.bundle.js"></script>
<script src="../bootstrap-5.0.0-beta2/bootstrap-5.0.0-beta2/dist/js/bootstrap.js"></script>
<script src="../javascript/javas.js"></script>
</div>
<script>

function approve(e){
	var val=e;
	
	$.ajax({
		type:'post',
		url:'approve.php',
		data:{'user_id':val},
		beforeSend:function(){
			$("#view").css('display','block')
		},

		success:function(data){
		console.log(val)
		
		
		},
		complete:function(){
			$("#view").css('display','block')
			window.location.href='index.php'

		}
	})
}
$(document).ready(function()
{
var bt=document.getElementsByClassName('btns');
var arr=[];
for(var i=0;i<bt.length;i++){
	arr.push(bt[i].id)
}
$.ajax({
	
	type:'post',
	url:'dis.php',
	datatype:'json',
	data:{'arr':arr},
	success:function(data){
		var mydata=JSON.parse(data)
		
		console.log(mydata)
	     
           for(var x=0;x<mydata.length;x++){
			document.getElementById(mydata[x]).value='approved'
			var bn=	document.getElementById(mydata[x])
			$(bn).removeClass('btn-primary')
						$(bn).addClass('btn-success')

			   document.getElementById(mydata[x]).disabled=true

		   }
		 
	}
})
})
</script>


</body>
</html>

<?php  }

else{

	header('location:../index.php');
}
?>