
<?php
require 'PDO/db.php';
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: ../../Business_Logins/error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $id=$_SESSION['id'];
}
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['agree'])) { //user logging in

        require 'update_op_db.php';
        
    }
  }
//$result = "SELECT * from tour_operators where id='$id'";
//$info=mysqli_query($mysqli,$result);
$result = $pdo->prepare("SELECT * FROM tour_operators WHERE id = '$id'");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
$packages = $pdo->prepare("SELECT * FROM tour_packages WHERE id = '$id'");
$packages->execute();
$pkg = $packages->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update information</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<!--
    <script>
var ct = 1; var ex=0;
function new_link()
{
  ct++;
  var div1 = document.createElement('div');
  div1.id = ct;
  // link to delete extended form elements
  var delLink = '<div style="text-align:right;margin-right:65px"><a href="javascript:delIt('+ ct +')"><i class="material-icons" style="font-size:40px;color: #ff0000;">delete</i></a></div>';
  div1.innerHTML = document.getElementById('newlinktpl').innerHTML + delLink;
  document.getElementById('newlink').appendChild(div1);
}
// function to delete the newly added set of elements
function delIt(eleId)
{
  d = document;
  var ele = d.getElementById(eleId);
  var parentEle = d.getElementById('newlink');
  parentEle.removeChild(ele);
}

</script> -->
</head>

<body style="background: linear-gradient(-40deg, #ffffff 90%, #0001ae 10%); background-repeat: no-repeat;">
  <div class="navbar-fixed">

        <nav class="indigo darken-2">
             
            
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo logo">Business Bash</a>
                    <a href="#" class="right hide-on-small-only"></a>
                    <a href="" data-target="mobile-nav" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
                    <!--  username diplay -->
                     <ul class="right hide-on-med-and-down">

                         <li>
                            <a class='dropdown-trigger3' href='#' data-target='dropdown3'><i class="fa fa-user"></i> <span class="white-text">Hello <?php  echo $first_name;?> </span> <i class="material-icons right">arrow_drop_down</i></a>


                            <ul id='dropdown3' class='dropdown-content' >

                              
                              <li><a href="#!" style="color: red"> <?php  echo $email  ?> </a></li>
                              <li class="divider" tabindex="-1"></li>
                              <li><a href="../../Business_Logins/logout.php" style="color: red">Logout</a></li>
                              <li class="divider" tabindex="-1"></li>
                          </ul>
                        </li>
                    </ul>

                </div>
            
        </nav>
    </div>
    <ul class="sidenav indigo darken-2" id="mobile-nav">
        <li>
            <a href="index.html"><i class="fa fa-home"></i><span class="white-text"> Home </span></a>
        </li>
        <li>
                            <a class='dropdown-trigger4' href='#' data-target='dropdown4'><i class="fa fa-user"></i> <span class="white-text">Hello <?php  echo $first_name;?> </span> <i class="material-icons right">arrow_drop_down</i></a>


                            <ul id='dropdown4' class='dropdown-content' >

                              
                              <li><a href="#!" style="color: red"> <?php  echo $email  ?> </a></li>
                              <li class="divider" tabindex="-1"></li>
                              <li><a href="../../Business_Logins/logout.php" style="color: red">Logout</a></li>
                              <li class="divider" tabindex="-1"></li>
                          </ul>
                        </li>
    </ul>
  <span style="color: white; font-size: 20px; ">TL for<br> Business</span>
  <div class="row" style="margin: 0px 10% 0px 10%; ">

    
 <div class="row">
    <form  action="update_operator.php" method="post">
      <div class="row"><h5>Operator Details</h5></div>
      <div class="row">
        <div class="input-field col s12 m8">
          <input  id="agency_name" type="text" required class="validate" name="agency_name" value="<?php echo $row['name']; ?>">
          <label for="agency_name">Travel Agency Name</label>
        </div>
        <div class="input-field col s12 m4">
            <i class="material-icons prefix ">phone</i>
          <input  id="agency_contact" type="text" required class="validate" name="agency_contact" value="<?php echo $row['contact']; ?> ">
          <label for="agency_contact">Provide Company Contact</label>
          <span class="helper-text" data-error="wrong" data-success="right">This will not be public</span>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">email</i>
          <input id="agency_email" type="email" required class="validate" name="agency_email" 
          value="<?php echo $row['email']; ?>">
          <label for="agency_email">Add an Email</label>
            <span class="helper-text" data-error="wrong" data-success="right">Check for updates on a regular basis</span>
        </div>
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">add_location</i>
          <input id="agency_address" required class="materialize-textarea" type="text" name="agency_address" 
          value="<?php echo $row['location']; ?>">
          <label for="agency_addres">Company Location</label>
          <span class="helper-text" data-error="wrong" data-success="right">Let people track your location</span>
        </div>
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">add_location</i>
          <input type="text" id="agency_city" required class="materialize-textarea" name="agency_city" readonly value="<?php echo $row['city']; ?>">
          <label for="agency_city">CANNOT BE CHANGED</label>
          <span class="helper-text" data-error="wrong" data-success="right" >YOUR CITY</span>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m3">
          <input id="agency_description"  type="text" required class="materialize-textarea" data-length="120" name="agency_description"
          value="<?php echo $row['description']; ?>">
            <label for="agency_description">Add short description about your works</label>
        </div>
        <div class="col s12 m3">
          <span>How long has this company been into action ?</span>
          <p>
            <label>
                <input name="group1" type="radio" value="less than 1 year" checked>
                <span>less than 1 year </span>
            </label>
          </p>
          <p>
            <label>
                <input name="group1" type="radio" value="2-5 years">
                <span>2-5 years</span>
            </label>
          </p>
          <p>
            <label>
                <input name="group1" type="radio" value="6-10 years">
                <span>6-10 years</span>
            </label>
          </p>
          <p>
            <label>
                <input name="group1" type="radio"  value="10+ years">
                <span>10+ years</span>
            </label>
          </p>
        </div>


        <div class="col s12 m3">
          <span>Check all services your company provides:-</span>
          
            <p>
          <label>
        <input type="checkbox" name="services[]" value="car services">
        <span>car Services</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Travel ticket bookings">
        <span >Travel ticket bookings</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox"  name="services[]" value="Three meals/day">
        <span >Three meals/day</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Medical emergencies attended">
        <span >Medical emergency attended</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Personal tour guides">
        <span >Personal tour guides</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Domestic Tour Package">
        <span >Domestic Tour Package</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="International Tour Package">
        <span >International Tour Package</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Visa Service ">
        <span >Visa Service </span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Hotel Booking">
        <span >Hotel Booking</span>
          </label>
        </p>
        </div>


        <div class="col s12 m3">
          <span>Do you wish to automate bookings over the company pages?</span>
          <p>
            <label>
                <input name="online_payment" type="radio" value="0" checked>
                <span>No, only Cash.</span>
            </label>
          </p>
          <p>
            <label>
                <input name="online_payment" type="radio" value="1">
                <span>Online payments accepted</span>
            </label>
          </p>
        </div>
      </div>

   
