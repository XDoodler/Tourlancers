<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tourlancers</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
</head>
<body>
    <!--Nav bar start-->
    <div class="navbar-fixed">
        
            <nav class="red darken-2">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="#" class="brand-logo logo">Tourlancers.com</a>
                        <a href="" data-target="mobile-nav" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                        </a>
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="../index.php"><i class="fa fa-home"></i><span class="white-text"> Home </span></a>
                            </li>
                             <li>
                                <a class='dropdown-trigger1' href='#' data-target='dropdown1'><i class="fa fa-shopping-cart"></i> <span class="white-text"> Deals </span> <i class="material-icons right">arrow_drop_down</i></a>
                    
                               
                                <ul id='dropdown1' class='dropdown-content'>
                                  <li><a href="#!"><i class="fa fa-plane"></i> Flight</a></li>
                                  <li class="divider" tabindex="-1"></li>
                                  <li><a href="#!"><i class="fa fa-store"></i> Rooms </a></li>
                                  <li class="divider" tabindex="-1"></li>
                                  <li><a href="#!"><i class="fa fa-building"></i> Hotels </a></li>
                                  <li class="divider" tabindex="-1"></li>
                                  <li><a href="#!"><i class="fa fa-utensils"></i> Restourant </a></li>
                                  <li class="divider" tabindex="-1"></li> 
                              </ul> 
                            </li>
                            
                             <li>
                                 <a href="#Galary"><i class="fab fa-envira"></i> <span class="white-text"> Gallary </span></a>
                            </li>
                            
                            <li>
                                <a href="contact/index.php"><i class="fa fa-envelope"></i> <span class="white-text"> Contact </span></a>
                            </li>
                             <li>
                                <a class='dropdown-trigger2' href='#' data-target='dropdown2'><i class="fa fa-user"></i> <span class="white-text">Sign-up</span><i class="material-icons right">arrow_drop_down</i> </a>
                                <ul id='dropdown2' class='dropdown-content'>
                                    <li><a href="../signin-signup/sign-up.php"> Sign-up </a></li>
                                    <li class="divider" tabindex="-1"></li>
                                    <li><a href="../signin-signup/sign-in.php"> Sign-in </a></li>
                                  </ul>  
                             </li>
                                    
                                    
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <ul class="sidenav red darken-2" id="mobile-nav">
            <li>
                <a href="../index.php"><i class="fa fa-home"></i><span class="white-text"> Home </span></a>
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
                  <li><a href="#!"><i class="fa fa-utensils"></i>Restourant</a></li>
                  <li class="divider" tabindex="-1"></li>
                  
                  
                </ul>
            </li>
            
             <li>
                 <a href="#Galary"><i class="fab fa-envira"></i> <span class="white-text"> Gallary </span></a>
            </li>
            
            <li>
                    <a href="contact/index.php"><i class="fa fa-envelope"></i> <span class="white-text"> Contact </span></a>
            </li>
             <li>
                <a class='dropdown-trigger4' href='#' data-target='dropdown4'><i class="fa fa-user"></i> <span class="white-text">Sign-up</span><i class="material-icons right">arrow_drop_down</i> </a>
                <ul id='dropdown4' class='dropdown-content'>
                    <li><a href="../signin-signup/sign-up.php">Sign-up</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="../signin-signup/sign-in.php">Sign-in</a></li>
                </ul> 
            </li>
                    
                        
            </ul>
        <!--Nav bar End-->
           <!--Contact-->
    <section id="contact" class="section section-contact scrollspy">
            <div class="container">
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card-panel red darken-2 white-text center">
                            <i class="material-icons">email</i>
                             <h5>Contact us for any Query</h5>
                             <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt recusandae ex dolore! Sed,
                                  necessitatibus facere saepe sint voluptatum consectetur numquam?</p>
                        </div>
                        <ul class="collection with-header">
                            <li class="collection-header">
                                Location
                            </li>
                            <li class="collection-item">Tourlancers</li>
                            <li class="collection-item">Budge Budge,Budge Road</li>
                            <li class="collection-item">River Side,Kolkata-700137</li>
    
                        </ul>
                    </div>
                    <div class="col s12 m6">
                        <form method="post" action="email.php">
                        <div class="card-panel grey lighten-3">
                            <h5>Please Fill out this form </h5>
                            <div class="input-field">
                                <input placeholder="Name" id="first_name" type="text" class="validate" required>  
                            </div>
                            <div class="input-field">
                                    <input type="email" placeholder="Email" required>
                             </div>
                             <div class="input-field">
                                    <input type="number" placeholder="Phone" required>
                             </div>
                             <div class="input-field">
                                    <textarea class="materialize-textarea" placeholder="Enter Message" required></textarea>
                             </div>
                             <input type="submit" value="Submit" class="btn red darken-2" >
                        </div>
                       </form> 
                    </div>
                </div>
            </div>
        </section>
        <!--Conatct closed-->
        <!--footer-->
         <footer class="section grey darken-1 white-text center">
             <p class="flow-text">Tourlancers &copy;2017-2018</p>
         </footer>
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
        </script>
        
</body>
</html>