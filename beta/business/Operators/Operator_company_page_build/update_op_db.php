<?php
$id = $_SESSION['id'];
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
$a="";$b="";
$tour_post=[]; $tour_description=[];$package=" ";
// Escape all $_POST variables to protect against SQL injections
$agency_name =($_POST['agency_name']);
$agency_email=($_POST['agency_email']);
$agency_contact =($_POST['agency_contact']);
$agency_address =($_POST['agency_address']);
$agency_city =($_POST['agency_city']);
$agency_description =($_POST['agency_description']);
$agency_established =($_POST['group1']);
$agency_payments =($_POST['online_payment']);
$fb =($_POST['fb']);
$web =($_POST['web']);
if(!empty($_POST["services"])){
		$agency_service = implode("|",$_POST["services"]);}
		else{
			$agency_service="";}
         /*$package_id="";
			if(!empty($_POST["tour_post"])){
		$a = implode("|",$_POST["tour_post"]);
		$len=explode("|",$a);
		$j=0;
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

$sql = "UPDATE tour_operators SET name=?, email=?,contact=?, location=?,city=?, description=?,
years_of_service=?, services=?, online_payment=?,fb=?,web=?  WHERE id=?";

if($pdo->prepare($sql)->execute([$agency_name,$agency_email,$agency_contact,$agency_address,$agency_city,$agency_description,$agency_established,$agency_service,$agency_payments,
$fb,$web,$id]))
//if($mysqli->query($sql))
{
	header("location: ../../Dashboard_Bash/dashboard.php"); 
	
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
 $check = $pdo->prepare("SELECT * FROM tour_packages WHERE package_id='$p_id[$i]'") ;
 $check->execute();
 
// We know user package exists if the rows returned are more than 0
if ( $check->rowCount() > 0 ) {   
$sql_packs_up="UPDATE tour_packages SET  
package_city=?,
package_name=?,
package_places=?,
package_details=?,
package_itinerary=?,
package_fee=? WHERE package_id=?";

$pdo->prepare($sql_packs_up)->execute([$p_city[$i],$p_name[$i],$p_places[$i],$p_details[$i],$p_itinerary[$i],$p_fee[$i],$p_id[$i]]);
//$mysqli->query($sql_packs_up);
}
else
{
    $sql_packs="INSERT INTO tour_packages(id, package_id,package_city,package_name, package_places,package_details, package_itinerary,package_fee)"."VALUES(?,?,?,?,?,?,?,?)";
//$mysqli->query($sql_packs);
$pdo->prepare($sql_packs)->execute([$id,$p_id[$i],$p_city[$i],$p_name[$i],$p_places[$i],$p_details[$i],$p_itinerary[$i], $p_fee[$i]]);
}
}
*/

            ?>