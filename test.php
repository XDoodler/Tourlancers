<?php
/*$file = fopen("contacts.csv","a");
$dataRow = array(
            'IP' => $_SERVER['REMOTE_ADDR'],
            'OS' => $_SERVER['HTTP_USER_AGENT']
           );
fputcsv($file,$datarow);


fclose($file);

echo $_SERVER['REMOTE_ADDR']."  ".$_SERVER['HTTP_USER_AGENT'];*/

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

mail('soumitcse10@gmail.com','hi','hello',"From: info@tourlancers.com");
?>