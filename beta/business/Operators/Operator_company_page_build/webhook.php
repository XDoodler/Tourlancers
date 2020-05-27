<?php
require 'db.php';
    $data=$_POST;
    $paymentid=$data['payment_id'];
   
    $req=$data['payment_request_id'];

					$sql="UPDATE clients SET mojo='$paymentid', paid=1
                                               WHERE id='$req'";
				mysqli_query($mysqli, $sql);
			
				require 'db.php';
 $data=$_GET;
    
   if (isset($_POST['payment_id'])) {
    $paymentid=$_POST['payment_id'];
    //echo $paymentid;
    $check="SELECT * FROM clients";
		$query=mysqli_query($con,$check);
		
		while($row=mysqli_fetch_assoc($query))
			if($paymentid==$row['mojo']){$email=$row['email']; $rmail=$row['rmail'];
			//echo $rmail;
			$credit="SELECT * FROM affiliate ";
		    $query1=mysqli_query($con,$credit); 
		     
		    $flag=0;
		    while($row2=mysqli_fetch_assoc($query1))
			if($email==$row2['email']){$flag=1;break;}
			
			if($flag==0){$sql2="INSERT INTO affiliate(email, credits) 
				VALUES('$email','0')";
				mysqli_query($con, $sql2); }
		    $credit1="SELECT * FROM affiliate ";
		    $query2=mysqli_query($con,$credit1); 
		    $flag1=0;
		    while($row1=mysqli_fetch_assoc($query2))
			if($rmail==$row1['email'] && $email!=$rmail){ 
			    
			    
			    $sql="UPDATE affiliate SET credits=credits+1 
                                               WHERE email='$rmail'";
				mysqli_query($con, $sql);
		        $flag1=1;
		        break;
			}//if
			
		if($flag1==0 && $rmail!="") 
		{
		    $to=$email;
        $subject = 'Promo Unsuccessfull';
        $message_body = '
        Hello 

        Your Promo Referral Email Is Invalid
        
        Regards';
        
        $headers="From: info@tourlancers.com";
        mail($to, $subject, $message_body, $headers);
		}
			   
			}//if
   }//isset

?>
