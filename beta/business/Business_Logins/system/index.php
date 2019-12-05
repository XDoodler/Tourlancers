<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Compiled and minified JavaScript -->
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tourlancer for Business Portal</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
      body {
    background: url('../business_bg.png') no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
      }
    </style>
  <?php include 'css/css.html'; ?>
</head>

<?php 
/*if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        if(!preg_match('/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/', trim($mysqli->escape_string($_POST["contact"])))) {
            
     echo 
              '<div class="info">
              Only Valid Mobile Numbers are allowed !
              </div>';
} 
        else {require 'register.php';}
    }
    
    */
    

?>
<body>
  <div class="navbar-fixed">

        <nav class="indigo darken-2">
             
            
                <div class="nav-wrapper">
                    <a href="http://tourlancers.com/beta/business/Business_Logins" class="brand-logo logo" style="font-family: 'Pacifico'; font-size: 1.8em">Tourlancers<span style="font-family: Cabin; font-size: .4em"> <strong>  BUSINESS</strong> </a>

                    <a href="#" class="right hide-on-small-only"></a>
                    <a href="" data-target="mobile-nav" class="sidenav-trigger">
                       <ul class="right hide-on-med-and-down">
                           <li><a href="http://tourlancers.com"  style="font-family: 'Cabin'">SWITCH BACK</a></li>
                           </ul>
                    </a>
                    
                </div>
                
            
        </nav>
    </div>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Login</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Welcome Back!</h1>
          <?php 
          if ($_SERVER['REQUEST_METHOD'] == 'POST') 
          {
            if (isset($_POST['login'])) {
              if(!filter_var($mysqli->escape_string($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                echo 
              '<div class="info">
              Please provide a valid email id to enter the control panel !
              </div>';
            }
            else
            {
                require 'login.php';
            }
          }
         }
          ?>
          <form action="index.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="on" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          
          <button class="button button-block" name="login" />Log In</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          <?php 
          if ($_SERVER['REQUEST_METHOD'] == 'POST') 
          {
          if (isset($_POST['register'])) { //user registering
        if(!preg_match('/^[6-9][0-9]{9}$/', trim($mysqli->escape_string($_POST["contact"])))) {
            
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
            elseif(!preg_match('/^[a-z0-9 .\-]+$/i',$mysqli->escape_string($_POST["firstname"]) )) {
                echo 
              '<div class="info">
              Your name cannot be accepted :/
              </div>';
            }
            elseif(!preg_match('/^[a-z0-9 .\-]+$/i',$mysqli->escape_string($_POST["lastname"]) )) {
                echo 
              '<div class="info">
              Your name cannot be accepted :/
              </div>';
            }
             elseif(strlen(($mysqli->escape_string($_POST["password"])))<8) {
                echo 
              '<div class="info">
              Password not in correct form
              </div>';
            }
        else {require 'register.php';}
        
            }
          }
          ?>
          
          <form action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email'/>
          </div>

          <div class="field-wrap">
            <label>
              Contact Number<span class="req">*</span>
            </label>
            <input type="number" required autocomplete="off" name='contact' pattern="/^[6-9][0-9]{9}$/" title="Valid Mobile Numbers" />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name='password' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
          </div>
          <div class="field-wrap">
               <input type="checkbox" name="tc" checked>
        <span>I have read and understood all the terms and conditions of TL for Business as mentioned in <a style="color:white"href="t&c.pdf">Terms and Conditions</a>. I will not proceed without reading the documents of Tourlancers. </span> 
              </div>
          <button type="submit" class="button button-block" name="register" />Sign up</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      <a href="http://tourlancers.com"  style="font-family: 'Cabin'">SWITCH BACK</a></li>
</div> <!-- /form -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  

    <script src="js/index.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
         const sideNav=document.querySelector('.sidenav');
            M.Sidenav.init(sideNav,{});
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
