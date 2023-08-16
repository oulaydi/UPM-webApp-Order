<?php include('partials/menu.php'); ?>
    <!-- header ends -->

    <style>
/* .st-btn{
    padding: 2%;
    margin-left: 13%;
    color: white;
    font-size: 1em;
    text-decoration: none;
    font-weight: bold;
    transition: .2s;
    border-radius: 2px;
}

.nd-btn{
    padding: 3%;
    margin-left: 12%;
    color: white;
    font-size: 1em;
    text-decoration: none;
    font-weight: bold;
    transition: .2s;
    border-radius: 3px;
}
 */

/* Style for the container <td> */
td {
  gap: 10px; /* Add some spacing between the anchors */
}

/* Style for the "mettre à jour" link */
.st-btn {
  padding: 5px 10px;
  background-color: rgba(106, 219, 26, 0.802);
  color: white;
  text-decoration: none;
  border-radius: 5px;
  transition: .2s;
}

.st-btn:hover{
    color: white;
    background-color: green;
}

/* Style for the "X" link */
.nd-btn {
  padding: 5px 10px;
  background-color: rgba(255, 0, 0, 0.591);
  color: white;
  text-decoration: none;
  border-radius: 50%; /* Make it circular */
  line-height: 1; /* Center the "X" vertically */
  display: inline-flex; /* Maintain circular shape */
  align-items: center; /* Center the "X" horizontally */
  justify-content: center;
  width: 25px; /* Set a fixed width for circular shape */
  height: 25px; /* Set a fixed height for circular shape */
}

.nd-btn:hover{
    color: white;
    background-color: red;
}

</style>

    <!-- main starts -->
    <div class="main-content">
        <div class="cadder">
            <h1>Repas</h1>

            <?php
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?>


            <br/><br/>
            <br/>
            <a href="add-food.php" class="add-btn">ajouter des repas</a>
            <br/><br/>
            <br/>

            <table class="tbl-full">
                <tr>
                    <th>N°</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>

                <?php

                    // Create a SQL Query to get info from the db 
                    $sql = "SELECT * FROM table_food";

                    // Execute the Query
                    $result = mysqli_query($cnx, $sql);

                    // Count the rows, if there's rows or not!
                    $count = mysqli_num_rows($result);

                    // Create a counter :1 
                    $cn = 1;

                    if($count >= 1)
                    {
                        // so we have data 
                        // then get the data from the table and display it
                        while($row = mysqli_fetch_assoc($result))
                        {
                            // get value from individual columns
                            $id = $row['id_food'];
                            $titre = $row['titre'];
                            $description = $row['description'];
                            $prix = $row['prix'];
                            $image_file = $row['image'];
                            ?>

                            <tr>
                                <td><?php echo $cn++; ?></td>
                                <td><?php echo $titre; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $prix.'dh'; ?></td>
                                <td>
                                    <?php 
                                        // check if we have an image or not
                                        if($image_file == "")
                                        {
                                            // we do not have images
                                            echo '<p>No images</p>';
                                        }
                                        else
                                        {
                                            // we have images
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_file; ?>" width="70px">
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="#" class="st-btn">mettre à jour</a>
                                    <a href="#" class="nd-btn" title="supprimer">X</a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        // we dont have data
                        echo '<p id="successMessage" style="  background-color: #edd4d4;
                                    color: black    ;
                                    padding: 10px;
                                    border: 1px solid red;
                                    border-radius: 5px;
                                    font-size: 1rem;
                                    width: 10%;"
                                    >No Data!</p>';
                    }

                ?>
            </table>

        </div>
    </div>
    <!-- main ends -->

    <!-- social Section Starts Here -->
   <?php include('partials/footer.php');  ?>

   