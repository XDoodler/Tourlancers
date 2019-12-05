<?php
$id = $_SESSION['id'];
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
// Escape all $_POST variables to protect against SQL injections
$car_name = $mysqli->escape_string($_POST['car_name']);
$car_email = $mysqli->escape_string($_POST['car_email']);
$car_address = $mysqli->escape_string($_POST['car_address']);
$car_city = $mysqli->escape_string($_POST['car_city']);
$car_description = $mysqli->escape_string($_POST['car_description']);
$car_established = $mysqli->escape_string($_POST['group1']);
$car_payments = $mysqli->escape_string($_POST['online_payment']);
$fb = $mysqli->escape_string($_POST['fb']);
$web = $mysqli->escape_string($_POST['web']);
//services
if(!empty($_POST["services"])){
		$car_service = implode(",",$_POST["services"]);}
		else{
			$car_service="";}

//working days
if(!empty($_POST["working"])){
		$working = implode(",",$_POST["working"]);}
		else{
			$working="";}


//drivers
if(!empty($_POST["drivers"])){
		$drivers = implode(",",$_POST["drivers"]);}
		else{
			$drivers="";}
//cars available

if(!empty($_POST["cars"])){
		$cars = implode(",",$_POST["cars"]);}
		else{
			$cars="";}

//car package
if(!empty($_POST["car_package"])){
		$a = implode(",",$_POST["car_package"]);}
		else{
			$a="";}
			

if(!empty($_POST["package_description"])){
		$b = implode(",",$_POST["package_description"]);}
		else{
			$b="";}
			

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

$sql = "INSERT INTO car_rentals (id, name, email, location, city, description, years_of_service, services, cars, online_payment,working, car_package, car_description,drivers,fb,web) " 
            . "VALUES ('$id','$car_name','$car_email','$car_address','$car_city','$car_description','$car_established','$car_service','$cars',
            '$car_payments','$working','$a','$b','$drivers','$fb','$web')";
if($mysqli->query($sql))
{
	header("location: ../../Dashboard_Bash/dashboard.php"); 
	$sql1 = "UPDATE users SET page='1', type='car_rental' WHERE id='$id'";
	$mysqli->query($sql1);

}
if (mysqli_connect_errno())
  {
  header("location: signup_carrentals.php");
  }

            ?>