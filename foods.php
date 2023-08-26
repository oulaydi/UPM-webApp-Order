<?php include('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Rechercher .." required>
                <input type="submit" name="submit" value="Recherche" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Marrakchi Menu</h2>

            <?php
            
                // displaying the food from the db
                $sql = "SELECT * FROM table_food";

                // execute the Query
                $resault = mysqli_query($cnx, $sql);

                // count rows to check if there's any rows or not
                $count = mysqli_num_rows($resault);
                
                if($count > 0)
                {
                    // food available
                    while($row = mysqli_fetch_assoc($resault))
                    {
                        // get the data from the db 
                        $id = $row['id_food'];
                        $titre = $row['titre'];
                        $description = $row['description'];
                        $prix = $row['prix'];
                        $image_file = $row['image'];
                        ?>

                            <div class="food-menu-box">
                                <div class="food-menu-img">

                                    <?php
                                    
                                        // check if there an image or not
                                        if($image_file == "")
                                        {
                                            // image not avilable
                                            echo '<p style="color: red; font-weight: bold; display: inline-block;" >il n\'y a pas d\'image !</p>';
                                        }
                                        else
                                        {
                                            // image available
                                            ?>

                                                <img width="90px" src="<?php echo SITEURL; ?>images/food/<?php echo $image_file; ?>" class="img-responsive img-curve">
 
                                            <?php
                                        }

                                    ?>
                                </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $titre; ?></h4>
                                    <p class="food-price"><?php echo $prix.'dh'; ?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="<?php echo SITEURL; ?>order.php?id_food=<?php echo $id;?>" class="btn btn-primary">Order</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    echo 'sorry there\'s not food';
                }

            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>