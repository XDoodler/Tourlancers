<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];


// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$contactno = $mysqli->escape_string($_POST['contact']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

 

//SANITIZING ALL THE FIELDS 

$first_name=filter_var($first_name, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH); 
$last_name=filter_var($last_name, FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
$email=filter_var($email, FILTER_SANITIZE_EMAIL);
$contactno=filter_var($contactno,FILTER_VALIDATE_INT); 
$password=filter_var($password, FILTER_SANITIZE_STRING);
$hash=filter_var($hash, FILTER_SANITIZE_STRING);
//
// PREVENTION FROM SHELLSCRIPT

 $first_name=escapeshellarg($first_name);
 $last_name=escapeshellarg($last_name);
 $email=escapeshellarg($email);
 $contactno=escapeshellarg($contactno);
 $password=escapeshellarg($password);
 $hash=escapeshellarg($hash);
 
 


// Check if user with that email already exists
$email=str_replace("'","",$email);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") ;

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $first_name=str_replace("'","",$first_name);
    $last_name=str_replace("'","",$last_name);
    $contactno=str_replace("'","",$contactno);
    $password=str_replace("'","",$password);
    $hash=str_replace("'","",$hash);
    $id=hash('SHA256',$email);
    $sql = "INSERT INTO users (id,first_name, last_name, email, contactno, password, hash) " 
            . "VALUES ('$id','$first_name','$last_name','$email', '$contactno','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

       /* $r = "SELECT * FROM users WHERE email='$email'";
        $p=mysqli_query($mysqli,$r);
        while($row = mysqli_fetch_assoc($p)) { $_SESSION['id']= $row["id"];}
        
        $idhash=$first_name.$last_name.$email.$password;
        $sql_update="INSERT users SET id = CAST(SHA(CONCAT($first_name, $last_name, $email,  256)) AS CHAR) WHERE email='$email'";
        $mysqli->query($sql_update);
*/


        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        
        $subject = 'Account Verification ( tourlancers.com )';
        $message_body = 'Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        https://www.tourlancers.com/beta/business/Business_Logins/verify.php?email='.$email.'&hash='.$hash;  
        $headers = "From: info@tourlancers.com" ;
        mail( $to, $subject, $message_body, $headers );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed! Try again :(';
        header("location: error.php");
    }

}
?>