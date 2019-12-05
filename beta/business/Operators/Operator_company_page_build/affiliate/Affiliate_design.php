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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Affiliate Credits</title>
</head>
<body>
    <nav>
       <div style="background: #11998e;background: -webkit-linear-gradient(to right, #38ef7d, #11998e);background: linear-gradient(to right, #38ef7d, #11998e);" class="nav-wrapper">
           <a href="#" class="brand-logo center " style="font-size: 1.5em;">Credits Points</a>
           <ul id="nav-mobile" class="right hide-on-med-and-down">
           </ul>
        </div>
    </nav>   
    <div class="row">
        <div class="col s12 m6">
            <img class="responsive-img" src="pic1.gif" alt="">
         </div> 
         <div class="col s12 m4">
             <div class="card" style="background: #fd746c;background: -webkit-linear-gradient(to right, #ff9068, #fd746c);background: linear-gradient(to right, #ff9068, #fd746c);">
                <h5 style="background: #C33764;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #1D2671, #C33764);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #1D2671, #C33764); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                font-size:1.5em; padding-top:1rem;padding-bottom:1rem;" class="center green white-text">AFFILIATE CREDIT CHECKPOINTS</h5>
                  <div class="card-content white-text">
                      
                    <h6 style="font-size:1.4rem;">Click on the below button to check your affiliate credit points</h6>
                    <form action="affiliate.php" method="post">
    

    <label for="lname">EmailID</label>
    <input type="email" id="email" name="email" placeholder="Give Your EmailID">

    
  
    <input type="submit" value="submit" name="submit" id="submit">
  </form>
                       <div class="center">
                     <button class="btn waves-effect waves-red btn-flat modal-trigger" data-target="modal1" style="background: #11998e;background: -webkit-linear-gradient(to right, #38ef7d, #11998e);background: linear-gradient(to right, #38ef7d, #11998e);" >Submit</button>
                 </div>
              </div>
          </div>
        </div>
      </div>
      <!--Modal Structure-->
      <div id="modal1" class="modal white">
         <div class="row">
            <div class="col s12 m12 center">  
                <img style="height:40%;width:40%;"src="gift_marvel.gif">
            </div>
            <div class="row">
                <div class="col s12 m12 center">
                    <div style="background: #ff4b1f;  /* fallback for old browsers */
                    background: -webkit-linear-gradient(to right, #ff9068, #ff4b1f);  /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to right, #ff9068, #ff4b1f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                    margin-right:20%;margin-left:20%; padding:2%;">
                        <p style="font-size:1.4rem;">Your Points</p>
                        <p style="font-size:2rem;">6</p>
                    </div>
                </div>
           </div>
        </div>                  
    </div>
        
     

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
     <script>
             $(document).ready(function(){
            $('.modal').modal();
            });
      
     </script>      
</body>
</html>
