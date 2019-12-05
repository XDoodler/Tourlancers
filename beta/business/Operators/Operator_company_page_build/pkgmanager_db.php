<?php
$id = $_SESSION['id'];
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
// Escape all $_POST variables to protect against SQL injections
$pk_id=($_POST['pkg_id']);
$from =($_POST['from']);
$city =($_POST['city']);
$name=($_POST['name']);
$date =($_POST['daterange']);
$places =($_POST['places']);
$status=($_POST['status']);
$tailor=($_POST['tailor']);
$details =($_POST['details']);
$itinerary =($_POST['itinerary']);
$fee =($_POST['fee']);
$inc =($_POST['includes']);
$exc=($_POST['excludes']);
$sp =($_POST['sp_services']);
$sql_packs_up="UPDATE tour_packages SET 
dates=?,
travel_from=?,
package_city=?,
package_name=?,
package_places=?,
package_details=?,
package_itinerary=?,
package_fee=?,
Inclusions=?,
Exclusions=?,
special_service=?,
status=?,
tailor=?
WHERE package_id=?";

if($pdo->prepare($sql_packs_up)->execute([$date,$from,$city,$name,$places,$details,$itinerary,$fee,$inc,$exc,$sp,$status,$tailor,$pk_id]))
{
    	header("location: ../../Dashboard_Bash/dashboard.php"); 
    

}
//$mysqli->query($sql_packs_up);
