<?php
require 'db.php';
session_start();
// Check if user is logged in using the session variable
if ( !isset($_SESSION['logged_in'])) {
    //If the user is not logged in then check the url for unique email
    if((isset($_GET['id'])) && (isset($_GET['package_id']))) {
        $id = $_GET['id'];
        $package_id = $_GET['package_id'];
    } else {
        //If the user is not logged in and also the url doesn't contain unique email then we can't render the company page.
        $_SESSION['message'] = "Sorry, the company page doesn't exist!";
        header("location: ../../Business_Logins/error.php");
    }    
}
else if ( isset($_SESSION['logged_in'])) {
    //If the user is not logged in then check the url for unique email
    if((isset($_GET['id'])) && (isset($_GET['package_id']))) {
        $id = $_GET['id'];
        $package_id = $_GET['package_id'];
    } 
    else {
      $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $id=$_SESSION['id'];
    }
}
$pkg_id=$mysqli->query("SELECT * FROM tour_packages WHERE package_id = '$package_id'");
$pkg = $pkg_id->fetch_assoc();
if($pkg_id->num_rows == 0){
   $_SESSION['message'] = "Sorry, the package doesn't exist!";
        header("location: ../../Business_Logins/error.php");
}
if($id==$pkg["id"]){
$t_id = $mysqli->query("SELECT * FROM tour_operators WHERE id = '$id'");
$st = $mysqli->query("SELECT * FROM grade_sys WHERE id = '$id'");
$t = $t_id->fetch_assoc();
$stnd = $st->fetch_assoc();}
else
{
$_SESSION['message'] = "Sorry, the package doesn't exist!";
header("location: ../../Business_Logins/error.php");
}
//$info=mysqli_query($mysqli,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>PACKAGE DETIALS-<?php echo $pkg["package_name"] ?></title>
    <!-- Anno CDN -->
    <style>
        div.info {
    color: pink;
    display: box;
    text-align: center;
    padding: 5px;
    margin-top: -20px;
    margin-bottom: 15px;
    border: 1px solid red;
    background: #66131c;
}
body
{
    font-family: Quicksand;
    background: #FFEFBA;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #FFFFFF, #FFEFBA); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
.disc{
    background-color: red; ; 
    color: white;
    border: 1px red solid;
    padding: 5px;
    border-radius: 12px;}
    </style>
     <!--Anno CDN-->
</head>
<body class="grey lighten-2">
 <!--<nav class="white">
    <div class="nav-wrapper">
       <a href="https://tourlancers.com" style="font-size:1.5em;font-family:Pacifico" class="brand-logo right left indigo-text " >Tourlancers</a>
       </div>
    </div>
  </nav>-->
 
  <section>
       <div class="row">
           <div class="col s12 m8">
              <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%);">
               <div class="row">
                  <div class="col s12 m12">
                     <!--****Slider****
                      <div class="slider">
                           <ul class="slides">
                             <li>
                                <img src="img/m.jpg" class="responsive-img">                       
                             </li>
                             <li>
                                 <img src="img/s.jpg" class="responsive-img">  
                             </li>
                             <li>
                                 <img src="img/w.jpg" class="responsive-img">
                             </li>
                             
                         </ul>
                       </div>
                     <!--****slider End****-->
                  </div>
                  <h3 class="black-text" ><strong><?php echo $pkg["package_name"];?></strong></h3>
                  <h5 class="indigo-text" ><strong>Package registered by : <?php echo $t["name"];?></strong> <span class="disc"style="font-size: .5em">IN TOURLANCERS</span></h5>
                  <h6 class="" style="text-transform: uppercase;
	background: linear-gradient(to right, #b92b27 0%, #1565C0 100%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;"><?php echo $pkg["dates"];?></h6>
                  <div class="row">
                        <div class="container">
                        <div class="col s12 m12" >
                          <h6><i class="fas fa-map-marker-alt black-text">Company Located at: </i><?php echo $t["location"]; ?></h6> 
                          <h6 class="black-text"><i class="tiny material-icons blue-text">business</i>Travel and Tour Services</h6>
                     	   <h6 class="black-text">Travelling from <?php echo $pkg["travel_from"]; ?><i class="tiny material-icons">chevron_right</i><?php echo $pkg["package_city"]; ?></h6>
                     	    <h6 class="black-text">Places to be visited:<?php 
                     	    $a=explode(',', $pkg["package_places"]);
                     	    $i=0; 
                     	    for($j=0;$j<count($a);$j++){?>
                     	         <div class="chip red white-text"><?php echo $a[$i];?>
                                    </div>
                     	   <?php $i++;}
                     	    ?><h6>
                     	    <h6 class="black-text"><strong>Services provided by Travel Agency:</strong>
                     	       <?php $b=explode('|', $t["services"]);
                     	    $i=0; 
                     	    for($j=0;$j<count($b);$j++){?>
                     	         <div class="chip indigo white-text"><?php echo $b[$i];?>
                                    </div>
                     	   <?php $i++;}
                     	    ?>
                     	    </h6>
                     	    
                        </div> 
                        </div>
                      </div>
                  </div>
               </div>
   <section>
      <!--Cars--> 
           <div class="row">
               <div class="col s12 m12 white z-depth-2" >
                  <h5 class="center indigo white-text card" style="background: linear-gradient(to right, #42275a , #743b68);">PACKAGE SPECIFICATIONS</h5>
                   <div class="row">
                       <div class="col s12 m12" >
                           <h5 class="black-text" style="font-family: Quicksand;"><?php echo $pkg["package_details"];?></h5>
                      </div>
                      
                     
                   </div>
               </div>
           </div>
      <!--Cars end-->  
</section>  
<section>
      <!--Drivers details--> 
           <div class="row">
               <div class="col s12 m12 white z-depth-2" >
                  <h5 class="center indigo white-text card" style="background: linear-gradient(to right, #42275a , #743b68);">PACKAGE ITINERARY</h5>
                   <div class="row">
                       <div class="col s12 m12" >
                           <h5 class="black-text"style="font-family: Quicksand;"><?php echo $pkg["package_itinerary"];?></h5>
                      </div>
                      
                     
                   </div>
               </div>
           </div>
      <!--drivers details end-->  
      
    
      <div class="col s12">
      <a class="indigo-text"href="https://www.tourlancers.com/beta/business/Operators/Operator_company_page_build/user.php?id=<?php echo $t["id"]; ?>" >View other packages by this company</a>
        </div>
  </section>  
</div>
      
            
         <div class="col s12 m4">
            <div class="card-panel" >
                <h5 class="center  white-text card" style="background: linear-gradient(to right, #42275a , #743b68);">BOOKING</a></h5>
            <?php if($pkg["tailor"]==1) { ?>
            <div class="row">
            <div class="col s6 m12">
                     
                    <h4 style="indigo-text">Tailor made package </h4><h6  class="disc">Package details are set by the agencies. Contact respective agency for more details regarding further enquiries. </h6>
                    <p style="color:black" > <strong>Reserve Your Seat To Avail The Best Deal Now With Your Own Preferences.</strong> </p>
                    </div>    
                
            </div>
           
       <?php } else { ?> 
       <div class="row">
           
          <div class="col s6 m12">
                     <?php  
                     $cost=$pkg["package_fee"];
                     $up=(.3*$cost)+$cost;
                     $down=$cost-(.3*$cost)?>
                     
                    <h4 style="indigo-text">Fixed cost package </h4><h5>&#8377;<?php echo $cost;?>/- (Per head)</h5><h6  class="disc">Package details are set by the agencies. Contact respective agency for more details regarding further enquiries. </h6>
                    <p style="color:black" > <strong>Reserve Your Seat To Avail The Best Deal Now With Your Own Preferences.</strong> </p>
                    </div>    
                    
       </div>
    
               <?php } ?>
            
             <div class="row">
                 
                 
                 
                  <div class="row">
                 <div class="col s12">
                     <?php if($pkg["status"]==1) {?> <a class="waves-effect waves-light  white-text btn-large " style="background: linear-gradient(to right, #c31432 , #240b36);" href="book.php?id=<?php echo $t['id'];?>&package_id=<?php echo $pkg['package_id']; ?>">BOOK YOUR SEAT </a> <?php }
                     else {?> <a class="white-text" style="background: linear-gradient(to right, #c31432 , #240b36);">FOR BOOKINGS CONTACT<?php echo "   ".$t["contact"];?></a> <?php }?></div></div>
                
             </div>
             <h6><i class="fa fa-cc-discover " style="font-size:36px;color:gray"></i>
             <i class="fa fa-cc-mastercard" style="font-size:36px;color:indigo"></i>
             <i class="fa fa-cc-visa" style="font-size:36px;color:indigo"></i>
             <i class="fa fa-credit-card" style="font-size:36px;color:indigo"></i></h6>
           </div>
           
          
           <!-- Inclusions -->
            <div class="card-panel" >
                <h5 class="center  white-text card" style="background: linear-gradient(to right, #42275a , #743b68);">INCLUSIONS</a></h5>
                   <h6 style="text-align: justify;"><?php 
                      $arr=explode(',', $pkg["Inclusions"]);
                      $i=0; for($j=0;$j<count($arr);$j++){ ?>
                      <li><?php echo $arr[$i]; ?></li>
                      <?php
                      $i++;
                            }
                      
                       ?></h6>
                </div>
           <!-- Exclusion -->
           <div class="card-panel" >
                <h5 class="center  white-text card" style="background: linear-gradient(to right, #42275a , #743b68);">EXCLUSIONS</a></h5>
                   <h6 style="text-align: justify;"><?php 
                      $arr=explode(',', $pkg["Exclusions"]);
                      $i=0; for($j=0;$j<count($arr);$j++){ ?>
                      <li><?php echo $arr[$i]; ?></li>
                      <?php
                      $i++;
                            }
                      
                       ?></h6>
                </div>
               
                <div class="card-panel" >
                <h5 class="center  white-text card" style="background: linear-gradient(to right, #42275a , #743b68);">OUR FACILITIES</a></h5>
                 
                    <h6><?php 
                      $arr=explode('#', $stnd["score"]);
                      $i=0; for($j=0;$j<count($arr);$j++){ ?>
                      <li><?php echo $arr[$i]; ?></li>
                      <?php
                      $i++;
                            }
                      
                       ?></h6>
                      
                </div>
           <div class="card-panel" >
                <h5 class="center  white-text card" style="background: linear-gradient(to right, #42275a , #743b68);">SPECIAL SERVICES</a></h5>
                 
                    <h6><?php 
                      $arr=explode(',', $pkg["special_service"]);
                      $i=0; for($j=0;$j<count($arr);$j++){ ?>
                      <li><?php echo $arr[$i]; ?></li>
                      <?php
                      $i++;
                            }
                      
                       ?></h6>
                      
                </div>
                
           <p style="color:blue">Ads</p>
            <div class="card-panel">
             <div class="row">
                 
                 <div class="col s12">
                    <img src="img/banner.jpeg" class="responsive-img">
                 </div>
             </div>
           </div>
         </div>

       </div>
      
    </div></div>
             
 </section>
      <!--Social Media follow-->
      
          <!--Social Media follow End-->
          <!--footer-->
     
    
      
    </div>
       <!--footer end-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    
    <script>
        const sideNav=document.querySelector('.sidenav');
         M.Sidenav.init(sideNav,{});
        $('.dropdown-trigger1').dropdown();
        $('.dropdown-trigger2').dropdown();
        $('.dropdown-trigger3').dropdown();
        $('.dropdown-trigger4').dropdown();
        $('.dropdown-trigger5').dropdown();
        $('.dropdown-trigger6').dropdown();
       $('.modal').modal();
       $('.tooltipped').tooltip();
         $('.collapsible').collapsible();
       $('.fixed-action-btn').floatingActionButton({
            direction: 'left'
  });


//slider
const slider=document.querySelector('.slider');
M.Slider.init(slider,{
      indicators:false,
      height:400,
      transition:500,
      interval:2000});
const mb=document.querySelectorAll('.materialboxed');
M.Materialbox.init(mb,{});
    </script>
     <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a744cff4b401e45400c9dac/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

<!--End of Tawk.to Script-->
    <script language="javascript">document.onmousedown=disableclick;status="Right Click Disabled";function disableclick(event){  if(event.button==2)   {     alert(status);     return false;       }}</script>
</body>
</html>