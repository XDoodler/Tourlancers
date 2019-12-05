
<?php
require 'db.php';
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
}
?>
         <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') 
          {
            if (isset($_POST['agree'])) {
            
              if(!filter_var($mysqli->escape_string($_POST["agency_email"]), FILTER_VALIDATE_EMAIL)) {
                echo 
              '<div class="info">
              Only Valid E-mail Id is accepted !
              </div>';
            
          }
            elseif(!is_numeric($mysqli->escape_string($_POST["agency_contact"]))) {
                echo 
              '<div class="info">
              Only Valid contacts  accepted !
              </div>';
                 }
            
                 else
                 {
                     require 'signup_op_db.php';
                 }
          }
          }
      ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register your business</title>
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

    <!--<script>
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
 <style>
        div.info {
    color: red;
    text-align: center;
    padding: 1px;
    margin-top: 30px;
    margin-bottom: 15px;
    border : 2px red solid;
/* Special keyword values */
    background-color: transparent;

}
    </style>
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
      <div class="row"><h5>Operator Details</h5></div>
  
    <form  action="signup_operator.php" method="post">
     

      <div class="row">
        <div class="input-field col s12 m8">
          <input  id="agency_name" type="text" required class="validate" name="agency_name">
          <label for="agency_name">Travel Agency Name</label>
        </div>
        <div class="input-field col s12 m4">
            <i class="material-icons prefix ">phone</i>
          <input  id="agency_contact" type="number" required class="validate" name="agency_contact">
          <label for="agency_contact">Provide Company Contact</label>
          <span class="helper-text" data-error="wrong" data-success="right">This will not be public</span>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">email</i>
          <input id="agency_email" type="email" required class="validate" name="agency_email">
          <label for="agency_email">Add an Email</label>
            <span class="helper-text" data-error="wrong" data-success="right">Check for updates on a regular basis</span>
        </div>
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">add_location</i>
          <input type="text" id="agency_address" required class="materialize-textarea" name="agency_address">
          <label for="agency_address">Company Location</label>
          <span class="helper-text" data-error="wrong" data-success="right">Let people track you</span>
        </div>
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">add_location</i>
          <select name="agency_city">
      <option value="Kolkata">Kolkata</option>
      <!--<option value="Puri">Puri</option>
      <option value="Andaman and Nicobar">Andaman and Nicobar</option>
      <option value="Goa">Goa</option>
      <option value="Chennai">Chennai</option>
      <option value="Maharashtra">Maharashtra</option>
      <option value="Rajasthan">Rajasthan</option>
      <option value="Uttarakhand">Uttarakhand</option>
      <option value="Assam">Assam</option>
      <option value="Bangalore">Bangalore</option>
      <option value="Hyderabad">Assam</option>-->
      <option value="Bhubaneswar">Bhubaneswar</option>
      <option value="Shimla">Shimla</option>
      <option value="Mumbai">Mumbai</option>
      <option value="Hyderabad">Hyderabad</option>
      <option value="Lucknow">Lucknow</option>
    </select>
    <label>Add your city below:-(*City cannot be updated)</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m3">
          <textarea id="agency_description" required class="materialize-textarea" data-length="120" name="agency_description"></textarea>
            <label for="agency_description">The better you write, the more people get to know</label>
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
        <input type="checkbox" name="services[]" value="Car services">
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
       <hr style="width: 300px">
   
      
    <!--  <h5>Package Details</h5><span>(One Package is mandatory)</span>
      <p id="addnew">
      <a href="javascript:new_link()" class="btn pulse green">Add more packages</a>
    </p>
      <div class="row z-depth-5" id="newlink">
         <div class="row">
             <div class="col s12 m4" >
      <input  name="tour_city[]" required type="text" class="validate" pattern="[^,]+" title="'|' not allowed">
          <label for="Package" style="color:green">Travel destination city name. Example: Goa, Rajasthan</label>
          </div>
          <div class= "col s12 m4">
    <input id="Package" name="tour_post[]" required type="text" class="validate" pattern="[^|]+" title="'|' not allowed">
          <label for="Package" style="color:red">Provide the 'Tour Package name'. Can only be changed with permissions from authority.</label>
    </div>
    <div class="col s12 m4">      
           <textarea id="textarea1" name="tour_description[]"  required class="materialize-textarea"pattern="[^|]+" title="'|' not allowed"></textarea>
          <label for="textarea1" style="color:green">Provide each and every details of the tour, which includes 'check-in and check-out dates, seasons, day plannings, services, beauty of that place, monuments and sight seeing, travel details you might provide.</label>
  </div>
         </div>
  <div class="row">
      <div class="col s12 m4" >
      <input  name="tour_places[]"  type="text" class="validate">
          <label for="Package" style="color:green">Mention all key places according to tour plan. Seperate them with commas</label>
          </div>
  <div class="col s12 m4">      
           <textarea id="textarea2" name="tour_itinerary[]"  required class="materialize-textarea"pattern="[^|]+" title="'|' not allowed"></textarea>
          <label for="textarea1" style="color:green">Provide every day planning to make sure your customers don't miss out anything.<br>Put < br> in between consecutive days</label>
  </div>
  <div class="col s12 m4">      
           <input type="number" id="textarea3" name="tour_booking[]"  required class="materialize-textarea"pattern="[^|]+" title="'|' not allowed">
          <label for="textarea1" style="color:red">Add only Package fee per person in in Indian Rupees. ex: 4500 (means Rs 4500 per person) .<br>Cannot be changed.<br> You can put discounts later.</label>
  </div>
 
