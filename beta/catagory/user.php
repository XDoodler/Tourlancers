<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title>Tourlancers.com</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Anno CDN -->
    <script src="http://iamdanfox.github.io/anno.js/anno.js" type="text/javascript"></script>
    <script src="http://iamdanfox.github.io/anno.js/scrollintoview/jquery.scrollintoview.min.js" type="text/javascript"></script>

     <link href="http://iamdanfox.github.io/anno.js/anno.css" rel="stylesheet" type="text/css" />
     <!--Anno CDN-->
<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script>
var config = {
  apiKey: "AIzaSyB6M9ZFNHcZ0zGl5n9Fl4veyjeH8NL7ChU",
  authDomain: "tourlancers-logins.firebaseapp.com",
  databaseURL: "https://tourlancers-logins.firebaseio.com",
  projectId: "tourlancers-logins",
  storageBucket: "tourlancers-logins.appspot.com",
  messagingSenderId: "213279812943"
};
firebase.initializeApp(config);
var user = firebase.auth().currentUser;
var name, email;
firebase.auth().onAuthStateChanged(function(user) {
if (user) {
// User is signed in.
document.getElementById("googleemail").innerHTML=user.email;
document.getElementById("googleemail1").innerHTML=user.email;
document.getElementById("userdrop").style.display="visible";
document.getElementById("userdrop1").style.display="visible";
document.getElementById("username").innerHTML= user.displayName;
document.getElementById("username1").innerHTML= user.displayName;
// document.getElementById("userdrop").style.display="visible";
document.getElementsByTagName("i")[0].removeAttribute("onclick");

} else {
document.getElementById("username").innerHTML="sign in";
document.getElementById("username1").innerHTML="sign in";
document.getElementById("userdrop").style.display="none";
document.getElementById("userdrop1").style.display="none";
document.getElementById("dropdown10").style.visibility="hidden";
document.getElementById("dropdown11").style.visibility="hidden";
//document.getElementsByTagName("a")[0].removeAttribute("data-target");
}
});

function google(){
var provider = new firebase.auth.GoogleAuthProvider();
firebase.auth().signInWithPopup(provider).then(function(result) {
// This gives you a Google Access Token. You can use it to access the Google API.
var token = result.credential.accessToken;
// The signed-in user info.
var user = result.user;
console.log(user.displayName);
console.log(user.email);
// ...
}).catch(function(error) {
// Handle Errors here.
var errorCode = error.code;
var errorMessage = error.message;
console.log(errorCode);
console.log(errorMessage)
// The email of the user's account used.
var email = error.email;
// The firebase.auth.AuthCredential type that was used.
var credential = error.credential;
// ...
});

// Step 1.
// User tries to sign in to Google.
auth.signInWithPopup(new firebase.auth.GoogleAuthProvider()).catch(function(error) {
// An error happened.
if (error.code === 'auth/account-exists-with-different-credential') {
// Step 2.
// User's email already exists.
// The pending Google credential.
var pendingCred = error.credential;
// The provider account's email address.
var email = error.email;
// Get sign-in methods for this email.
auth.fetchSignInMethodsForEmail(email).then(function(methods) {
  // Step 3.
  // If the user has several sign-in methods,
  // the first method in the list will be the "recommended" method to use.
  if (methods[0] === 'password') {
    // Asks the user his password.
    // In real scenario, you should handle this asynchronously.
    var password = promptUserForPassword(); // TODO: implement promptUserForPassword.
    auth.signInWithEmailAndPassword(email, password).then(function(user) {
      // Step 4a.
      return user.link(pendingCred);
    }).then(function() {
      // Google account successfully linked to the existing Firebase user.
      goToApp();
    });
    return;
  }

  // TODO: implement getProviderForProviderId.
  var provider = getProviderForProviderId(methods[0]);
  auth.signInWithPopup(provider).then(function(result) {
    result.user.linkAndRetrieveDataWithCredential(pendingCred).then(function(usercred) {
      // Google account successfully linked to the existing Firebase user.
      goToApp();
    });
  });
});
}
});

}

