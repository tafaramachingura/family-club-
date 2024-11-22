<?php 
session_start(); 

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
<li><a href=''><i class='glyphicon glyphicon-dashboard'></i> Dashboard</a></li>
<li><a href='../logout.php'><i class='glyphicon glyphicon-log-out'></i> Logout</a></li></ul>
</nav>


<!-- code for zooming image -->

      <div id="view">


  <div id='inner-view' class="animated zoomIn">
  <i class='glyphicon glyphicon-remove close'  data-dismiss="modal"></i>
  <img src="" id="views">

  </div>

                </div>
<div class='col-sm-6 col-md-10 col-lg-12'>
<table class='table table-responsive table-striped table-bordered'>
<tr class='btn-primary'>
<th>Name</th> <th>Surname</th> <th>Address</th> <th>Cell Number</th> <th>National ID</th> <th>Email</th> <th>payment</th><th>Action</th>
</tr>
<?php
require('function.php'); 
$qr=mysqli_query($con,"select* from users , payments where users.role='user' and payments.user_id=users.user_id  order by users.user_id desc limit $offset, $rows_page ");
while($row=mysqli_fetch_assoc($qr)){
	echo "<tr>
	<td>".$row['name']."</td>
		<td>".$row['surname']."</td>
			<td>".$row['address']."</td>
				<td>".$row['cell']."</td>
					<td>".$row['nat_id']."</td>
					<td>".$row['email']."</td>"?> 
					
					<td><img src="../uploads/<?php echo $row['value'] ?>" class="zoom py" onclick= "return zoom(this)"></td>
						<?php


?>
<td> <input type='button' class='btn btn-primary btns' id="<?php echo $row['user_id'] ?>" onclick='approve(this.id)' value='approve'> <a href=''><i class='glyphicon glyphicon-pencil'></i></a>
	
 <a href="delete.php?id=<?php echo  $row['user_id']?>"><i class='glyphicon glyphicon-trash text-danger' ></i></a> 
 <a href="stream.php?user1=<?php  echo $row['user_id']?>" target='blank'><i class='glyphicon glyphicon-eye-open'></i></a></td>
<?php 


	echo "</tr>";
?>
<?php }?>
<tr><td colspan="11">

<ul class='pagination'>
<?php
$current_page="index.php";
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
		success:function(data){
		
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