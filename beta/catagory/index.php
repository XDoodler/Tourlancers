<?php 
      class customException extends Exception {
        public function errorMessage() {
          //error message
          $errorMsg ='Page is not found';
          return $errorMsg;
        }
      }
      
     require_once('db.php');
    if(isset($_GET['city']))
    {
      $city=filter_var($_GET['city'], FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
      if(!preg_match('/^(kolkata|puri|goa)$/',trim($city)))
      {
          header('Location: ' . '404.html');
      }
    }
    else 
    {
      
          throw new customException('');
        
     
    }
    $status="popular";

    function show_ratings($x)
    {
      if($x==0)
       {
         $rating="Unrated";
       }
       elseif($x>0.0 && $x<=1.0)
       {
         $rating="Below Average";
       }
       elseif($x>1.0 && $x<=2.0)
       {
         $rating=" Average";
       }
       elseif($x>2.0 && $x<=3.0)
       {
         $rating="Above Average";
       }
       elseif($x>3.0 && $x<=3.9)
       {
         $rating="Good";
       }
       elseif($x>3.9 && $x<=4.4)
       {
         $rating="Very Good";
       }
       elseif($x>4.4 && $x<=5.0)
       {
         $rating="Excellent";
       }
       return $rating;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>City</title>
</head>
<body style="background: linear-gradient(70deg, #ffffff 70%, #02AAB0 70%);">
<!--navbar start-->
<div class="navbar-fixed">
   <nav class="red darken-2">
      <div class="container">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo logo">Tourlancers</a>
            <a href="" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
               <ul class="right hide-on-med-and-down">
                  <li>
                      <a href="https://tourlancers.com"><i class="fas fa-home"></i> <span class="white-text">Home </span></a>
                  </li>
                
                   <li>
                      <a href="#"><i class="fas fa-male"></i> <span class="white-text">Travel Operator </span></a>
                  </li>
                   <li>
                    <a href="#"><i class="fas fa-hotel"></i> <span class="white-text">Hotels </span></a>
                  </li> 
                  
                </ul>
            </div>
         </div>
     </nav>
 </div>
 <ul class="sidenav red darken-2" id="mobile-nav">
     <h4 class="center"> <i class="material-icons">map</i> 
           <?php  
            
             echo ucfirst($city);
             ?>
     </h4>
   
    <li>
         <a href="#op"><i class="fas fa-male white-text"></i> <span class="white-text">Travel Operator </span></a>
    </li>
    <li>
         <a href="#"><i class="fas fa-hotel white-text"></i> <span class="white-text">Hotels </span></a>
    </li> 
    
 </ul>
 <!--navbar-end-->  
 <!--header-->
  <section>
     <img src="#"  alt="" class="responsive-img">
  </section>
 <!--header-End-->
 <br>
   <div class="container">
        <h4 class="hide-on-small-only"><span class="white">Tour</span><span class="white">lancers at </span><span class="red lighten-3">
        <?php  
            
             echo ucfirst($city);
             ?>
        </span></h4>
       <!--Popular Operators-->
        <h6 class="center green accent-3 card-panel" id="op"><b><i class="fas fa-male"></i> POPULAR OPERATORS</b></h6>
        <div class="row">
            <?php 
                if(isset($_GET['city']))
                {
                  $sql="SELECT * FROM tour_operators WHERE city=? ";
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute([$city]);
                  $operators = $stmt->fetchAll();
                   if($operators)
                   {
                     foreach($operators as $operator)
                      {

                    
                ?>
            <div class="col s12 m4">
              <div class="card">
                 <div class="card-image">
                   <img width="100" height="200" src="plane.png">
                     
                 </div>
                 <div class="card-content deep-purple lighten-4" style="height: 250px">
                      <h4><?php echo $operator->name; ?></h4>
                      <h6 class="red-text"> <?php echo $operator->city; ?> </h6>
                      <p><?php echo $operator->location; ?></p>
                      
                 </div>
                 <div class="card-action">
                   <a href="../business/Operators/Operator_company_page_build/user.php?id=<?php echo $operator->id?>" class="red-text">View</a>
                 </div>
              </div> 
            </div>
            <?php 
                   }
                  }
                   else { echo "<h5 class='center'><i class='material-icons orange-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>No operator is available</h5><br> ";}
                  }
                  else 
                  {
                    echo "Something Wrong Happened";
                  }
             ?>
        </div>    
       <!--Popular operators end-->
       <!--Popular Car Rentals-->
    
          <!--Popular Hotels-->
            
       <!--Popular Hotels end-->
   </div>
          <!--Social Media follow-->
          <footer class="section grey darken-1 white-text center" style="background: url('../business/img/tourlancers.png') center no-repeat   ; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">
     <section class="section section-follow  white-text center">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h4>Follow Tourlancers</h4>
                        <p>Follow us on social media for special offers</p>

                          <a href="https://www.linkedin.com/company/tourlancers" class="white-text">
                                  <i class="fab fa-linkedin fa-4x"></i>
                          </a>

                    </div>
                </div>
            </div>

           </section>

          <!--Social Media follow End-->
          <!--footer-->
      <section class="section  white-text center">
            <div class="container">
                <div class="row">
                    <div class="col s12 m4">
                      <h5>Information</h5>
                      <p>About us | Our products | Press Release</p>
                      <p>Customer Testimonial | Partner with Us </p>
                     </div>
                   <div class="col s12 m4">
                       <h5>Customer Care</h5>
                       <p>Support & FAQ | Term & Condition | Privacy Policy</p>
                       <p>User Agreement | Travel Agents</p>
                   </div>
                    <div class="col s12 m4">
                       <h5>Headquarters</h5>
                       <p>Kolkata, India</p>

                    </div>
                </div>
            </div>
        </section>


      <!--footer End-->
      <!--footer-->
    
            <p class="flow-text">Tourlancers &copy;2017-2018</p>
        </footer>
   
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

 
              