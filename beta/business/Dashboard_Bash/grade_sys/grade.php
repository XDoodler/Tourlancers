<?php
/* Displays user information and some useful messages */
session_start();
require '../db.php';
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: ../Business_Logins/error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $id=$_SESSION['id'];
}
$result = $pdo->prepare("SELECT * from users where email='$email'");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);
if($row['type']=="tour_operator"){
$sql_op = $pdo->prepare("SELECT * from tour_operators where id='$id'");
$sql_op->execute();
$op = $sql_op->fetch(PDO::FETCH_ASSOC);
//$sql_clients = $pdo->prepare("SELECT * from clients where tour_id='$id'");
//$sql_clients->execute();
//$cl = $sql_clients->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
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
  <title>Standardize</title>
  <style>
      span{
          
          font-family: Cabin;
          color: black;
      }
       div.info {
    color: green;
    text-align: center;
    padding: 1px;
    font-size: 1em;
    border: 2px green solid;
    margin-bottom: 15px;
/* Special keyword values */
    background-color: transparent;

}
  </style>
  </head>
  <body style="background: #ff6e7f;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #bfe9ff, #ff6e7f);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #bfe9ff, #ff6e7f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    ">
      <form action="grade.php" method="post">
      <div class="col s12 m12 container" style="margin : 0px 20% 0px 20%">
          <h3>STANDARDIZE YOUR COMPANY</h3>
          <h6>Check out all facilities you are assuring to provide your customers :-</h6>
          <?php 
          
           if ($_SERVER['REQUEST_METHOD'] == 'POST') 
          {
            if (isset($_POST['score'])) { 
                    if(!empty($_POST["grade_score"])){
		            $grades= implode("#",$_POST["grade_score"]);}
		            else{
			            $grades="";}
			            
			            //check if operator standardized
			            $check = $pdo->prepare("SELECT * FROM grade_sys WHERE id=?") ;
                        $check->execute([$id]);
                        // We know user package exists if the rows returned are more than 0
                        if ( $check->rowCount() > 0 ) {  
                            $sql="UPDATE grade_sys SET  
                            score=?
                            WHERE id=?";
                            $pdo->prepare($sql)->execute([$grades,$id]);
                        }
			            
			            else
			            {
			            $sql="INSERT INTO grade_sys(id, score)"."VALUES(?,?)";
                        $pdo->prepare($sql)->execute([$id,$grades]);
			            }
			            $score=count(explode("#",$grades));
                        echo 
                        '<div class="info">
                        YOU HAVE '.$score.' STANDARDIZED FACILITIES !
                       <br>
                        CONGRATULATIONS ! OUR MODELS HAVE UPDATED. THANK YOU!
                        <br>
                        <button><a href="../dashboard.php"> GO TO DASHBOARD</a> </button>
                        </div>'; 
              }
            }?>
            <p>
          <label>
        <input type="checkbox" name="grade_score[]" value="Local representative">
        <span>Do you have your local representative?</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="grade_score[]" value="Support team to combat with problems of language, currency and communication">
        <span >Do you have support team to combat with problems of language, currency and communication?</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox"  name="grade_score[]" value="Contract with airlines, hotels, cruise companies, etc">
        <span >Do you have contract with airlines, hotels, cruise companies, etc?</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="grade_score[]" value="Influence over tourism boards and other government authorities in order to create 
    Packages and special group departures for destinations that might otherwise be difficult and 
    expensive to visit">
        <span >Do you have influence over tourism boards and other government authorities in order to create 
    Packages and special group departures for destinations that might otherwise be difficult and 
    expensive to visit.
    ? </span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="grade_score[]" value="Emergency medical facility">
        <span >Do you have emergency medical facility?</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="grade_score[]" value="Own food arrangement which is Tailor-made">
        <span >Do you have your own food arrangement which is Tailor-made ?</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="grade_score[]" value="Custodian of luggage of tourist">
        <span >Will you be the custodian of luggage of tourist ?</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="grade_score[]" value="Arrangements for handicapped persons">
        <span >Do you have arrangements for handicapped persons ?</span>
          </label>
        </p>
        <p>
          <label>
        <input type="checkbox" name="grade_score[]" value="Insurance coverage for tourists">
        <span >Do you have insurance coverage for tourists ?	</span>
          </label>
        </p>
        <button class="blue white-text"type="submit" name="score">STANDARDIZE</button>
        </div>
        </form>
  </body>
  </html>