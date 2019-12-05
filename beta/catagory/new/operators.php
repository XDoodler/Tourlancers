<?php 
  session_start();
?>
<?php 
                require_once('../db.php');
                $city=$_SESSION['CITY'];
                $newcount2=$_POST['newcount2'];
                if(isset($city))
                {
                  $sql="SELECT * FROM tour_operators WHERE city=? LIMIT $newcount2";
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
                   <img width="100" height="100" src="operators-img/galaxy.png">
                     
                 </div>
                 <div class="card-content deep-purple lighten-4">
                      <h4><?php echo $operator->name; ?></h4>
                      <h6 class="red-text"> <?php echo $operator->city; ?> </h6>
                      <p><?php echo $operator->location; ?></p>
                      <p><span class="indigo white-text"> <?php echo $operator->description; ?> </span> <span class="green-text grey lighten-3"></span></p>
                 </div>
                 <div class="card-action">
                   <a href="https://tourlancers.com/beta/business/Operators/Operator_company_page_build/user.php?id=<?php echo $operator->package_id?>" class="red-text">View</a>
                 </div>
              </div> 
            </div>
            
            <?php 
                   }
                   echo " <div class='center-align'><button value='.$city.' id='btn1' class='btn deep-purple darken-4 white-text'>more</button></div>";
                  }
                   else { echo "<h5 class='center'><i class='material-icons orange-text large center'>sentiment_very_dissatisfied</i></h5><h5 class='center'>No operator is available</h5><br> ";}
                  }
                  else 
                  {
                    echo "Something Wrong Happened";
                  }

             ?>

