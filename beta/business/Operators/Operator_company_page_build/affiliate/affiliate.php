<?php
require 'db.php';
    if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['submit']))
	{
    
    $data=$_POST;
    $email=$data['email'];
    $credit="SELECT * FROM affiliate ";
		    $query1=mysqli_query($con,$credit); 
		     
		    $flag=0;
		    while($row2=mysqli_fetch_assoc($query1))
			if($email==$row2['email']){
			    
			    echo $row2['credits'];
			    $flag=1;
			    break;
			} 
			if ($flag==0)echo "Invalid Email";
}
}

?>
<!DOCTYPE html>
<html>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>

<h3>Affiliate Credits Checkpoint</h3>

<div>
  <form action="affiliate.php" method="post">
    

    <label for="lname">EmailID</label>
    <input type="email" id="email" name="email" placeholder="Give Your EmailID">

    
  
    <input type="submit" value="submit" name="submit" id="submit">
  </form>
</div>

</body>
</html>
