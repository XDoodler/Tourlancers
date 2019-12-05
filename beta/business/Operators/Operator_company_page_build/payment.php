<?php
require 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['submit']))
	{
	     
		$name=$mysqli->escape_string($_POST['name']);
	    $contact=$mysqli->escape_string($_POST['number']);
        $email=$mysqli->escape_string($_POST['email']);
        $tour=$mysqli->escape_string($_POST['tour_operator']); 
        $tour_id=$mysqli->escape_string($_POST['tour_id']);
        $pkg_id=$mysqli->escape_string($_POST['pkg_id']);
        $pay=$mysqli->escape_string($_POST['pay']);
        $rmail=$mysqli->escape_string($_POST['rmail']);
        
        $pkg=$mysqli->escape_string($_POST['package']);
        $person=$mysqli->escape_string($_POST['person']);
       
        $amount=$pay*$person;
        $date=date("Y-m-d");
        $time=date("h:i:sa");
        $id=md5($email.$date.$tour.$time);
		
 
                  $sql=$mysqli->query("SELECT * FROM tour_operators WHERE id = '$tour_id'");
				//$emailt=mysqli_query($mysqli, $sql1);
				$inf = $sql->fetch_assoc();
                  
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array('X-Api-Key:test_7c789bddee44f57399fc3ea4d12',
                  'X-Auth-Token:test_21b1c30407a7a2449dd1433044e'));

$payload = Array(
    'purpose' => 'Bookings',
    'amount' => '39',
    'phone' => $contact,
    'buyer_name' => $name,
     'redirect_url' => 'https://www.tourlancers.com//beta//business//Operators//Operator_company_page_build//index1.php',
    'send_email' => true,
    'webhook' => 'https://www.tourlancers.com//beta//business//Operators//Operator_company_page_build//xprilion.php',
    'send_sms' => true,
    'email' => $email,
    'allow_repeated_payments' => false
);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode = json_decode($response ,true);
//print_r($json_decode);
$long_url = $json_decode['payment_request']['longurl']; 
$id=$json_decode['payment_request']['id'];
$sql2="INSERT INTO clients(id,mojo, date,tour_id ,tour,pkg_id ,pkg, person, email, name, number,amt, paid,rmail) 
				VALUES('$id','', '$date' ,'$tour_id', '$tour' ,'$pkg_id', '$pkg', '$person', '$email', '$name', '$contact','39', 0,'$rmail')";
				mysqli_query($mysqli, $sql2);


        $to= "soham17041998@gmail.com,mitsuoapps@gmail.com";
        $subject = 'Booking Alert ( tourlancers.com )';
        $message_body = '
        Hello '.$tour.',

        You have new booking request!
        
        client Name: '.$name.',
        client Email: '.$email.',
        Client Contact: '.$contact.',
        No.of people: '.$person.',
        Package: '.$pkg.'';
       
        
        $headers="From: info@tourlancers.com";
        mail($to, $subject, $message_body, $headers);
        
        
        //to user
        /*$to= $email;
        $subject = 'Bookings Confirmed (tourlancers.com)';
        $message_body = '
        Hello '.$name.',

        Your bookings have been Confirmed and the respective tour operator have been informed
        
        Kindly check all the Client information provided below:
        
        Name: '.$name.',
        Email: '.$email.',
        Contact: '.$contact.',
        Total no. of tourists: '.$person.',
        Package: '.$pkg.',
       
        
        The necessary details of tour operator:
        
        Name : '.$tour.',
        Package booked: '.$pkg.',
        Company Email : '.$inf["email"].',
        Company Contact: +91 '.$inf["contact"].';
        
        For any Queries, mail us at info@tourlancers.com 
        
        Tourlancers wishes you a happy and safe journey!
        ';
       
        
        $headers="From: info@tourlancers.com";
        mail($to, $subject, $message_body, $headers); */

//echo $long_url;
header('Location:'.$long_url);

}
}

?>		