<div class="row"><h5>Add Social Links</h5>
        <div class="input-field col s12 m6">
           <i class="fab fa-facebook prefix "></i>
          <input id="fb" type="url"  name="fb" value="<?php echo $row['fb'];  ?>">
          <label for="fb">Add Facebook page link</label>
            <span class="helper-text" >Let people follow you</span>
        </div>
        <div class="input-field col s12 m6">
           <i class="fa fa-tv prefix "></i>
          <input id="web" type="url"  name="web" value="<?php echo $row['web']; ?>">
          <label for="website">Add personal website</label>
          <span class="helper-text" >Let people get to know more details about your company</span>
        </div>
      </div>
      <div class="row">
        <div class="col s6 m6">
          <a class="waves-effect waves-light btn red" >Cancel</a>
        </div>
        <div class="col s6 m6">
          <a class="waves-effect waves-light btn indigo modal-trigger" data-target="modal1" href="#modal1">Save</a>
        </div>
      </div>
      
      <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Update models</h4>
      <p>Kindly make sure, you have updated all your details and checked all the boxes to ensure all information. This page will be LIVE 24x7 and users are going to view them.<br> Thank you!</p>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-light btn green" type="submit"  name="agree" value="agree">I have updated my details</button>
    </div>
  </div>
    </form>
  </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    
    <script type="text/javascript"> 
      const sideNav=document.querySelector('.sidenav');
            M.Sidenav.init(sideNav,{});
        $('.dropdown-trigger3').dropdown();
        $('.dropdown-trigger4').dropdown();
      $('.tooltipped1').tooltip();
    $('.modal').modal();</script>
   
</body>
</html>