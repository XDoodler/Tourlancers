<?php
$id = $_SESSION['id'];
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
// Escape all $_POST variables to protect against SQL injections
$from = $pdo->prepare("SELECT * FROM tour_operators WHERE id = '$id'");
$from->execute();
$travel = $from->fetch(PDO::FETCH_ASSOC);

$from=($_POST['from']);
$city =($_POST['city']);
$name=($_POST['name']);
$date =($_POST['daterange']);
$tailor=($_POST['tailor']);
$places =($_POST['places']);
$details =($_POST['details']);
$itinerary =($_POST['itinerary']);
$fee =($_POST['fee']);
$inc =($_POST['includes']);
$exc =($_POST['excludes']);
$sp =($_POST['sp_services']);
$pk_id=hash('SHA256',$name.$date.$fee);

$sql_packs_up="INSERT INTO tour_packages (id, package_id,dates,travel_from,package_city, package_name, package_places, package_details, package_itinerary,package_fee,Inclusions,Exclusions,special_service,tailor)"."VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

if($pdo->prepare($sql_packs_up)->execute([$id,$pk_id,$date,$from,$city,$name,$places,$details,$itinerary,$fee,$inc,$exc,$sp,$tailor]))
{
    	header("location: ../../Dashboard_Bash/dashboard.php"); 
    

}
//$mysqli->query($sql_packs_up);