//--------------------------------
//logout
function logout()
{
firebase.auth().signOut().then(function() {
// Sign-out successful.
}).catch(function(error) {
console.log("Not Logged out");
});
}

//user details
var user = firebase.auth().currentUser;
var name, email;

/* if (user != null) {
//name = user.displayName;
email = user.email;
document.getElementById("googleemail").innerHTML=email;
document.getElementById("googleuser").style.visibility = "visible";
document.getElementById("userdrop").style.visibility = "visible";
}
*/


</script>
<!--PAGE TOUR--> 
 <script>
    var anno1 = new Anno({
      target : 'pre:brand logo',
     content: 'This is an annotation'
})

  anno1.show();
 </script>
<!-- PAGE TOUR-->
</head>
<body bgcolor="lightgrey">
        <!--Nav bar start-->
    <div class="navbar-fixed">
        <nav class="red darken-2">
           <div class="container">
              <div class="nav-wrapper">
                  <a href="#" class="brand-logo logo">Tourlancers</a>
                  <a href="#" class="right hide-on-small-only" id="show_time"></a>
                  <a href="" data-target="mobile-nav" class="sidenav-trigger">
                  <i class="material-icons">menu</i>
                 </a>
                 <ul class="right hide-on-med-and-down">
                    <li><a class='dropdown-trigger1' href='#' data-target='dropdown1'><i class="fa fa-shopping-cart"></i> <span class="white-text"> Deals </span> <i class="material-icons right">arrow_drop_down</i></a>
                       <ul id='dropdown1' class='dropdown-content'>
                          <li><a href="#!"><i class="fa fa-store"></i>Rooms</a></li>
                          <li class="divider" tabindex="-1"></li>
                          <li><a href="#!"><i class="fa fa-building"></i>Hotels</a></li>
                          <li class="divider" tabindex="-1"></li>
                          <li><a href="#!"><i class="fa fa-user-circle"></i>Guides</a></li>
                          <li class="divider" tabindex="-1"></li>
                      </ul>
                    </li>
                     <li><a href="contact/index.php"><i class="fa fa-suitcase"></i> <span class="white-text"> TL for Business </span></a></li>
                     <li>
                         <a class='dropdown-trigger2' href='#' data-target='dropdown2'><i class="fa fa-user"></i> <span class="white-text" >Login / Sign Up</span><i class="material-icons right">arrow_drop_down</i> </a>
                         <ul id='dropdown2' class='dropdown-content'>
                            <li><a href="signin-signup/sign-up.php"> Login </a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="Logins/signin.html"> Sign Up</a></li>
                        </ul>
                    </li>
                     <li>
                        <a class='dropdown-trigger10' href='#' data-target='dropdown10'><i class="fab fa-google" onclick="google()"></i> <span class="white-text" id="username"></span>
                          <i class="material-icons right" id="userdrop" >arrow_drop_down</i></a>

                     <!-- Dropdown Structure -->
                          <ul id='dropdown10' class='dropdown-content' width="30">
                             <li><a href="#!" id="googleemail"></a></li>
                             <li><a href="#!" onclick="logout()">Logout</a></li> 
                         </ul> 
                     </li>
                 </ul>
              </div>
          </div>
       </nav>
   </div>
   <ul class="sidenav red darken-2" id="mobile-nav">
       <li>
          <a href="index.php"><i class="fa fa-home"></i><span class="white-text"> Home </span></a>
      </li>
       <li>
          <a class='dropdown-trigger3' href='#' data-target='dropdown3'><i class="fa fa-shopping-cart"></i> <span class="white-text"> Deals</span><i class="material-icons right">arrow_drop_down</i></a>

        <!-- Dropdown Structure -->
          <ul id='dropdown3' class='dropdown-content'>
             <li><a href="#!"><i class="fa fa-plane"></i>Flight</a></li>
             <li class="divider" tabindex="-1"></li>
             <li><a href="#!"><i class="fa fa-store"></i>Rooms</a></li>
             <li class="divider" tabindex="-1"></li>
             <li><a href="#!"><i class="fa fa-building"></i>Hotels</a></li>
             <li class="divider" tabindex="-1"></li>
             <li><a href="#!"><i class="fa fa-utensils"></i>Restaurant</a></li>
             <li class="divider" tabindex="-1"></li>
          </ul>
       </li>
        <li>
           <a href="#"><i class="fa fa-suitcase"></i><span class="white-text"> TL for Business </span></a>
        </li>
        <li>
           <a class='dropdown-trigger4' href='#' data-target='dropdown4'><i class="fa fa-user"></i> <span class="white-text">Login / Sign Up</span><i class="material-icons right">arrow_drop_down</i> </a>
             <ul id='dropdown4' class='dropdown-content'>
               <li><a href="signin-signup/sign-up.php">Login</a></li>
               <li class="divider" tabindex="-1"></li>
               <li><a href="Logins/signin.html">Sign Up</a></li>
           </ul>
       </li>

        <li>
         <!-- Dropdown Trigger -->
             <a class='dropdown-trigger11' href='#' data-target='dropdown11'><i class="fab fa-google"  onclick="google()"></i> <span class="white-text" id="username1"></span>
               <i class="material-icons right" id="userdrop1" >arrow_drop_down</i></a>

         <!-- Dropdown Structure -->
               <ul id='dropdown11' class='dropdown-content'>
                  <li><a href="#!" id="googleemail1"></a></li>
                  <li><a href="#!" onclick="logout()">Logout</a></li> 
              </ul> 
        </li>
     </ul>
 <!--Nav bar End-->
 <nav class="white">
    <div class="nav-wrapper">
       <a href="" style="font-size:1.5em;" class="brand-logo center red-text"><i class="material-icons red-text">person_pin</i> OPERATOR NAME</a>
       </div>
    </div>
  </nav>
 
  <section>
       <div class="row">
           <div class="col s12 m8">
              <div class="card-panel">
               <div class="row">
                  <div class="col s12 m12">
                     <img src="operators-img/travel.png" class="responsive-img" alt="">
                     <h4>Tourlancers 10202 Abalone Resort Standard</h4>
                  </div>
                  <div class="row">
                        <div class="container">
                        <div class="col s12 m12">
                          <h6><i class="fas fa-map-marker-alt red-text"></i> Arpora,Goa</h6> 
                          <p><i class="fas fa-star 4x orange-text"></i> <span class="green white-text"> 4.4 </span> <span class="green-text grey lighten-2"> Very Good </span></p>
                          <p><i class="fab fa-gg-circle green-text"></i> Exact location will be declaired after booking</p>
                          <p><a class="waves-effect waves-light modal-trigger red-text" href="#modal1"> <i class="fas fa-clipboard-list"></i> READ THE RULES</a></p>
                            <div id="modal1" class="modal">
                               <div class="modal-content">
                                 <h5 class="center">Rules & Regulations</h5> <hr>
                                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla commodi possimus 
                                    debitis fuga corrupti, architecto esse itaque odit fugit voluptatum assumenda.
                                    Illum pariatur, eligendi expedita porro voluptatibus beatae ex nihil!</p>
                              </div>
                           </div>
                        </div> 
                        </div>
                      </div>
                  </div>
               </div>
   <section>
      <!--Cars--> 
           <div class="row">
               <div class="col s12 m12">
                  <h5 class="center red white-text card">Available Cars</h5>
                   <div class="row">
                       <div class="col s12 m4">
                           <div class="card-panel indigo white-text center">
                               <h5 class="center"> CAR 1</h5>
                                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus quidem eum
                                 ullam nesciunt perferendis ducimus architecto assumenda molestiae vitae esse? </P>
                           </div> 
                      </div>
                      
                     
                   </div>
               </div>
           </div>
      <!--Cars end-->  
