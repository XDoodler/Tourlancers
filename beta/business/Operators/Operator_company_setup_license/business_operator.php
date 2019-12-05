
<?php
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['create'])) { //user logging in
    require 'accept.php';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tour Operators</title>
	 <!-- Compiled and minified CSS -->
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
    <style type="text/css">
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
    </style>
</head>
<body style="background: linear-gradient(110deg, #ffffff 50%, #ffff4d 70%); font-family: 'Cabin', sans-serif;" >
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
	<section class="section section-icons center">
		 <div class="container">
 <div class="row" style=" background-color: transparent">

      <div class="col s12 m4">
        <!-- Promo Content 1 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%); ">
        	<i class="material-icons large red-text">public</i>
                        <h4><a style="color:black;"  href="">Get online platform </a></h4>
                        <p> Maintain the page to let people join your travelling agency and have go around exploring with people
                       </p>
                        </div>
      </div>
      <div class="col s12 m4">
        <!-- Promo Content 2 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%);"><i class="material-icons large red-text">group_add</i>
                        <h4><a style="color:black;"  href="">Build Relationships</a></h4>
                        <p>We help you to connect with a large variety of traveller. Make sure to develop good relationships.
                       </p>
                        </div>
      </div>
      <div class="col s12 m4">
        <!-- Promo Content 3 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%);"><i class="fa fa-inr large red-text"></i>
                        <h4><a style="color:black;"  href="">Grow huge & <br>Earn</a></h4>
                        <p>It is better to be available online and be automated. Set up this page to grow and earn in a better way
                       </p>
                        </div>
      </div>

    </div>
</div>
</section>
    <div class="row" style="margin: 0px 20% 0px 20%; background-color: #ffffff">
    <form >
      <div class="row">
        
        <div class="input-field col s12 m12">
          <input id="company_name" type="text" class="validate">
          <label for="company_name">Your travel agency name</label>
        </div>
      </div>
      
      <div class="row">
      	<div class="input-field col s12 m6">
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Your registered Email</label>
        </div>
        <div class="input-field col m6 s12">
          <input id="password" type="password" name="pass" class="validate">
          <label for="password">Your Business Password</label>
        </div>
    </div>
      <div class="row">
      	<div class="col s12 m12">
      		<p>
      <label>
        <input type="checkbox" name="check"/>
        <span>I verify that I am the official representative of this company and have the right to act on behalf of the company in the creation of this page.
       </span>
      </label>
    </p>
      	</div>
      </div>

      <div class="row">
      	<div class="col s6 m6">
      		<a href="../../Dashboard_Bash/dashboard.php"class="waves-effect waves-light btn" >Cancel</a>
      	</div>
      	<div class="col s6 m6">
      		<a  class="waves-effect waves-light btn" href="../Operator_company_page_build/signup_operator.php">Create</a>
      	</div>
      </div>
    </form>
  </div>
            <footer class="section grey darken-1 white-text center" style="background: url('../../img/tourlancers.png') center no-repeat   ; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
     <section class="section section-follow  white-text center">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h4>Follow Tourlancers</h4>
                        <p>Follow us on social media for special offers</p>

                          <a href="https://www.linkedin.com/company/tourlancers" class="white-text">
                                  <i class="fab fa-linkedin fa-4x"></i>
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
                      <h5>Information</h5>
                      <p>About us | Our products | Press Release</p>
                      <p>Customer Testimonial | Partner with Us </p>
                     </div>
                   <div class="col s12 m4">
                       <h5>Customer Care</h5>
                       <p>Support & FAQ | Term & Condition | Privacy Policy</p>
                       <p>User Agreement | Travel Agents</p>
                   </div>
                    <div class="col s12 m4">
                       <h5>Headquarters</h5>
                       <p>Kolkata, India</p>

                    </div>
                </div>
            </div>
        </section>


      <!--footer End-->
      <!--footer-->
    
            <p class="flow-text">Tourlancers &copy;2017-2018</p>
        </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script type="text/javascript"> 
      const sideNav=document.querySelector('.sidenav');
            M.Sidenav.init(sideNav,{});
      $('.dropdown-trigger3').dropdown();
       $('.dropdown-trigger4').dropdown();</script>
      
    
</body>
</html>