<?php 
      class customException extends Exception {
        public function errorMessage() {
          //error message
          $errorMsg ='Page is not found';
          return $errorMsg;
        }
      }
      
     require_once('../db.php');
    if(isset($_GET['FILTERED_LOCATION']))
    {
      $city=filter_var($_GET['FILTERED_LOCATION'], FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
      //$dest=filter_var($_GET['FILTERED_DESTINATION'], FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
    }
     if(isset($_GET['FILTERED_DESTINATION']))
    {
      $dest=filter_var($_GET['FILTERED_DESTINATION'], FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
      //throw new customException();
        
     
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
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="beta/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
    <script>
   var _0x285a=['hidden','GoogleAuthProvider','signInWithPopup','then','credential','accessToken','user','log','catch','code','message','auth/account-exists-with-different-credential','fetchSignInMethodsForEmail','password','signInWithEmailAndPassword','link','linkAndRetrieveDataWithCredential','signOut','document','ready','.loader','fadeOut','AIzaSyB6M9ZFNHcZ0zGl5n9Fl4veyjeH8NL7ChU','tourlancers-logins.firebaseapp.com','https://tourlancers-logins.firebaseio.com','tourlancers-logins','213279812943','initializeApp','auth','currentUser','onAuthStateChanged','getElementById','googleemail','innerHTML','email','googleemail1','style','userdrop1','display','visible','username','displayName','username1','getElementsByTagName','removeAttribute','onclick','sign\x20in','userdrop','none','dropdown10','visibility'];(function(_0x2533b2,_0x4c7085){var _0x225e37=function(_0x4f1c45){while(--_0x4f1c45){_0x2533b2['push'](_0x2533b2['shift']());}};_0x225e37(++_0x4c7085);}(_0x285a,0x148));var _0xe2c9=function(_0x2f3e31,_0x3a89c9){_0x2f3e31=_0x2f3e31-0x0;var _0x2c6db2=_0x285a[_0x2f3e31];return _0x2c6db2;};var config={'apiKey':_0xe2c9('0x0'),'authDomain':_0xe2c9('0x1'),'databaseURL':_0xe2c9('0x2'),'projectId':_0xe2c9('0x3'),'storageBucket':'tourlancers-logins.appspot.com','messagingSenderId':_0xe2c9('0x4')};firebase[_0xe2c9('0x5')](config);var user=firebase[_0xe2c9('0x6')]()[_0xe2c9('0x7')];var name,email;firebase[_0xe2c9('0x6')]()[_0xe2c9('0x8')](function(_0x2628fe){if(_0x2628fe){document[_0xe2c9('0x9')](_0xe2c9('0xa'))[_0xe2c9('0xb')]=_0x2628fe[_0xe2c9('0xc')];document[_0xe2c9('0x9')](_0xe2c9('0xd'))[_0xe2c9('0xb')]=_0x2628fe[_0xe2c9('0xc')];document[_0xe2c9('0x9')]('userdrop')[_0xe2c9('0xe')]['display']='visible';document[_0xe2c9('0x9')](_0xe2c9('0xf'))[_0xe2c9('0xe')][_0xe2c9('0x10')]=_0xe2c9('0x11');document[_0xe2c9('0x9')](_0xe2c9('0x12'))['innerHTML']=_0x2628fe[_0xe2c9('0x13')];document['getElementById'](_0xe2c9('0x14'))[_0xe2c9('0xb')]=_0x2628fe[_0xe2c9('0x13')];document[_0xe2c9('0x15')]('i')[0x0][_0xe2c9('0x16')](_0xe2c9('0x17'));}else{document[_0xe2c9('0x9')](_0xe2c9('0x12'))[_0xe2c9('0xb')]=_0xe2c9('0x18');document[_0xe2c9('0x9')]('username1')[_0xe2c9('0xb')]=_0xe2c9('0x18');document['getElementById'](_0xe2c9('0x19'))[_0xe2c9('0xe')][_0xe2c9('0x10')]='none';document[_0xe2c9('0x9')](_0xe2c9('0xf'))['style'][_0xe2c9('0x10')]=_0xe2c9('0x1a');document[_0xe2c9('0x9')](_0xe2c9('0x1b'))[_0xe2c9('0xe')][_0xe2c9('0x1c')]=_0xe2c9('0x1d');document[_0xe2c9('0x9')]('dropdown11')[_0xe2c9('0xe')][_0xe2c9('0x1c')]='hidden';}});function google(){var _0x37f0e9=new firebase[(_0xe2c9('0x6'))][(_0xe2c9('0x1e'))]();firebase[_0xe2c9('0x6')]()[_0xe2c9('0x1f')](_0x37f0e9)[_0xe2c9('0x20')](function(_0x292f49){var _0x540d31=_0x292f49[_0xe2c9('0x21')][_0xe2c9('0x22')];var _0x264f0e=_0x292f49[_0xe2c9('0x23')];console[_0xe2c9('0x24')](_0x264f0e['displayName']);console[_0xe2c9('0x24')](_0x264f0e[_0xe2c9('0xc')]);})[_0xe2c9('0x25')](function(_0x36257e){var _0x49da32=_0x36257e[_0xe2c9('0x26')];var _0x1085b0=_0x36257e[_0xe2c9('0x27')];console[_0xe2c9('0x24')](_0x49da32);console[_0xe2c9('0x24')](_0x1085b0);var _0x34cac3=_0x36257e[_0xe2c9('0xc')];var _0x4246c2=_0x36257e[_0xe2c9('0x21')];});auth[_0xe2c9('0x1f')](new firebase[(_0xe2c9('0x6'))][(_0xe2c9('0x1e'))]())[_0xe2c9('0x25')](function(_0x64fde8){if(_0x64fde8[_0xe2c9('0x26')]===_0xe2c9('0x28')){var _0x23f82c=_0x64fde8['credential'];var _0xba5d6a=_0x64fde8[_0xe2c9('0xc')];auth[_0xe2c9('0x29')](_0xba5d6a)[_0xe2c9('0x20')](function(_0x1038c7){if(_0x1038c7[0x0]===_0xe2c9('0x2a')){var _0x244d73=promptUserForPassword();auth[_0xe2c9('0x2b')](_0xba5d6a,_0x244d73)[_0xe2c9('0x20')](function(_0x9ae6ce){return _0x9ae6ce[_0xe2c9('0x2c')](_0x23f82c);})[_0xe2c9('0x20')](function(){goToApp();});return;}var _0x37f0e9=getProviderForProviderId(_0x1038c7[0x0]);auth[_0xe2c9('0x1f')](_0x37f0e9)[_0xe2c9('0x20')](function(_0x34eec2){_0x34eec2[_0xe2c9('0x23')][_0xe2c9('0x2d')](_0x23f82c)[_0xe2c9('0x20')](function(_0x3c52f8){goToApp();});});});}});}function logout(){firebase[_0xe2c9('0x6')]()[_0xe2c9('0x2e')]()[_0xe2c9('0x20')](function(){})[_0xe2c9('0x25')](function(_0x48f3ee){console[_0xe2c9('0x24')]('Not\x20Logged\x20out');});}var user=firebase['auth']()[_0xe2c9('0x7')];var name,email;$(_0xe2c9('0x2f'))[_0xe2c9('0x30')](function(_0x4d88a5){$(_0xe2c9('0x31'))[_0xe2c9('0x32')]('slow');});
       
    </script> 
    <title>TL Packages</title>
    <style>
        body{
            font-family: Quicksand;
        }
    .bt {
    background-color: white; 
    border: 1px red solid;
    color: red;
    padding: 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.bt:hover{
background-color: red;
color: white;
}
.b4 {border-radius: 12px;}
    </style>
</head>
<body style="background: #ECE9E6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FFFFFF, #ECE9E6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FFFFFF, #ECE9E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
<!--navbar start-->
<div class="navbar-fixed">
   <nav class="red darken-2">
      <div class="container">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo logo" style="font-family:Pacifico">Tourlancers</a>
            <a href="" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
               <ul class="right hide-on-med-and-down">
                  <li>
                      <a href="https://tourlancers.com"><i class="fas fa-home"></i> <span class="white-text">Home </span></a>
                  </li>
                 
                   <li>
                      <a href="#"><i class="fas fa-male"></i> <span class="white-text">Travel Operator </span></a>
                              
                </ul>
            </div>
         </div>
     </nav>
 </div>
 <ul class="sidenav red darken-2" id="mobile-nav">
     <h4 class="center"> <i class="material-icons">map</i> 
           <?php  
            
             //echo ucfirst($city);
             
             ?>
     </h4>
    
    <li>
         <a href="#op"><i class="fas fa-male white-text"></i> <span class="white-text">Travel Operator </span></a>
    </li>
      
 </ul>
 <!--navbar-end-->  
 <!--header-->
  <section class="center">
     <img src=""  alt="" class="responsive-img">
     </section>
 <!--header-End-->
 <!--Search bar-->
 <form style="margin :-10px ;" action="filter.php" method="GET">
    <div id="search" class="  white-text center scrollspy " style="background: #642B73;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
; border-radius:30px;margin: 0px 10% 0px 10%">
        <div style="padding:5px;" class="container" >
<div class="col s12 m2"><img src="s.gif"></div>
            <div class="row">
                
                <div class="col s12 m6">
                   <label for="" class="white-text">YOUR LOCATION </label>
                  <select style="margin:10px; padding:10px;" class="browser-default white accent-3 indigo-text" name="FILTERED_LOCATION">
                    <option value="" disabled selected>FROM</option>
                    <option value="kolkata">KOLKATA</option>
                    <option value="bhubaneswar">BHUBANESWAR</option>
                    <option value="delhi">DELHI</option>
                    <option value="siliguri">SILIGURI</option>
                    <option value="chandigarh">CHANDIGARH</option>

                  </select>
                </div>
                <div class="col s12 m6">
                <label for="" class="white-text"> YOUR DESTINATION</label>
                  <select style="margin:10px; padding:10px" class="browser-default white accent-3 red-text" name="FILTERED_DESTINATION">
                    <option value="" disabled selected>TO</option>
                    <option value="kolkata">KOLKATA</option>
                    <option value="shimla">SHIMLA</option>
                    <option value="puri">PURI</option>
                    <option value="manali">MANALI</option>
                    <option value="sikkim">SIKKIM</option>
                    <option value="chennai">CHENNAI</option>
                    <option value="Darjeeling">DARJEELING</option>
                    <option value="gangtok">GANGTOK</option>
                    <option value="pelling">PELLING</option>
                    <option value="bhutan">BHUTAN</option>
                    <option value="andaman">ANDAMAN</option>
                    
                    

                  </select>
                </div>
            </div>
            <div>
                <input class="btn indigo" type="submit"value="CHECK OUT PACKAGES" name="filter">
            </div>
        </div>
      </div>
   </form>   
    
 <!--Search bar end-->
 
 <br>
   <div class="container">
       
       <!--Popular Operators-->
        <?php 
           function operator($x) {
              if($x=="tour_operator"){
                  $result="PACKAGES";
                }
              else if($x=="car_rental"){
                $result="CAR RENTALS";
              }
              else{
                $result="TOUR GUIDES";
              }
               return $result;
           }
         ?>
         <?php 
             //echo " <h6 class='center green accent-3 card-panel'><b><i class='fas fa-male'> </i>".operator($_GET['FILTERED_TOUR'])."</b></h6>";
         ?>

       <!--Popular operators end-->
       <div class="row">
            <?php 
                if( isset($city) && isset($dest))
                { ?>
                    <h4 class="hide-on-small-only">Tour packages for 
        <?php  
            
             echo ucfirst($dest);
              
          ?> 
        </span></h4><?php 
                  $sql="SELECT * FROM tour_packages WHERE package_city=? AND travel_from= ?";
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute([$dest,$city]);
                  $operators = $stmt->fetchAll();
                   if($operators)
                   {
                     foreach($operators as $op) 
                      {
                           
                    
                ?>
            <div class="col s12 m6">
              <div class="card " >
                 <div class="card-image">
                   <!--<img width="100" height="100" src="operators-img/galaxy.png"> -->
                     
                 </div>
                 <div class="card-content  indigo ">
                     <?php if( $op->suggested==1){?><span class="btn indigo-text badge yellow pulse"><i class="material-icons">stars</i>TL SPECIAL DEAL</span><?php }?>
                       <h4 class="white-text "><?php echo $op->package_name; ?> </h4>
                       <h6 class="white-text "><i class="fa fa-map-marker" ></i><?php echo $op->travel_from; ?> to <?php echo $op->package_city; ?> </h6>
                     <?php if($op->tailor==0) { ?><h4 ><span class="white-text ">&#x20b9;<?php echo $op->package_fee; ?>/- </span></h4><?php } else { ?> <h4 ><span class="white-text ">TAILORABLE</span></h4><?php }?>
                 </div>
                 <div class="card-action">
                   <a href="https://tourlancers.com/beta/business/Operators/Operator_company_page_build/package.php?id=<?php echo $op->id;?>&package_id=<?php echo $op->package_id; ?>" ><p class="bt b4">View package</p></a>
                 </div>
              </div> 
            </div>
            
            <?php 
                   }
                  
                  }
                  else echo "<h5 class='center'><i class='material-icons red-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>No packages are available !</h5><br> ";
                  
                }
                   else if( !isset($city) && isset($dest)) { 
                       ?>
                    <h4 class="hide-on-small-only">Tour packages for 
        <?php  
            
             echo ucfirst($dest);
              
          ?> 
        </span></h4><?php 
                       //echo "<h5 class='center'><i class='material-icons orange-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>Noh operator is available</h5><br> ";
                  $sql="SELECT * FROM tour_packages WHERE package_city=?";
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute([$dest]);
                  $p = $stmt->fetchAll();
                   if($p)
                   {
                     foreach($p as $op) 
                      {
                           
                    
                ?>
            <div class="col s12 m6">
              <div class="card " >
                 <div class="card-image">
                   <!--<img width="100" height="100" src="operators-img/galaxy.png"> -->
                     
                 </div>
                 <div class="card-content  indigo ">
                     <?php if( $op->suggested==1){?><span class="btn indigo-text badge yellow pulse"><i class="material-icons">stars</i>TL SPECIAL DEAL</span><?php }?>
                       <h4 class="white-text "><?php echo $op->package_name; ?></h4>
                      <h6 class="white-text "><i class="fa fa-map-marker" ></i><?php echo $op->travel_from; ?> to <?php echo $op->package_city; ?> </h6>
                       <?php if($op->tailor==0) { ?><h4 ><span class="white-text ">&#x20b9;<?php echo $op->package_fee; ?>/- </span></h4><?php } else { ?> <h4 ><span class="white-text ">TAILORABLE</span></h4><?php }?>
                 </div>
                 <div class="card-action">
                   <a href="https://tourlancers.com/beta/business/Operators/Operator_company_page_build/package.php?id=<?php echo $op->id;?>&package_id=<?php echo $op->package_id; ?>" class="red-text"><p class="bt b4">View package</p></a>
                 </div>
              </div> 
            </div>
            
            <?php 
                   }
                  
                  }
                       else echo "<h5 class='center'><i class='material-icons red-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>No packages are available !</h5><br> ";
                   }
                   else if( isset($city) && !isset($dest)) { 
                       ?>
                    <h4 class="hide-on-small-only">Tour packages from 
        <?php  
            
             echo ucfirst($city);
              
          ?> 
        </span></h4><?php 
                       //echo "<h5 class='center'><i class='material-icons orange-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>Noh operator is available</h5><br> ";
                  $sql="SELECT * FROM tour_packages WHERE travel_from=?";
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute([$city]);
                  $p = $stmt->fetchAll();
                   if($p)
                   {
                     foreach($p as $op) 
                      {
                           
                    
                ?>
            <div class="col s12 m6">
              <div class="card " >
                 <div class="card-image">
                   <!--<img width="100" height="100" src="operators-img/galaxy.png"> -->
                     
                 </div>
                 <div class="card-content  indigo ">
                     <?php if( $op->suggested==1){?><span class="btn indigo-text badge yellow pulse"><i class="material-icons">stars</i>TL SPECIAL DEAL</span><?php }?>
                       <h4 class="white-text "><?php echo $op->package_name; ?></h4>
                      <h6 class="white-text "><i class="fa fa-map-marker" ></i><?php echo $op->travel_from; ?> to <?php echo $op->package_city; ?> </h6>
                      <h4 ><span class="white-text ">&#x20b9;<?php echo $op->package_fee; ?>/- </span></h4>
                 </div>
                 <div class="card-action">
                   <a href="https://tourlancers.com/beta/business/Operators/Operator_company_page_build/package.php?id=<?php echo $op->id;?>&package_id=<?php echo $op->package_id; ?>" class="red-text"><p class="bt b4">View package</p></a>
                 </div>
              </div> 
            </div>
            
            <?php 
                   }
                  
                  }
                     else echo "<h5 class='center'><i class='material-icons red-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>No packages are available !</h5><br> ";  
                   }
                   else
                   {
                       echo "<h5 class='center'><i class='material-icons red-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>Select Travelling destination or Travelling location to check out packages !</h5><br> ";
                   }
                  ?>
                  
             




             <?php 
                if(isset($city) && isset($dist))
                {
                  $sql="SELECT * FROM car_rentals WHERE city=?";
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute([$city]);
                  $crs = $stmt->fetchAll();
                   if($crs)
                   {
                     foreach($crs as $cr)
                      {

                    
                ?>
            <div class="col s12 m4">
              <div class="card">
                 <div class="card-image">
                   <img width="100" height="200" src="operators-img/twin.jpeg">
                     
                 </div>
                 <div class="card-content deep-purple lighten-4" style="height: 300px">
                      <h4><?php echo $cr->name; ?></h4>
                      <h6 class="red-text"> <?php echo $cr->city; ?> </h6>
                      <p><?php echo $cr->location; ?></p>
                      <p><span class="indigo white-text"> <?php echo $cr->description; ?> </span> <span class="green-text grey lighten-3"></span></p>
                 </div>
                 <div class="card-action">
                   <a href="../business/Car_Rentals/carrentals_company_page_build/user.php?id=<?php echo $cr->id ?>" class="red-text">View</a>
                 </div>
              </div> 
            </div>
            
            <?php 
                   }
                  
                  } 

                   else { echo "<h5 class='center'><i class='material-icons orange-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>No operator is available</h5><br> ";}
                  }
                  else 
                 
             ?>
             
        </div>    
       <!--Popular Car Rentals-->
    
      
          
       <!--Popular Car Rentals end-->
        <!--Popular Hotels-->
            
       <!--Popular Hotels end-->
   </div>
          <!--Social Media follow-->
         


      <!--footer End-->
      <!--footer-->
    
           
   
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
 <script>
     const sideNav=document.querySelector('.sidenav');
     M.Sidenav.init(sideNav,{});
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
      toolbarEnabled: true
    });
  });

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

 
              