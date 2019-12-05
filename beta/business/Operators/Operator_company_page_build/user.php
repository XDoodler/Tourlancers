<?php
/*$host="localhost";
$user="root";
$pass="root";
$db="tourlwg2_tourlancers";

$con = $mysqli->query($host,$user,$pass,$db);
*/
require 'PDO/db.php';
session_start();
// Check if user is logged in using the session variable
if ( !isset($_SESSION['logged_in'])) {
    //If the user is not logged in then check the url for unique email
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        //If the user is not logged in and also the url doesn't contain unique email then we can't render the company page.
        $_SESSION['message'] = "Sorry, the company page doesn't exist!";
        header("location: ../../Business_Logins/error.php");
    }    
}
else if ( isset($_SESSION['logged_in'])) {
    //If the user is not logged in then check the url for unique email
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    else {
      $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $id=$_SESSION['id'];
    }
}
//$sql="SELECT * FROM tour_operators WHERE id = $id";
$result = $pdo->prepare("SELECT * FROM tour_operators WHERE id = '$id'");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$packages = $pdo->prepare("SELECT * FROM tour_packages WHERE id = '$id'");
$packages->execute();
$pkg = $packages->fetchAll();
//$info=mysqli_query($mysqli,$sql);
if($result->rowCount() == 0){
   $_SESSION['message'] = "Sorry, the company page doesn't exist!";
        header("location: ../../Business_Logins/error.php");
}
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <title><?php echo $row["name"];?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<style>
    .disc{
        font-size:.3em;
    background-color: red; ; 
    color: white;
    border: 1px red solid;
    padding: 1px;
    border-radius: 12px;}
    body
    {
        font-family: Quicksand;
        font-weight: bold;
    }
