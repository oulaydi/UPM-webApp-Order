<?php include('partials-front/menu.php');?>
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
      <div class="container">

      <?php $find = $_POST['search']; ?>

        <h2 class="text-center"><?php echo $find; ?></h2>

        <?php
        
          // get the search keyword
          $find = $_POST['search'];
          
          // SQL Query to get data from db based on keyword
          $sql = "SELECT * FROM table_food WHERE titre LIKE '%$find%' OR description LIKE '%$find%'";

          // Execute the Query
          $result = mysqli_query($cnx, $sql);

          // count the rows
          $count = mysqli_num_rows($result);

          // check if there's a data or not
          if ($count > 0)
          {
              while($row = mysqli_fetch_assoc($result))
              {
                // get the details
                $id = $row['id_food'];
                $titre = $row['titre'];
                $description = $row['description'];
                $prix = $row['prix'];
                $image_file = $row['image'];

                ?>

                          <div class="food-menu-box">
                              <div class="food-menu-img">

                              <?php

                                // check if the image is available or not
                                if($image_file == "")
                                {
                                  echo '<p style="color: red; font-weight: bold; display: inline-block;" >il n\'y a pas d\'image !</p>';
                                }
                                else
                                {
                                  ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_file; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve"/>
                                  <?php
                                }

                              ?>
                              </div>
                    
                              <div class="food-menu-desc">
                                <h4><?php echo $titre; ?></h4>
                                <p class="food-price"><?php echo $prix . 'dh'; ?></p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br />

                                <a href="#" class="btn btn-primary">Order</a>
                              </div>
                            </div>

                <?php

              }
          }
          else
          {
            echo "<p style='color: red; font-weight: bold; display: inline-block;' >Ce repas '$find' n'existe pas  !</p>";
          }
        
        ?>

        <div class="clearfix"></div>
      </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php'); ?>