</section>  
<section>
      <!--Drivers details--> 
           <div class="row">
               <div class="col s12 m12">
                  <h5 class="center red white-text card">DRIVERS DETAILS</h5>
                   <div class="row">
                       <div class="col s12 m4">
                           <div class="card-panel indigo white-text center">
                               <h5 class="center"> DRIVER 1</h5>
                                <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus quidem eum
                                 ullam nesciunt perferendis ducimus architecto assumenda molestiae vitae esse? </P>
                           </div> 
                      </div>
                      
                     
                   </div>
               </div>
           </div>
      <!--drivers details end-->  
  </section>  
</div>
      
         <div class="col s12 m4">
            <div class="card-panel">
             <div class="row">
                 <div class="col s12">
                    <h5><span class="green-text">&#8377;</span> 3400 /-</h5>
                     <p><b class="grey lighten-2 green-text"> Discount </b><span class="orange white-text"> 68%</span></p>
                      <p class="grey-text">(Inclsive of all taxes)</p>
                      <a class="waves-effect waves-light btn red white-text btn-large" href="#">Book Now</a>
                 </div>
             </div>
           </div>
           <div class="card-panel">
             <div class="row">
                 <div class="col s12">
                    <h5 class="center red white-text"> Services</h5>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, sint facere
                      officiis exercitationem facilis rem labore officia omnis natus debitis nam. Commodi
                       praesentium rerum asperiores voluptatibus eos assumenda voluptates consectetur.</p>
                 </div>
             </div>
           </div>
           <div class="card-panel">
             <div class="row">
                 <div class="col s12">
                    <h5 class="white-text red center"> Reviews</h5>
                      <p><i class="fas fa-star 4x green-text"></i><i class="fas fa-star 4x green-text"></i>
                         <i class="fas fa-star 4x green-text"></i><i class="fas fa-star 4x green-text"></i>
                         <i class="fas fa-star 4x green-text"></i> <span class="grey lighten-2"> 45 People reviewed</span>
                       </p>
                       <p><i class="fas fa-star 4x green-text"></i><i class="fas fa-star 4x green-text"></i>
                          <i class="fas fa-star 4x green-text"></i><i class="fas fa-star 4x green-text"></i>
                          <span class="grey lighten-2">27 People reviewed</span>
                       </p>
                       <p><i class="fas fa-star 4x green-text"></i><i class="fas fa-star 4x green-text"></i>
                          <i class="fas fa-star 4x green-text"></i>
                          <span class="grey lighten-2">12 People reviewed</span>
                       </p>
                       <p><i class="fas fa-star 4x orange-text"></i><i class="fas fa-star 4x orange-text"></i>
                          <span class="grey lighten-2">6 People reviewed</span>
                       </p>
                       <p><i class="fas fa-star 4x red-text"></i>
                          <span class="grey lighten-2">2 People reviewed</span>
                       </p>
                 </div>
             </div>
           </div>
         </div> 
       </div>
 </section>
      <!--Social Media follow-->
      <div class="bgimg">
      <section class="section  section-follow grey darken-1 white-text center">
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
      <section class="section grey darken-1 white-text center">
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
       


     
     
     <footer>
            <p class="flow-text">Tourlancers &copy;2017-2018</p>
      </footer>
      </section>
    </div>
       <!--footer end-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
        const sideNav=document.querySelector('.sidenav');
         M.Sidenav.init(sideNav,{});
        $('.dropdown-trigger1').dropdown();
        $('.dropdown-trigger2').dropdown();
        $('.dropdown-trigger3').dropdown();
        $('.dropdown-trigger4').dropdown();
        $('.dropdown-trigger5').dropdown();
        $('.dropdown-trigger6').dropdown();
        $(document).ready(function(){
         $('.modal').modal();
        });
       



//slider
const slider=document.querySelector('.slider');
M.Slider.init(slider,{
      indicators:false,
      height:400,
      transition:500,
      interval:3000});
const mb=document.querySelectorAll('.materialboxed');
M.Materialbox.init(mb,{});
    </script>
</body>
</html>