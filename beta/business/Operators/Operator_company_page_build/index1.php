<?php
	require 'db.php';

    
   if (isset($_GET['payment_id'])) {
    $paymentid=$_GET['payment_id'];
   // echo $paymentid;
    $check="SELECT * FROM clients";
		$query=mysqli_query($con,$check);
		
		while($row=mysqli_fetch_assoc($query))
			if($paymentid==$row['mojo']){$email=$row['email']; 
			
			$check1="SELECT * FROM tour_operators";
		$query1=mysqli_query($con,$check1);
			while($row1=mysqli_fetch_assoc($query1))
			if($row["tour"]==$row1['name']){$emailt=$row1['email']; 
			
		$to= $emailt;
        $subject = 'Bookings Confirmed (tourlancers.com)';
        
        $message_body = '
        Hello '.$row1['name'].',
        Your have new bookings please connect with your client in 24 hours
        
        Kindly check all the Client information provided below:
 
 
        
        Name: '.$row['name'].',
        Email: '.$row['email'].',
        Contact: '.$row['number'].',
        Total no. of tourists: '.$row['person'].',
        Package: '.$row['pkg'].',
       
         The necessary details of tour operator:
        
        Name : '.$row1['name'].',
        Package booked: '.$row['pkg'].',
        Company Email : '.$row1['email'].',
        Company Contact: +91 '.$row1['contact'].',
        Company Address: '.$row1['location'].',
        
        For any Queries, mail us at info@tourlancers.com 
        
        Tourlancers wishes you a happy and safe journey!
       
        
        DATE: '.$row['date'].'
        
       
        
        
       ';
       
      
        $headers="From: info@tourlancers.com";
        mail($to, $subject, $message_body, $headers);
        
        
			
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ticket</title>
<style>
#content {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
    border-radius: 5px;
}

#content:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
    border-radius: 5px 5px 0 0;
}

.container,.container1 {
    padding: 2px 16px;
}
</style>
</head>
<body>
   
<h1 align="center"><img src="https://media.licdn.com/dms/image/C510BAQGNPF56NnbzsA/company-logo_200_200/0?e=2159024400&v=beta&t=8Q8DugvYXoyIDKr4p7Ky4iLv3TpQuhbIXmPmLokdUnY"></h1>
 <div id="content" >
<h2 align="center"> TL BOOKING CARD</h2>
<p hidden></p>
 
  <div class="container" >
     
     <h3><label>Payement ID:</label><?php echo $row['mojo']; ?></h3> 
    <h4><label>Name: </label><b><?php echo $row['name']; ?></b></h4> 
    <p><label>Contact: </label><?php echo $row['number']; ?></p>
     <p><label>Email: </label><?php echo $row['email']; ?></p>
      <p><label>Package: </label><?php echo $row['pkg']; ?></p>
       <p><label>No. Of Persons: </label><?php echo $row['person']; ?></p>
  </div>


<br>
 <div class="container1" >
     <p hidden>          </p>
     <h3 hidden>-----Operator Details-----</h3>
     <p hidden>          </p>
    <h4><label>Name Of Operator: </label><b><?php echo $row1['name']; ?></b></h4> 
    <p><label>Agency Address: </label><?php echo $row1['location']; ?></p> 
    <p><label>Agency Contact: </label><?php echo $row1['contact']; ?></p> 
    <p><label>Agency Email: </label><?php echo $row1['email'];?></p> 
    
  </div>
  <p hidden>_____________________________________________________</p>
  <p hidden>          </p>
  <p hidden>          </p>
  <p hidden>          </p>
  <h1 hidden>Terms & Conditions</h1>
  <p hidden>          </p>
  <p hidden>          </p>
  <h3 hidden>Why should I pay Rs 39 ? </h3>
  <p hidden> TOURLANCERS WILL CHARGE A TOTAL OF RS 39 FOR RESERVING A SEAT FOR ANY PACKAGE THAT HAS BEEN BOOKED. OUR TRAVEL AGENCIES KEEPS A TRACK OF ALL THEIR REQUESTS MADE VIA ONLINE. HOWEVER, THIS MEAGRE AMOUNT OF RS 39 IS ACTUALLY A “GRAB YOUR GIFT” FOR OUR CUSTOMERS. A SURPRISE GIFT IS WAITING FOR THEM AFTER THEIR TRIP COMPLETES. AS SOON AS YOU COMPLETE YOUR PAYMENT OF RS 39. WE WILL MAIL YOU THE DETAILS OF YOUR CONCERNED PACKAGE AND TRAVEL AGENCY IN A PDF FORMAT. YOU CAN EXPECT A CALLBACK FROM THE CONCERNED TRAVEL AGENCY WITHIN A SPAN OF 24 HOURS. NOW YOU CAN HAVE A CONVERSATION WITH THE TRAVEL AGENCY AND CUSTOMIZE YOUR TOUR.</p>
 <p hidden>          </p>
 <p hidden>          </p>
 <h2 hidden>Happy Travelling :)</h2>
 <p hidden> contact: info@tourlancers.com</p>
  
</div>


<br>

<div id="editor"></div>
<div>
<span><button id="cmd">Generate PDF</button> <button><a href="https://www.tourlancers.com//beta//business//Operators//Operator_company_page_build//thankyou.php"> NEXT</a></button></span>
</div>
<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
  
  

    <script  src="js/index.js"></script>


<?php }}}?>

</body>

</html>
