
<?php
/* Displays user information and some useful messages */
session_start();
require 'db.php';
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: ../Business_Logins/error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $id=$_SESSION['id'];
}
$result = $pdo->prepare("SELECT * from users where email=?");
$result->execute([$email]);
$row = $result->fetch(PDO::FETCH_ASSOC);
if($row['type']=="tour_operator"){
$sql_op = $pdo->prepare("SELECT * from tour_operators where id=?");
$sql_op->execute([$id]);
$op = $sql_op->fetch(PDO::FETCH_ASSOC);
//$sql_clients = $pdo->prepare("SELECT * from clients where tour_id='$id'");
//$sql_clients->execute();
//$cl = $sql_clients->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
   <!-- Compiled and minified CSS -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <title>Business</title>
   <style>
      body 
    {
      background: linear-gradient(110deg, #809fff 70%, #99b3ff 70%);
      background-repeat: no-repeat;
      font-family: 'Cabin', sans-serif;
    }
     .logo{
     font-family: 'Pacifico', cursive;
   }
   .context{
     background: linear-gradient(60deg, #809fff 70%, #99b3ff 70%);
      background-repeat: no-repeat;
   }
   .docs{
    font: Pacifico;
     font-size: 20px;
      color: white;
   }
   </style>
</head>
<body>
     
     <!--Nav bar start-->
    <div class="navbar-fixed">

        <nav class="indigo">
             
            
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo logo">The Bash</a>
                    <a href="#" class="right hide-on-small-only"></a>
                    <a href="" data-target="mobile-nav" class="sidenav-trigger">
                        <i class="material-icons">menu</i>
                    </a>
                    <!--  username diplay -->
                     <ul class="right hide-on-med-and-down">

                         <li>
                            <a class='dropdown-trigger3' href='#' data-target='dropdown3'><i class="fa fa-user"></i> <span class="white-text">Hello <?php  echo $first_name;?> </span> <i class="material-icons right">arrow_drop_down</i></a>


                            <ul id='dropdown3' class='dropdown-content' >

                              
                              <li><a href="#!" style="color: indigo"> <?php  echo $email  ?> </a></li>
                              <li class="divider" tabindex="-1"></li>
                              <li><a href="../Business_Logins/logout.php" style="color: indigo">Logout</a></li>
                              <li class="divider" tabindex="-1"></li>
                          </ul>
                        </li>
                    </ul>
                    <ul class="right hide-on-med-and-down">

                         <li>
                            <a class='dropdown-trigger1' href='#' data-target='dropdown1'><i class="fa fa-shopping-cart"></i> <span class="white-text">Set up company page</span> <i class="material-icons right">arrow_drop_down</i></a>


                            <ul id='dropdown1' class='dropdown-content' >

                              <li><a href="../Operators/Operator_company_page_build/signup_operator.php" style="color: indigo">Tour Operators</a></li>
                              <li class="divider" tabindex="-1"></li>
                              
                          </ul>
                        </li>
                    </ul>
                </div>
            
        </nav>
    </div>
    
    <ul class="sidenav red darken-2" id="mobile-nav">
        <li>
            <a href="dashboard.php"><i class="fa fa-home"></i><span class="white-text"> Home </span></a>
        </li>
        <li>
                            <a class='dropdown-trigger4' href='#' data-target='dropdown4'><i class="fa fa-user"></i> <span class="white-text">Hello <?php  echo $first_name;?> </span> <i class="material-icons right">arrow_drop_down</i></a>


                            <ul id='dropdown4' class='dropdown-content' >

                              
                              <li><a href="#!" style="color: indigo"> <?php  echo $email  ?> </a></li>
                              <li class="divider" tabindex="-1"></li>
                              <li><a href="../Business_Logins/logout.php" style="color: indigo">Logout</a></li>
                              <li class="divider" tabindex="-1"></li>
                          </ul>
                        </li>
        <li>
            <a class='dropdown-trigger2' href='#' data-target='dropdown2'><i class="fa fa-shopping-cart"></i> <span class="white-text"> Build Company Page</span><i class="material-icons right">arrow_drop_down</i></a>

            <!-- Dropdown Structure -->
            <ul id='dropdown2' class='dropdown-content'>
                <li><a href="../Operators/Operator_company_page_build/signup_operator.php">Tour Operators</a></li>
                <li class="divider" tabindex="-1"></li>
                
                
           </ul>
        </li>



       
        </ul>
    <!--Nav bar End-->
   <div class="row">
    <div class="col s12 m4">
      <div class="card red lighten-2">
        <div class="card-content white-text">
          <span class="card-title"><?php if($row["page"]=='1'){echo $op["name"]; } else {?>Once you build your page. We will update your models<?php } ?></span>
          
        </div>
        <?php if($row['page']=='1'){?>
            <div class="card-action indigo">
              <?php if($row['type']=='tour_operator'){ ?>
          <a class="tooltipped1" data-position="top" data-tooltip="TL for Business Page is LIVE ! View my page" href="../Operators/Operator_company_page_build/user.php"><i class="fa fa-eye"></i></a>
          <a class= "modal-trigger" data-target="modal_t" href="#modal_t"><i class="fa fa-share-alt"></i></a>
          <a href="../Operators/Operator_company_page_build/update_operator.php" class="tooltipped2" data-position="top" data-tooltip="Update your page" ><i class="fa fa-edit"></i></a>
          <a  href="grade_sys/grade.php"><i class="fa fa-star"></i></a>
          <a class= "modal-trigger" data-target="modal_info" href="#modal_info" class="tooltipped3" data-position="top" data-tooltip="Contact us"><i class="fa fa-info-circle"></i></a>
          <a class= "modal-trigger" data-target="modal_delete" href="#modal_delete" class="tooltipped4" data-position="top" data-tooltip="Request for a delete"><i class="fa fa-trash"></i></a>
          <!--<a class= "modal-trigger" data-target="modal_youtube" href="#modal_youtube" ><i class="fa fa-play"></i></a>-->
           <a class= "modal-trigger" data-target="modal_pay" href="#modal_pay" ><i class="fa fa-inr"></i></a>
           
        <?php } ?>
         <?php if($row['type']=='car_rental'){ ?>
          <a class="tooltipped1" data-position="top" data-tooltip="TL for Business Page is LIVE !" href="../Car_Rentals/carrentals_company_page_build/user.php">View page</a>
          <a class= "modal-trigger" data-target="modal_c" href="#modal_c"><i class="fa fa-share-alt"></i></a>
          <a href="../Car_Rentals/carrentals_company_page_build/update_carrentals.php" class="tooltipped2" data-position="top" data-tooltip="Update your page" ><i class="fa fa-edit"></i></a>
        <?php } ?>
          </div>
           <?php 
           
         }
       ?>
        
      </div>
    </div>
        <!--package manager -->
         <?php if($row['page']=='1'){  ?>
  <div class="col s12 m4">
     
      <div class="card blue">
        <div class="card-content white-text">
           <span class="card-title"> PACKAGE MANAGER <a class="btn waves-effect waves-light red" href="../Operators/Operator_company_page_build/add_package.php">Add Packages</a></span>
        

            </div>
            
            <div class="card-action indigo">
                <?php 
                $t_pkgs=$pdo->prepare("SELECT * from tour_packages where id='$id' ");
                $t_pkgs->execute();
                $pkg=$t_pkgs->fetchAll();
                foreach($pkg as $p)
                      {
                ?>
                <a href="../Operators/Operator_company_page_build/packagemanage.php?update_level_pkg_id=<?php echo $p->package_id;?>"><i class="fa fa-file"></i></a>
                 <?php } ?>
            </div>
    </div>
  
    </div>
    
    <!--bookings manager-->
   
  <div class="col s12 m4">
     
      <div class="card green lighten-2">
        <div class="card-content white-text">
           <span class="card-title">BOOKINGS</span>
            </div>
            <div class="card-action indigo"><a class= "modal-trigger" data-target="modal_b" href="#modal_b">View Bookings</a></div>
    </div>
  
    </div> 
    
     
 <?php } ?>
  </div>
 <div id="modal_b" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Your Real-time seat reservations! </h4>
        <p>You are advised to call and finalize the tour with your customer.</p>
      <table>
        <thead>
          <tr>
              <th>Date</th>
              <th>Package Name</th>
              <th>Client's Name</th>
              <th>Client's E-mail</th>
              <th>Client's Mobile</th>
              <th>Tourists booked</th>
              <th>Payment status</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
            <?php 
                $sql_clients = $pdo->prepare("SELECT * from clients where tour_id=? and paid=1");
                $sql_clients->execute([$id]);
                $cl = $sql_clients->fetchAll(); 
                if($cl)
                   {
                     foreach($cl as $c)
                      {?>
                      <tr>
            <td><?php echo $c->date; ?></td>
            <td><?php echo $c->pkg; ?></td>
            <td><?php echo $c->name; ?></td>
            <td><?php echo $c->email; ?></td>
            <td><?php echo $c->number; ?></td>
            <td><?php echo $c->person; ?></td>
            <td>PAID</td>
            <td class="green-text">CALL YOUR CUSTOMER!</td>
          </tr>
          <?php
          }
                   }
                   else { echo "<h5 class='center'><i class='material-icons orange-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>No bookings for now!</h5><br> ";}?>
          </tbody>
          </table>
  </div>
</div>
    </div>
    <!--end of bookings manager -->
   
  
  <div id="modal_t" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Share your page!!!</h4>
      <p>https://www.tourlancers.com/beta/business/Operators/Operator_company_page_build/user.php?id=<?php echo $_SESSION['id']; ?></p>
    </div>
  </div>
  <div id="modal_pay" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Mail us your Banking details</h4>
      <p>Tourlancers will deposit the Rewards in your account<br>

      <br>
      We are keeping this end-to-end. Thereby, Mail to us or call us at these:
      info@tourlancers.com
      Call us at (+91)7044750098 / +91 70030 79055 this. 
      <br>and provide all the banking details after you have seen.
      Your decision is always respected !</p>
  </div>
  </div>
  <div id="modal_info" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Contact us at</h4>
      <p>info@tourlancers.com</p>
      <p>help@xdoodler.com</p>
      <p>tourlancer2017@gmail.com</p>
      <p>Or Call us at (+91)7044750098 / +91 70030 79055</p>
      <p>24x7 Support Guarenteed</p>
    </div>
  </div>
   <div id="modal_delete" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Want to remove your page from Tourlancers?</h4>
      <p>Mail us all your details, which includes your Email Id, Contact, Copy & paste the link from 'Share your Page' button.
      Provide specific reasons of removing the page from our platform. <br>
      Our Email-ID : info@tourlancers.com<br>
      Or Call us at: (+91)7044750098 / +91 70030 79055
      <br> Your decision is always our priority.</p>
    </div>
  </div>
  <div id="modal_youtube" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Watch this video:</h4>
      <iframe class="col s-12" width="765" height="350" src="https://www.youtube.com/embed/zfU8qfLmXyw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
    </div>
    </div>
    
  <div id="modal_c" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Share your page!!!</h4>
      <p>https://www.tourlancers.com/beta/business/Car_Rentals/carrentals_company_page_build/user.php?id=<?php echo $_SESSION['id']; ?></p>
    </div>
  </div>
   <div class="context" style="background: linear-gradient(70deg, #ff6666 70%, #ff8080 70%);
      background-repeat: no-repeat;">
     <ul class="collapsible">
          <li>
      <div class="collapsible-header"><i class="material-icons">link</i>Shorten Page URL</div>
      <div class="collapsible-body"><span class="docs" style="color: black;"> <form action="https://tinyurl.com/create.php" method="post" target="_blank">
<table align="center" cellpadding="5" bgcolor="#E7E7F7"><tr><td>
<b>Enter Your Package/Company Page URL To Shorten Them For Ease In Sharing <a href="https://tinyurl.com">tiny</a>:</b><br />
<input type="text" name="url" size="30"><input type="submit" name="submit" value="Make TinyURL!">
</td></tr></table>
</form> </span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">business_center</i>Why TL for Business ?</div>
      <div class="collapsible-body"><span class="docs">Tourlancers ties up with the best Travel services of India and helps them to grow. We understand that your company needs a platform to showcase the works and how the company stands out in the real-world. Join the community. Build the company pages and you are all done. Tourlancers provides you with the best in class deals for your business. We provide you with the most verified and simplified system to manage your business online.Our system is designed in an user friendly way so that you experience a smoother flow. You can scale up your online exposure with our rich platform. Your business is expected to grow 3X faster with our unique features. Tourlancers comes up with easy finances. We have secure payment gateways and fully automated booking systems. Here at Tourlancers, we ensure you with our motto, "Let's travel together"</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">live_help</i>How it works ?</div>
      <div class="collapsible-body"><span class="docs">Once you signup with us for your business account, you can customize your business profile with all the details you wish to put in it. Followed by that we will have a telephonic conversation . Once done, you can set up your payment methods. You can monitor your customers and their ratings. Also you can communicate with your customers easily with our dashboard. Last, but not the least, our team support is always online for you 24x7.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">live_help</i>How do I build a Company page ?</div>
      
          <section class="section section-icons center collapsible-body">
     <div class="container">
 <div class="row" style=" background-color: transparent">

      <div class="col s12 m4">
        <!-- Promo Content 1 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%); ">
          <i class="fa fa-mouse-pointer large green-text"></i>
                        <h4><a style="color:black;"  href="">Click "Set up Company Page"</a></h4>
                        <p> If you wish to build our own company page, go on. we will guide you in each and every step.
                       </p>
                        </div>
      </div>
      <div class="col s12 m4">
        <!-- Promo Content 2 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%);"><i class="material-icons large green-text">done</i>
                        <h4><a style="color:black;"  href="">Verify your account</a></h4>
                        <p>We assure your security. Be secured. Feel Secured. Build your company with us.
                       </p>
                        </div>
      </div>
      <div class="col s12 m4">
        <!-- Promo Content 3 goes here -->
        <div class="card-panel" style=" background: linear-gradient(140deg, #ffffff 70%, #99b3ff 70%);"><i class="material-icons large green-text">contact_mail</i>
                        <h4><a style="color:black;"  href="">Add details about your Company</a></h4>
                        <p>It's free and will be. You are one step away from getting the popularity. Build complete free pages today.
                       </p>
                        </div>
      </div>

    </div>
</div>
</section>
     
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">check_circle</i>Terms and conditions</div>
      <div class="collapsible-body"><span class="docs">Your use of the Website and/or Application is an acknowledgment that you have reviewed the Terms and Conditions, agree to comply with and be legally bound thereby. These terms and conditions govern your access to and use of the Website and/or Application and the Services. If you do not agree to these terms and conditions, you must refrain from using the Website and/or Application and Services. Tourlancers reserves the right to modify these Terms at any time in accordance with this provision. If we make changes to these Terms, we will post the revised Terms on the Tourlancers Platform. <br>By using this website or partners you hereby acknowledge and agree that Tourlancers is not a hotel/tour operator owner and has no control over the conduct or behaviour of the channel partners or the quality,  fitness or the suitability of the services provided by the channel partners. Tourlancers disclaims any and all liablities in this regard.<br>OUR DEDUCTIONS :-
      Convinience Fee : 2% of the package amount per Individual<br>
      </span></div>
    </li>
  </ul>
   </div>
          <!--Social Media follow-->
      <footer class="section grey darken-1 white-text center" style="background-color: gray">
     <section class="section section-follow  white-text center">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h4>Follow Tourlancers</h4>
                        <p>Follow us on social media for special offers</p>

                          <a href="https://www.facebook.com/tourlancers" class="white-text">
                                  <i class="fab fa-facebook fa-4x"></i>
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
                      <h5 >Information</h5><hr style="width:40px">
                      <a  style="color:white"href="aboutus.html">ABOUT US</a><br>
                      <a  style="color:white"href="beta/business/B_docs/">TL FOR BUSINESS</a>
                      <p>MAIL US AT info@tourlancers.com</p>
                     </div>
                   <div class="col s12 m4">
                       <h5 >Customer Care</h5><hr  style="width:40px">
                       <a  style="color:white"href="faq">SUPPORT AND FAQ</a><br>
                       <a  style="color:white"href="beta/business/Operators/Operator_company_page_build/CUSTOMER%20BOOKING%20POLICIES%20AND%20FAQ%20SUPPORT.pdf">BOOKINGS SUPPORT</a><br>
                       <a  style="color:white"href="beta/business/B_docs/TOUR%20AGENCY%20POLICIES%20AND%20FAQs.pdf">TL FOR BUSINESS FAQ AND SUPPORT</a><br>
                   </div>
                    <div class="col s12 m4">
                       <h5 >Headquarters</h5><hr style="width:40px">
                       <p>KOLKATA, INDIA</p>

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
           $('.dropdown-trigger1').dropdown();
       $('.dropdown-trigger2').dropdown();
       $('.dropdown-trigger3').dropdown();
       $('.dropdown-trigger4').dropdown();
        $('.collapsible').collapsible();
        $('.tooltipped1').tooltip();
        $('.tooltipped2').tooltip();
        $('.tooltipped3').tooltip();
        $('.tooltipped4').tooltip();
        $('.modal').modal();
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