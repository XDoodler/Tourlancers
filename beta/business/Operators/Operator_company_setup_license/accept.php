<?php
/* Displays user information and some useful messages */
;
require '../../Business_Logins/db.php';
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

        $mail = $mysqli->escape_string($_POST['email']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$mail'");

        if ( $result->num_rows == 0 )
        { // User doesn't exist
            echo
              '<div class="info">
              Sorry! Email not valid. 
              </div>';
              header('Location: business_operator.php');
        }
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['pass'], $user['password']) ) 
    {
      header('Location : ../Operator_company_page_build/signup_operator.php');
    }
  }
}
}
?>