</div>
    
</div>
<div class="row z-depth-4" style="display:none" id="newlinktpl">
    <i class="material-icons green" style="font-size:36px">arrow_downward</i>
         <div class="row">
             <div class="col s12 m4" >
      <input  name="tour_city[]"  type="text" class="validate" pattern="[^,]+" title="'|' not allowed">
          <label for="Package" style="color:green">Travel destination city name. Example: Goa, Rajasthan</label>
          </div>
          <div class= "col s12 m4">
    <input id="Package" name="tour_post[]"  type="text" class="validate" pattern="[^|]+" title="'|' not allowed">
          <label for="Package" style="color:red">Provide the 'Tour Package name'. Can only be changed with permissions from authority.</label>
    </div>
    <div class="col s12 m4">      
           <textarea id="textarea1" name="tour_description[]"   class="materialize-textarea"pattern="[^|]+" title="'|' not allowed"></textarea>
          <label for="textarea1" style="color:green">Provide each and every details of the tour, which includes 'check-in and check-out dates, seasons, day plannings, services, beauty of that place, monuments and sight seeing, travel details you might provide.</label>
  </div>
         </div>
  <div class="row">
      <div class="col s12 m4" >
      <input  name="tour_places[]"  type="text" class="validate" >
          <label for="Package" style="color:green">Mention all key places according to tour plan. Seperate them with commas</label>
          </div>
  <div class="col s12 m4">      
           <textarea id="textarea2" name="tour_itinerary[]"   class="materialize-textarea"pattern="[^|]+" title="'|' not allowed"></textarea>
          <label for="textarea1" style="color:green">Provide every day planning to make sure your customers don't miss out anything.<br>Put < br> in between consecutive days</label>
  </div>
  <div class="col s12 m4">      
           <input type="number" id="textarea3" name="tour_booking[]"   class="materialize-textarea"pattern="[^|]+" title="'|' not allowed">
          <label for="textarea1" style="color:red">Add only Package fee per person in in Indian Rupees. ex: 4500 (means Rs 4500 per person) .<br>Cannot be changed.<br> You can put discounts later.</label>
  </div>
 
</div>
</div> -->
<div class="row"><h5>Add Social Links</h5>
        <div class="input-field col s12 m6">
           <i class="fab fa-facebook prefix "></i>
          <input id="fb" type="url"  name="fb">
          <label for="fb">Add Facebook page link</label>
            <span class="helper-text" >Let people follow you</span>
        </div>
        <div class="input-field col s12 m6">
           <i class="fa fa-tv prefix "></i>
          <input id="web" type="url"  name="web">
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
      <h4>Terms and Conditions</h4>
      <p>By clicking the "Agree" button, you build your own company page.<br>
      You will be provided an online platform to bring your travel company in the limelight. We expect your team to be loyal to your tourists. We will be contacting you shortly for getting to know about your company in a more detailed way. Remember, this is a complete free service provided by Tourlancers. We will help you grow and earn more by using our system. If you have not read all the terms and conditions of building up a Company page for tour operators, we sincerely request you to read about the process of bookings and dashboard control in our documentations provided in the main website.
      We expect your team to cooperate with our company and wish you all the best for your travel company. <br> Thank you!</p>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-light btn green" type="submit"  name="agree" > I Agree</button>
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
    $('.modal').modal();
   $('select').formSelect();</script>
   
</body>
</html>