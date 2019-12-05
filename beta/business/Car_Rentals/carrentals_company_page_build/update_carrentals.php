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
    $id=$_SESSION['id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['agree'])) { //user logging in

        require 'update_cr_db.php';
        
    }
  }
  $result = "SELECT * from car_rentals where id='$id'";
$info=mysqli_query($mysqli,$result);
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

//cars
var ct1 = 1; var ex1=0;
function new_link1()
{
  ct1++;
  var div2 = document.createElement('div');
  div2.id = ct1;
  // link to delete extended form elements
  var delLink1 = '<div style="text-align:right;margin-right:65px"><a href="javascript:delIt1('+ ct1 +')"><i class="material-icons" style="font-size:40px;color: #ff0000;">delete</i></a></div>';
  div2.innerHTML = document.getElementById('newlinktpl1').innerHTML + delLink1;
  document.getElementById('newlink1').appendChild(div2);
}
// function to delete the newly added set of elements
function delIt1(eleId)
{
  d1 = document;
  var ele1 = d1.getElementById(eleId);
  var parentEle1 = d1.getElementById('newlink1');
  parentEle1.removeChild(ele1);
}
//drivers
var ct2 = 1; var ex2=0;
function new_link2()
{
  ct2++;
  var div3 = document.createElement('div');
  div3.id = ct2;
  // link to delete extended form elements
  var delLink2 = '<div style="text-align:right;margin-right:65px"><a href="javascript:delIt2('+ ct2 +')"><i class="material-icons" style="font-size:40px;color: #ff0000;">delete</i></a></div>';
  div3.innerHTML = document.getElementById('newlinktpl2').innerHTML + delLink2;
  document.getElementById('newlink2').appendChild(div3);
}
// function to delete the newly added set of elements
function delIt2(eleId)
{
  d2 = document;
  var ele2 = d2.getElementById(eleId);
  var parentEle2 = d2.getElementById('newlink2');
  parentEle2.removeChild(ele2);
}
</script>
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
  <div class="row" style="margin: 0px 20% 0px 20%; ">

    
 <div class="row">
    <form action="update_carrentals.php" method="post">
    	<div class="row"><h5>Car Rental Details</h5></div>
      <div class="row">
        <div class="input-field col s12 m12">
          <input  id="car_name" name="car_name" required type="text" class="validate"
          <?php while($row=mysqli_fetch_assoc($info)){ ?>value="<?php echo $row['name']; ?>">
          <label for="car_name">Car Rental Service Name</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">email</i>
          <input id="car_email" required type="email" name="car_email" class="validate" value="<?php echo $row['email']; ?>">
          <label for="car_email">Add company Email</label>
            <span class="helper-text" data-error="wrong" data-success="right">Check for updates on a regular basis</span>
        </div>
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">add_location</i>
          <input type="text" id="car_address" required class="materialize-textarea" name="car_address" value="<?php echo $row['location']; ?>">
          <label for="car_addres">Company Location</label>
          <span class="helper-text" data-error="wrong" data-success="right">Let people track your location</span>
        </div>
        <div class="input-field col s12 m4">
           <i class="material-icons prefix ">add_location</i>
          <input type="text" id="car_city" required class="materialize-textarea" name="car_city" value="<?php echo $row['city']; ?>">
          <label for="car_city">Add the specific city</label>
          <span class="helper-text" data-error="wrong" data-success="right">Mention the city your company is established ex: kolkata, Mumbai, Delhi, etc</span>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m3">
          <input type="text" id="car_description" class="materialize-textarea" name="car_description" value="<?php echo $row['description']; ?>">
            <label for="agency_description">How did you establish your company? Write and make your customers know more about the company</label>
        </div>
        <div class="col s12 m3">
          <span>How long has this company been into action ?</span>
          <p>
            <label>
                <input name="group1" type="radio" value="less than 1 year" checked/>
                <span>less than 1 year </span>
            </label>
          </p>
          <p>
            <label>
                <input  name="group1" type="radio" value="2-5 years" />
                <span>2-5 years</span>
            </label>
          </p>
          <p>
            <label>
                <input name="group1" type="radio" value="6-10 years" />
                <span>6-10 years</span>
            </label>
          </p>
          <p>
            <label>
                <input name="group1" type="radio" value="10+ years" />
                <span>10+ years</span>
            </label>
          </p>
        </div>


        <div class="col s12 m3">
          <span>Check all services your company provides:-</span>
          <p>
          <label>
        <input type="checkbox" name="services[]" value="Sedan cars available" />
        <span>Sedan cars available</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Long tour drivers available" />
        <span>Long tour drivers available</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Trucks and lorries available" />
        <span>Trucks and lorries available</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Personal drivers available" />
        <span>Personal drivers available</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="services[]" value="Automobile training drivers" />
        <span>Automobile training drivers</span>
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
       
      
      <div class="row">
        <div class="col s12 m5">
          <p>Want to promote your drivers? Add them</p>
           <?php   $a=explode(',', $row["drivers"]);
                      $i=0; for($j=0;$j<count($a)-1;$j++){ ?>
          <div class="row" id="newlink2">
            <div class="col s12 m12" >
                <input id="drivers" name="drivers[]" type="text" class="validate" value="<?php echo $a[$i]; ?> " pattern="[^,]+" title="',' not allowed">
                <label for="drivers">Add drivers with few details</label>
            </div>

       </div>
                      <?php
                      $i++; }?>
      
      <p id="addnew">
                <a href="javascript:new_link2()" class="btn-floating pulse green"><i class="material-icons" style="font-size:40px;color: #ffffff;">add</i></a>
      </p>
     
        <div class="row" style="display:none" id="newlinktpl2">
            <div class="col s12 m12"  >
                  <input id="drivers" name="drivers[]" type="text" class="validate" pattern="[^,]+" title="',' not allowed">
                  <label for="drivers">Add drivers with few details</label>
            </div>

        </div>
        </div>
        <div class="col s12 m2">
        <span>Check all Working days:-</span>
          <p>
          <label>
        <input type="checkbox" name="working[]" value="sunday" />
        <span>Sunday</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="working[]" value="monday" />
        <span>Monday</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="working[]" value="tuesday" />
        <span>Tuesday</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="working[]" value="wednesday" />
        <span>Wednesday</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="working[]" value="thursday"/>
        <span>Thursday</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="working[]" value="friday" />
        <span>Friday</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="working[]" value="saturday" />
        <span>Saturday</span>
          </label>
        </p>
    </div>

    <div class="col s12 m5">
      <p> Let your customers get to know about all your assets :-</p>
      <?php   $a=explode(',', $row["cars"]);
      $i=0; for($j=0;$j<count($a)-1;$j++){ ?>
      <div class="row" id="newlink1">
            <div class="col s12 m12" >
                <input id="Package" name="cars[]" type="text" class="validate" value="<?php echo $a[$i] ?>" pattern="[^,]+" title="',' not allowed">
                <label for="Package">Provide Cars availabe with details</label>
            </div>

       </div>
                      <?php
                      $i++; }?>
      <p id="addnew">
                <a href="javascript:new_link1()" class="btn-floating pulse green"><i class="material-icons" style="font-size:40px;color: #ffffff;">add</i></a>
      </p>
     
        <div class="row" style="display:none" id="newlinktpl1">
            <div class="col s12 m12"  >
                  <input id="Package" name="cars[]" type="text" class="validate" pattern="[^,]+" title="',' not allowed">
                  <label for="Package">Provide Cars availabe with details</label>
            </div>

        </div>
      </div>
</div>
      <div class="row" ><h5>Add Car Packages and tours provided if available</h5>
        <?php   $a=explode(',', $row["car_package"]);
                $b=explode(',', $row["car_description"]);
                      $i=0; for($j=0;$j<count($a)-1;$j++){ ?>
      <div class="row" id="newlink">
	<div class="col s12 m6" >
		<input id="Package" name="car_package[]" type="text" class="validate" value="<?php echo $a[$i]; ?>" pattern="[^,]+" title="',' not allowed">
          <label for="Package">Car rental packages</label>
    </div>
    <div class="col s12 m6">      
           <input type="text" id="textarea1" name="package_description[]" class="materialize-textarea" value="<?php echo $b[$i]; ?>" pattern="[^,]+" title="',' not allowed">
          <label for="textarea1">Provide every details for your customers to reach out your customers like Cars available for trips and drivers available to make them comfortable.</label>
	</div>
</div>
                      <?php
                      $i++; }?>
		<p id="addnew">
			<a href="javascript:new_link()" class="btn-floating pulse green"><i class="material-icons" style="font-size:40px;color: #ffffff;">add</i></a>
		</p>

<div class="row" style="display:none" id="newlinktpl">
	<div class="col s12 m6"  >
		<input id="Package" name="car_package[]" type="text" class="validate" pattern="[^,]+" title="',' not allowed">
          <label for="Package">Car rental packages</label>
    </div>
    <div class="col s12 m6">
           <input type="text" id="textarea1" name="package_description[]" class="materialize-textarea" pattern="[^,]+" title="',' not allowed">
          <label for="textarea1">Provide details for visitors which includes services you may inlude</label>
	</div>

</div>
<div class="row"><h5>Add Social Links</h5>
        <div class="input-field col s12 m6">
           <i class="fab fa-facebook prefix "></i>
          <input id="fb" type="url"  name="fb" value="<?php echo $row['fb'];?>">
          <label for="fb">Add Facebook page link</label>
            <span class="helper-text" >Let people follow you</span>
        </div>
        <div class="input-field col s12 m6">
           <i class="fa fa-tv prefix "></i>
          <input id="web" type="url"  name="web" value="<?php echo $row['fb']; }?>">
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
      </div>

      <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Updating models</h4>
      <p>Kindly make sure, you have updated all your details and checked all the boxes to ensure all information. This page will be LIVE 24x7 and users are going to view them.<br> Thank you!</p>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-light btn green" type="submit"  name="agree" value="agree"> I have checked and want to update</button>
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