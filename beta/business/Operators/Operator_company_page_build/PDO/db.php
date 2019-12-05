<?php 
  $host = '208.91.198.170';
$user = 'tourlwg2_root';
$pass = 'M_vOku4FTEpa';
$dbname = 'tourlwg2_tourlancers';

  $dsn = "mysql:host=".$host.";dbname=".$dbname.";charset=utf8mb4";
  $options = [
            PDO::ATTR_EMULATE_PREPARES   => false, 
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, 
            
           ];
  try 
    {
     $pdo = new PDO($dsn , $user , $pass , $options);
      
     } 
  catch (Exception $e) 
    {
      error_log($e->getMessage());
      exit('Connection failed'); 
    }

?>


  