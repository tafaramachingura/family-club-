<?php 
require('../db.php');
$id=$_POST['user_id'];
// first we need to locate the parent
// refered is the one refred and user is the one who refered someone

		$ab=mysqli_query($con,"select parent from referals where child='".$id."' and status=0");
  $r1=mysqli_fetch_assoc($ab);
		$uncle1=$r1['parent'];
		
		   if(mysqli_num_rows($ab)==1)
		   {
			   
			   				  mysqli_query($con,"update referals set status=1 where child='".$id."'");

			   $a=mysqli_query($con,"select parent from referals where child='".$id."'");
		$r=mysqli_fetch_assoc($a);
		$uncle=$r['parent'];
		//echo $id;
		//echo $uncle;
		// first we need to locate the parent before moving to uncle
		   $d=mysqli_query($con,"select `parent` from referals where parent='".$uncle."' and status=1");
		   $ass=mysqli_fetch_assoc($d);
		   //echo mysqli_num_rows($d);
		  // echo $ass['child'];
			   if(mysqli_num_rows($d)==2)
			   {
				  mysqli_query($con,"update users set level=2 where user_id='".$uncle."'");
			   }
		   
		   
		   
		   
		   }
		   		$abc=mysqli_query($con,"select parent from referals where child='".$id."' and status=0");

		  if(mysqli_num_rows($abc)==0){
			 /*  $fir=mysqli_query($con,"select parent from referals where child= '".$id."'");
			   $as=mysqli_fetch_assoc($fir);
			   $par=$ass['parent'];
			   echo $par;
			   */
			   	   $ac=mysqli_query($con,"select parent from referals where child='".$id."'");
				   			   	 //  $sc=mysqli_query($con,"select parent from referals where = child'".$id."'");

		$rc=mysqli_fetch_assoc($ac);
		
		//uncle id is the first parent
		$uncle=$rc['parent'];
		
		 $sc=mysqli_query($con,"select parent from referals where child='".$uncle."'");
 $v=mysqli_fetch_assoc($sc);
 $relu =$v['parent'];
		
		$b=mysqli_query($con,"select uncle from referals where parent='".$uncle."' and child='".$id."'");
		
		
		$rs=mysqli_fetch_assoc($b);
		$grand=$rs['uncle'];
		 echo "grand is".$grand;

 
 
	
		if($grand==0){
		//$vparent= $v['parent'];
		mysqli_query($con,"update referals set uncle='".$relu."' where parent='".$uncle."'  and child='".$id."'");
		 $e=mysqli_query($con,"select uncle from referals where uncle='".$relu."' ");
		     if(mysqli_num_rows($e)==4){
		        mysqli_query($con,"update users set level =3 where user_id='".$relu."'");
		           }
		
		}
	          
				  $sele=mysqli_query($con,"select user_id from users where level=3");
				  $x=mysqli_query($con,"select uncle from referals where child='".$id."'");
					 $ax=mysqli_fetch_assoc($x);
					 $xz=$ax['uncle'];
				 while( $c=mysqli_fetch_assoc($sele))
				 {
					 
					 $p=$c['user_id'];
					 $r=mysqli_query($con,"select uncle from referals where parent='".$xz."' and uncle='".$p."' ");
					 if(mysqli_num_rows($r)>0){
					 $g=mysqli_fetch_assoc($r);
					 
					  echo $g['uncle'];
					  $final=$g['uncle'];
					  $fin=mysqli_query($con,"update referals set grand_uncle ='".$final."' where child='".$id."' and uncle='".$xz."'");
					  
					  
					   $s=mysqli_query($con,"select grand_uncle from referals where grand_uncle='".$final."' ");
		                if(mysqli_num_rows($s)==8){
							
				   		  mysqli_query($con,"update users set level =4 where user_id='".$final."'");
						   $makepay=mysqli_query($con,"SELECT referals.child, payments.value  from referals, payments where referals.grand_uncle='".$final."' 
						   and payments.user_id=referals.child");
						   	   echo "queried";
						   while($pay=mysqli_fetch_assoc($makepay)){
							   echo "queried";
							  mysqli_query($con,"update payments set payed_to='".$final."' where user_id='".$pay['child']."'");
							
						}
						}
					 }
				 }
				 

				
				  
				  /*
				   echo'entered else';
				
				   $bn=mysqli_query($con,"select uncle from referals where child='".$id."'");
		
		             $rsl=mysqli_fetch_assoc($bn);
					$rsl['uncle'];
		              $grand1=$rsl['uncle'];
					  
				  if( mysqli_query($con,"update referals set grand_uncle='".$relu."' where child='".$id."' "))
				  {
					echo 'grand1 is'. $grand1;  
				  }
				  
				      $s=mysqli_query($con,"select grand_uncle from referals where grand_uncle='".$grand1."' ");
		                if(mysqli_num_rows($s)==2){
				   		  mysqli_query($con,"update users set level =4 where user_id='".$grand1."'");

			   }
			   */
			   
		   }
?>