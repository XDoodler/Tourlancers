<?php
require 'PDO/db.php';
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( !isset($_SESSION['logged_in'])) {
    //If the user is not logged in then check the url for unique email
    if(isset($_GET['update_level_pkg_id'])) {
        $id = $_GET['update_level_pkg_id'];
    } else {
        //If the user is not logged in and also the url doesn't contain unique email then we can't render the company page.
        $_SESSION['message'] = "Some ERROR Occured! Login again!";
        header("location: ../../Business_Logins/error.php");
    }    
}
else if ( isset($_SESSION['logged_in'])) {
    //If the user is not logged in then check the url for unique email
    if(isset($_GET['update_level_pkg_id'])) {
        $id = $_GET['update_level_pkg_id'];
    }
    else {
      $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $id=$_SESSION['id'];
    }
}
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['update'])) { //user logging in

        require 'pkgmanager_db.php';
        
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Packages</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
   
<style type="text/css">
  .purple-border textarea {
    border: 2px solid #ba68c8;
}
.purple-border .form-control:focus {
    border: 2px solid #ba68c8;
    box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, .25);
}
label{
   color:black ; 
   font-size:1em;
}
#stat
{
    color: red;
    
}
</style>
    </head>
    <body style="font-family: Quicksand;
   background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
      <form action="packagemanage.php" method="post">
 <?php 
$packages = $pdo->prepare("SELECT * FROM tour_packages WHERE package_id = '$id'");
$packages->execute();
$p = $packages->fetch(PDO::FETCH_ASSOC);
?>
                     
      
         <div class="row" style="margin: 0px 20% 0px 20%; font-size: 20px">
             <h4> <img src="build.gif"><strong>PACKAGE UPDATE MODEL</strong></h4>
             <input type="hidden" name="pkg_id" value="<?php echo $id; ?>" >
             <div class="row">
             <div class="col s12 m6">
                  <span>Package status :-</span>
          <p>
            <label>
                <input name="status" type="radio" value="1" checked>
                <span>Make it visible for users to check and book</span>
            </label>
          </p>
          <p>
            <label>
                <input name="status" type="radio" value="0">
                <span>Temporarily close this package, due to some personal issues</span>
            </label>
          </p>
             </div>
             <div class="row">
             <div class="col s12 m6">
                  <span>Package Type :-</span>
          <p>
            <label>
                <input name="tailor" type="radio" value="1" >
                <span >It's A Tailored Package</span>
            </label>
          </p>
          <p>
            <label>
                <input name="tailor" type="radio" value="0" checked>
                <span>It's A Readymade Package</span>
            </label>
          </p>
             </div></div>
              <div class="col s12 m6">
                  <h5>Current Package status: </h5>
                  <?php if($p["status"]==1) echo "<b id='stat'>package is Active</b>";
                  else echo "<b id='stat'>package is shut down</b>"; ?>
                  </div>
                   <div class="col s12 m6">
                  <h5>Package type: </h5>
                  <?php if($p["tailor"]==1) echo "<b id='stat'>Tailorable Package</b>";
                  else echo "<b id='stat'>Readymade Package</b>"; ?>
                  </div>
              
              <div class="col s12 m6" >
      <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">DEPARTURE CITY<span style="font-size: .6em"> {Example: Kolkata, Rajasthan, Puri}</span><label>
    <textarea class="form-control" id="exampleFormControlTextarea4" required rows="3" name="from" ><?php echo $p["travel_from"];  ?></textarea>
    </div></div>
             <div class="col s12 m6" >
      <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">TRAVELLING CITY<span style="font-size: .6em"> {Example: Kolkata, Rajasthan, Puri}</span> </label>
    <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="city" ><?php echo $p["package_city"];  ?></textarea>
    </div></div>
    <div class="col s12 m6" >
        <label for="exampleFormControlTextarea4">PACKAGE FROM AND TO DATE RANGE </label>
     <input type="text" name="daterange" value="<?php echo $p["dates"];  ?>" />
