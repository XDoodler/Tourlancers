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
if($pkg["status"]==0) {
     $_SESSION['message'] = "Sorry, Bookings are closed now!";header("location: ../../Business_Logins/error.php");}
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
}?>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/style.css">
    <title><?php echo $pkg["package_name"] ?>-Bookings</title>
    <!-- Anno CDN -->
    <style>
        div.info {
    color: red;
    text-align: center;
    padding: 1px;
    margin-top: -20px;
    margin-bottom: 15px;
    border : 2px red solid;
/* Special keyword values */
    background-color: transparent;

}
#data,#person
{
    color:black;
}
body{
    background: #C9D6FF;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #E2E2E2, #C9D6FF);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #E2E2E2, #C9D6FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    font-family:Quicksand;
}
.bt {
    background-color: white; 
    border: 1px red solid;
    color: red;
    padding: 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.bt:hover{
background-color: red;
color: white;
}
.b4 {border-radius: 12px;}
.back{
    color: blue;
    border: 1px blue solid;
    border-radius: 12px;}
.disc{
    background-color: #FFD700; ; 
    color: white;
    border: 1px #FFD700 solid;
    border-radius: 12px;}
    
.banner{
    background-color: #b50000; 
    border: 1px #b50000 solid;
    color: white;
    padding: 5px;
    border-radius: 12px;
}
hr.style-three {
    border: 0;
    border-bottom: 1px dashed #ccc;
    background: #999;
}
</style>
     <!--Anno CDN-->
</head>

<body class="container" ><h4 class="center black-text">Your booking for <?php echo $pkg["package_name"]; ?></h4> <br>
<h6 class="banner center ">Get a callback within a span of 24 hours and finalize your package ! </h6>

<div class="row" >
    <div class="col s12 m6" class="white-text center scrollspy" style=" background-color:white;border: 2px solid indigo; border-radius:20px;">
<?php
           if ($_SERVER['REQUEST_METHOD'] == 'POST') 
          {
          if (isset($_POST['submit'])) { //user books
        if(!preg_match('/^[6-9][0-9]{9}$/', trim($mysqli->escape_string($_POST["number"])))) {
            
     echo 
              '<div class="info">
              Only Valid Mobile Numbers are allowed !
              </div>';
                } 
            elseif(!filter_var($mysqli->escape_string($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                echo 
              '<div class="info">
              Only Valid E-mail Id is accepted !
              </div>';
            }
           elseif(strlen($mysqli->escape_string($_POST["rmail"])!=0)){
           if(!filter_var($mysqli->escape_string($_POST["rmail"]), FILTER_VALIDATE_EMAIL) ) {
                echo 
              '<div class="info">
              Only Valid E-mail Id is accepted !
              </div>';
            }
           }
             
            elseif(!preg_match('/^[a-z0-9 .\-]+$/i',$mysqli->escape_string($_POST["pay"]) )) {
                echo  $_SERVER['REMOTE_ADDR']."   IS RECORDED;   YOU ARE USING  :  ". $_SERVER['HTTP_USER_AGENT']
              ;
            }
             
             /*elseif(($mysqli->escape_string($_POST["pay"]))!=$pkg["package_fee"]) {
                echo 
              '<div class="info">
              Amount Mismatch!
              </div>';
            }
            /*elseif(($mysqli->escape_string($_POST["tour_operator"]))!=$t["name"]) {
                echo 
              '<div class="info">
              Tour operator name  Mismatch!
              </div>';
            }
            */
            elseif(($mysqli->escape_string($_POST["package"]))!=$pkg["package_name"]) {
                echo 
              '<div class="info">
              Package Name Mismatch!
              </div>';
            }
            elseif(($mysqli->escape_string($_POST["pkg_id"]))!=$pkg["package_id"]) {
                echo  $_SERVER['REMOTE_ADDR'].
              '<div class="info">
              You have tampered with the data! We have tracked you.
              </div>';
            }
            elseif(($mysqli->escape_string($_POST["tour_id"]))!=$t["id"]) {
                echo  $_SERVER['REMOTE_ADDR'].
              '<div class="info">
              You have tampered with the data! We have tracked you.
              </div>';
            }
            elseif(($mysqli->escape_string($_POST["person"])<=1) && ($mysqli->escape_string($_POST["person"]))>=20) {
                echo  $_SERVER['REMOTE_ADDR'].
              '<div class="info">
              No. of Tourists not supported. Range is 1-20 
              </div>';
            }
        else {require 'payment.php';}
        
            }
          }
           ?>
      <form class="col s12" id="book" action="" method="post">
          <h3 >GUEST DETAILS</h3><hr class="style-three">
    <input type="hidden" name="pkg_id" value="<?php echo $package_id; ?>">
    <input type="hidden" name="tour_id" value="<?php echo $id; ?>">

          <input placeholder="Placeholder" id="tour_operator" name="tour_operator" type="hidden" class="indigo-text" readonly value="<?php echo $t["name"]; ?>" >
        
          <input placeholder="Placeholder" id="package" type="hidden" name="package" class="indigo-text" readonly value="<?php echo $pkg["package_name"]; ?>">
       
            <input placeholder="Placeholder" id="pay" name="pay" type="hidden" readonly class="indigo-text"  value= "<?php if($pkg["tailor"]==0){echo $pkg["package_fee"];}else echo "Not Applicable" ?>">
    <div class="row">
                
        <div class="input-field col s12 m12">
            <input  id="person" name="person"  required type="number" class="validate" min="1" max="20">
          <label for="person" id="data">How many people traveling? (It is changeable)</label>
        </div>

        </div>
        <div class="row">
            <div class="input-field col s12 m12">
          <input id="name" type="text" name="name" required class="validate">
          <label for="name" id="data">Enter Your Name</label>
        </div>
            <div class="input-field col s12 m12">
        <input id="email" name="email" type="email" required class="validate">
            <label for="email" id="data">Provide your e-mail</label>
            <span class="helper-text" data-error="Email format not correct" data-success="Accepted"></span>
            </div>
            <div class="input-field col s12 m12">
        <input id="number" name="number" type="number" required class="validate">
            <label for="number" id="data">Provide your Contact</label>
            <span class="helper-text" data-error="Contact format not correct" data-success="Accepted"></span>
            </div>
            <div class="input-field col s12 m12">
        <input id="rmail" name="rmail" type="email"  class="validate" placeholder="Provide referal e-mail">
            <label for="rmail" id="data">Have a referal email? Apply here!  <button class="bt b4"onclick="credits()">credits</button></label>
            <span class="helper-text" data-error="Invalid" data-success="Accepted"></span>
            </div>
            </div>
            <span> <p class="red-text"><i class="fa fa-lightbulb-o" style="font-size:24px;color:red"></i> All communications from Tourlancers will be shared with the registered email</p>
            <button class="btn waves-effect waves-light indigo" type="submit" name="submit" value="submit" style="background: linear-gradient(to right, #c31432 , #240b36);">PAY &#8377;39
  </button>
 
    </span>
   
    </form>
     <span class="grey-text ">* This package has been registered by <?php echo $t["name"];?> under the terms & conditions of Tourlancers</span>
  </div>
  
  <div class="col s12 m6 "  style=" border-radius:30px;">
      <ul class="collection with-header">
        <li class="collection-header"><h4>PACKAGE DETAILS</h4></li>
        <li class="collection-item">Travel agency : <?php echo $t["name"]; ?></li>
        
        
         
         <li class="collection-item"><div><p class="red-text"><i class="fa fa-lightbulb-o" style="font-size:24px;color:red"></i>Kindly check out every detail of the package before proceeding to book.</p></div></li>
      </ul>
      
      <button class="bt b4">Get Cash Rewards on bookings! Share your booking email-id to other customers and receive exciting cash rewards</button>
      
  </div>
  <div align="center">
  <button class="bt back"onclick="goBack()">Back</button>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
        function faqs()
        {
            window.open("CUSTOMER BOOKING POLICIES AND FAQ SUPPORT.pdf");
        }
        function goBack() {
    window.history.back();
}
function credits() {
   window.open("affiliate.php");
}
    </script>
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
    </body>
    </html>