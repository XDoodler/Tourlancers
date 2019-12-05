<?php
$id = $_SESSION['id'];
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

//$tour_post=[]; $tour_description=[];$package=" ";
// Escape all $_POST variables to protect against SQL injections
$agency_name = $mysqli->escape_string($_POST['agency_name']);
$agency_email = $mysqli->escape_string($_POST['agency_email']);
$agency_contact = $mysqli->escape_string($_POST['agency_contact']);
$agency_address = $mysqli->escape_string($_POST['agency_address']);
$agency_city = $mysqli->escape_string($_POST['agency_city']);
$agency_description = $mysqli->escape_string($_POST['agency_description']);
$agency_established = $mysqli->escape_string($_POST['group1']);
$agency_payments = $mysqli->escape_string($_POST['online_payment']);
$fb = $mysqli->escape_string($_POST['fb']);
$web = $mysqli->escape_string($_POST['web']);
if(!empty($_POST["services"])){
		$agency_service = implode("|",$_POST["services"]);}
		else{
			$agency_service="";}

/*$package_id="";
			if(!empty($_POST["tour_post"])){
		$a = implode("|",$_POST["tour_post"]);
		$len=explode("|",$a);$j=0;
		for($i=0;$i<count($len)-1;$i++){
			    $package_id= $package_id.hash('SHA256',$len[$i])."|";
			    $j++;
		}
			}
		else{
			$a="";}
//the tour city
if(!empty($_POST["tour_city"])){
		$e = implode("|",$_POST["tour_city"]);}
		else{
			$e="";}
//the tour key places
			if(!empty($_POST["tour_places"])){
		$f = implode("|",$_POST["tour_places"]);}
		else{
			$f="";}
			
			if(!empty($_POST["tour_description"])){
		$b = implode("|",$_POST["tour_description"]);}
		else{
			$b="";}
			
			if(!empty($_POST["tour_itinerary"])){
		$c = implode("|",$_POST["tour_itinerary"]);}
		else{
			$c="";}
			if(!empty($_POST["tour_booking"])){
		$d = implode("|",$_POST["tour_booking"]);}
		else{
			$d="";}
			
//package id
/*if(count($_POST))
        {
	$len = count($_POST['tour_post']);
	for ($i=0; $i < $len; $i++)
	{
		$tour_post[$i]= $_POST['tour_post'][$i];
		$tour_description[$i]= $_POST['tour_description'][$i];
        $package=$package.$tour_post[$i]."-".$tour_description[$i].",";
	}
  }
  */

$sql = "INSERT INTO tour_operators (id, name, email, location, contact, city, description, years_of_service, services, online_payment, fb,web) " 
            . "VALUES ('$id','$agency_name','$agency_email','$agency_address','$agency_contact','$agency_city','$agency_description','$agency_established','$agency_service','$agency_payments','$fb','$web')";
if($mysqli->query($sql))
{
	header("location: ../../Dashboard_Bash/dashboard.php"); 
	$sql1 = "UPDATE users SET page='1', type='tour_operator' WHERE id='$id'";
	$mysqli->query($sql1);

}
/*
//tour packages details
$p_id=explode("|",$package_id);
$p_city=explode("|",$e);
$p_places=explode("|",$f);
$p_name=explode("|",$a);
$p_details=explode("|",$b);
$p_itinerary=explode("|",$c);
$p_fee=explode("|",$d);
for($i=0;$i<count($p_id)-1;$i++)
{
$sql_packs="INSERT INTO tour_packages(id, package_id,package_city, package_name, package_places, package_details, package_itinerary,package_fee)"."VALUES('$id','$p_id[$i]','$p_city[$i]','$p_name[$i]','$p_places[$i]','$p_details[$i]','$p_itinerary[$i]', '$p_fee[$i]')";
$mysqli->query($sql_packs);
}
if (mysqli_connect_errno())
  {
  header("location: signup_operator.php");
  } */

            ?>