</div>
    
          <div class="col s12 m12" >
    <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">PACKAGE NAME </label>
    <textarea class="form-control" id="exampleFormControlTextarea4" name="name" readonly rows="3"><?php echo $p["package_name"];  ?></textarea>
    </div>
    </div>
    <div class="col s12 m12">      
    <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">PLACES TO VISIT. SEPERATE THEM WITH ' , '</label>
    <textarea class="form-control" id="exampleFormControlTextarea4" name="places" rows="3"><?php echo $p["package_places"];  ?></textarea>
    </div>
  </div>
        
      <div class="col s12 m12" >
     <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">SHORT DESCRIPTION ABOUT THE PACKAGE</label>
    <textarea class="form-control" id="exampleFormControlTextarea4" name="details"rows="3"><?php echo $p["package_details"];  ?></textarea>
    </div>
          </div>
  <div class="col s12 m12">      
          <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">WRITE WHOLE PACKAGE ITINERARY </label>
    <div id="editor" onclick="save(); return false;"><?php echo $p["package_itinerary"];  ?></div>
    <input type="hidden" id="itinerary" name="itinerary" >
    </div>
    <button class="waves-effect waves-light btn red" onclick="save(); return false;">Update Itinerary</button>
  </div>
  
  
  <div class="col s12 m8">      
          <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">PACKAGE AMOUNT PER INDIVIDUAL IN </label>
    INR<span style="font-size: .6em"> {Example: 34999, 56988} OR 0 IF TAILORED</span> <input type="number" class="form-control" id="exampleFormControlTextarea4" name="fee" rows="3" value="<?php echo $p["package_fee"];  ?>" >
    </div>
  </div>
   <div class="col s12 m6">
    <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">WHAT DOES THIS AMOUNT<strong> INCLUDE</strong>?SEPERATE THEM USING COMMAS ","</label>
    <textarea  class="form-control" id="exampleFormControlTextarea4" name="includes" rows="3" required><?php echo $p["Inclusions"];  ?></textarea>
    </div>
  </div>
   <div class="col s12 m6">
    <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">WHAT DOES THIS AMOUNT<strong> EXCLUDE</strong>?SEPERATE THEM USING COMMAS ","</label>
    <textarea  class="form-control" id="exampleFormControlTextarea4" name="excludes" rows="3" required><?php echo $p["Exclusions"];  ?></textarea>
    </div>
  </div>
  <div class="col s12 m12">
    <div class="form-group purple-border">
    <label for="exampleFormControlTextarea4">Have Special Services? ADD ALL TO ENGAGE CUSTOMERS (SEPERATE THEM USING COMMAS " , ")</label>
    <textarea  class="form-control" id="exampleFormControlTextarea4" name="sp_services" rows="3" ><?php echo $p["special_service"];  ?></textarea>
    </div>
  </div>

 <div class="col s12 m12"><button class="waves-effect waves-light btn indigo modal-trigger" data-target="modal1" href="#modal1" onclick="save(); return false;">Update Package</button></div>
</div>
    



<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Update models</h4>
      <p>Kindly make sure, you have updated all your details and checked all the boxes to ensure all information. This page will be LIVE 24x7 and users are going to view them.<br> Thank you!</p>
    </div>
    <div class="modal-footer">
      <button class="waves-effect waves-light btn green" type="submit"  name="update">I have updated my details</button>
    </div>
  </div>

</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
      $('.modal').modal();
      </script>
      <!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script type="application/javascript">
var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
 

                 // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction
  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

var quill = new Quill('#editor', {
  modules: {
    toolbar: toolbarOptions
  },
  theme: 'snow'
});

function save(){
var itinerary=$(".ql-editor").html();
document.getElementById("itinerary").value=itinerary;
console.log(document.getElementById("itinerary").value);
}
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>

    </body>

    </html>
