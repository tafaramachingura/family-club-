<?php 


if(isset($_GET['page'])){

	$page=$_GET['page'];
}
else{
	$page=1;
}
      $rows_page=4;
             $offset=($page-1)*$rows_page;
			 $qr=mysqli_query($con,"select count(* )from users , payments where users.role='user' and payments.user_id=users.user_id");
			  $nrows= mysqli_fetch_row($qr);
             $Trows=$nrows[0];

			 $tpages=ceil($Trows/$rows_page);
			
?>