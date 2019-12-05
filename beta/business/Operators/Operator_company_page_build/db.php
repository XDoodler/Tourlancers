<?php
// Comment Next three lines after successful connection is established and no errors are found when you run https://tourlancers.com/beta/business/db.php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/* Database connection settings */
$host = '208.91.198.170';
$user = 'tourlwg2_root';
$pass = 'M_vOku4FTEpa';
$db = 'tourlwg2_tourlancers';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$con=mysqli_connect($host,$user,$pass,$db);