</style>
</head>
<body class="grey lighten-2">
 <!--Nav bar End-->
 <nav class="white">
    <div class="nav-wrapper">
       <a href="" style="font-size:1.5em;" class="brand-logo center red-text"><i class="material-icons red-text">person_pin</i>
        Profile</a>
       </div>
    </div>
  </nav>
 
  <section>
       <div class="row">
           <div class="col s12 m8">
              <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%);">
               <div class="row">
                  <div class="col s12 m12">
                     <img src="#" class="responsive-img" alt="">
                     <h4><?php echo $row["name"];?><span class="disc">  TOURLANCERS</span></h4>
                  </div>
                  <div class="row">
                        <div class="container">
                        <div class="col s12 m12">
                          <h6><i class="fas fa-map-marker-alt red-text"></i><?php echo $row["location"];?></h6> 
                          <p><i class="fas fa-star 4x orange-text"></i> <span class="green white-text"> 4.4 </span> <span class="green-text grey lighten-2">Travel Agency Company</span></p>
                          <p><i class="fab fa-gg-circle green-text"></i><?php echo "Established : ".$row["years_of_service"]; ?></p>
                          <p><a class="waves-effect waves-light modal-trigger red-text" href="#modal1"> <i class="fas fa-clipboard-list"></i> 
                          About us</a></p>
                            <div id="modal1" class="modal">
                               <div class="modal-content">
                                 <h5 class="center"><?php echo $row["name"]; ?></h5> <hr>
                                   <p><?php echo $row["description"]; ?></p>
                              </div>
                           </div>
                        </div> 
                        </div>
                      </div>
                  </div>
               </div>
   <section>
      <!--Other packages--> 
           <div class="row">
               <div class="col s12 m12">
                  <h5 class="center red white-text card">PACKAGE DETAILS</h5>
                   <div class="row">

                    <?php 
                      /*$a=explode('|', $row["package_name"]);
                      $b=explode('|', $row["package_fee"]);
                      $c=explode('|', $row["package_id"]);
                      $i=0; for($j=0;$j<count($a)-1;$j++){
                      */
                      if($pkg)
                        {
                            foreach($pkg as $p)
                                {?>
                         <div class="col s12 m6">
                           <div class="card-panel indigo white-text" style=" height: 250px">

                              <h5><?php echo $p->package_name; ?></h5>
                              <h5 style="color: yellow"> <?php if($p->tailor==0){?><span class="green-text">&#8377;</span><?php echo $p->package_fee; } else echo "Tailor-made(Customizable)";?> </h4>
                              <a class="waves-effect waves-light btn white red-text btn-small" href="package.php?id=<?php echo $id;?>&package_id=<?php echo $p->package_id;?>">View package</a>
                           </div>
                      </div><?php
                             }
                        }
                       ?>

                   </div>
               </div>
           </div>
      <!--other packages end-->  
  </section>  
         </div>
      
         <div class="col s12 m4">
            <div class="card-panel">
             <div class="row">
                 <div class="col s12">
                    <h5><span class="red-text">Follow <?php  echo $row["name"];  ?></h5>
                     <!--<p><b class="grey lighten-2 green-text"> Discount </b><span class="orange white-text"> 68%</span></p>-->
                      <a href="<?php echo $row["web"]; ?>" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">public</i></a>
                      <a href="<?php echo $row["fb"]; ?>" class="btn-floating btn-large waves-effect waves-light red"><i class="fab fa-facebook"></i></a>
                      
                 </div>
             </div>
           </div>
           <div class="card-panel">
             <div class="row">
                 <div class="col s12">
                    <h5 class="center red white-text"> Services</h5>
                    <div class="collection">
                      <?php 
                      $arr=explode('|', $row["services"]);
                      $i=0; for($j=0;$j<count($arr);$j++){ ?>
                      <p class="collection-item"> <?php echo $arr[$i]; ?></p>
                      <?php
                      $i++;
                            }
                      
                       ?>
        
        
                 </div>
                     
                      
                  
                 </div>
             </div>
           </div>

         </div> 
       </div>
 </section>
      <!--Social Media follow-->
 <!--Social Media follow-->
      <footer class="section grey darken-1 white-text center" style="background-color: gray">
     <section class="section section-follow  white-text center">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h4>Follow Tourlancers</h4>
                        <p>Follow us on social media for special offers</p>

                          <a href="https://www.facebook.com/tourlancers" class="white-text">
                                  <i class="fab fa-facebook fa-4x"></i>
                          </a>

                    </div>
                </div>
            </div>

           </section>

          <!--Social Media follow End-->
          <!--footer-->
      <section class="section  white-text center">
            <div class="container">
                <div class="row">
                    <div class="col s12 m4">
                      <h5 >Information</h5><hr style="width:40px">
                      <a  style="color:white"href="aboutus.html">ABOUT US</a><br>
                      <a  style="color:white"href="beta/business/B_docs/">TL FOR BUSINESS</a>
                      <p>MAIL US AT info@tourlancers.com</p>
                     </div>
                   <div class="col s12 m4">
                       <h5 >Customer Care</h5><hr  style="width:40px">
                       <a  style="color:white"href="faq">SUPPORT AND FAQ</a><br>
                       <a  style="color:white"href="beta/business/Operators/Operator_company_page_build/CUSTOMER%20BOOKING%20POLICIES%20AND%20FAQ%20SUPPORT.pdf">BOOKINGS SUPPORT</a><br>
                       <a  style="color:white"href="beta/business/B_docs/TOUR%20AGENCY%20POLICIES%20AND%20FAQs.pdf">TL FOR BUSINESS FAQ AND SUPPORT</a><br>
                   </div>
                    <div class="col s12 m4">
                       <h5 >Headquarters</h5><hr style="width:40px">
                       <p>KOLKATA, INDIA</p>

                    </div>
                </div>
            </div>
        </section>
       


     
     
     <footer>
            <p class="flow-text">Tourlancers &copy;2017-2018</p>
      </footer>
      </section>
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
        $(document).ready(function(){
         $('.modal').modal();
        });
       



//slider
const slider=document.querySelector('.slider');
M.Slider.init(slider,{
      indicators:false,
      height:400,
      transition:500,
      interval:3000});
const mb=document.querySelectorAll('.materialboxed');
M.Materialbox.init(mb,{});
    </script>
</body>


</html>
