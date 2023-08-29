<?php include('partials-front/menu.php');?>

<?php

  // check if the id is selected or not
  if(isset($_GET['id_food']))
  {
    // get the selected food info
    $id_food = $_GET['id_food'];

    // get the info
    $sql = "SELECT * FROM table_food WHERE id_food=$id_food";

    // execute the Query
    $result = mysqli_query($cnx, $sql); 

    // Check if the query executed successfully
    if($result === false) {
      die("Query execution failed: " . mysqli_error($cnx));
    }

    // count the row
    $count = mysqli_num_rows($result);

    // check if there's data or not
    if($count > 0)
    {
      // we have data
      // get data from the db
      $row = mysqli_fetch_assoc($result);

      $titre = $row['titre'];
      $prix = $row['prix'];
      $image_file = $row['image'];
    }
    else
    {
      header('location:' . SITEURL); 
    }

  }
  else
  {
    // redirect to the home page
    header('location:'.SITEURL);
  }
?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search-1">
      <div class="container">
        <h2 class="text-center">
          Remplissez ce formulaire pour confirmer votre commande.
        </h2>

        <form action="" class="order" method="POST">
          <fieldset>
            <legend>sélectionnée</legend>

            <div class="food-menu-img">

              <?php
              
                //  check weather the image is available or not
                if($image_file == "")
                {
                  // no image
                  echo '<p style="color: red; font-weight: bold; display: inline-block;" >il n\'y a pas d\'image !</p>';
                }
                else
                {
                  // there's an image
                  ?>

                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_file; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve"/>

                  <?php
                }
              
              ?>
            </div>

            <div class="food-menu-desc">
              <h3><?php echo $titre; ?></h3>
              <input type="hidden" name="titre" value="<?php echo $titre; ?>">

              <p class="food-price"><?php echo $prix .' dh'; ?></p>
              <input type="hidden" name="prix" value="<?php echo $prix; ?>">

              <div class="order-label">Quantité</div>
              <input
                type="number"
                name="qte"
                class="input-responsive"
                min="1"
                value="1"
                required
              />
            </div>
          </fieldset>

          <fieldset>
            <legend>Détails de livraison</legend>
            <div class="order-label">Nom et Prenom</div>
            <input
              type="text" name="nom_prenom_client" placeholder="Oulaydi Hajita"  class="input-responsive" autocomplete="off" required />
            
              <div class="order-label">Numero tele</div>
            <input type="tel" name="tele" placeholder="+212612345678" class="input-responsive" autocomplete="off" required />

              <div class="order-label">Email</div>
              <input type="email" name="email_client" placeholder="text.exemple@email.com" class="input-responsive" autocomplete="off" required />

            <div class="order-label">Adresse</div>
            <textarea name="addresse" rows="10" placeholder="Rue, résidence, appartement, N°" class="input-responsive" autocomplete="off" required ></textarea>
            <input
              type="submit" name="submit" value="Confirmer la commande" class="btn btn-primary"
            />
          </fieldset>
        </form>

                <?php
                
                    // check if the button is clicked or not
                    if(isset($_POST['submit']))
                    {

                      // in order table
                      $titre = $_POST['titre'];
                      $prix = $_POST['prix'];
                      $qte = $_POST['qte'];
                      $order_date = date("Y-m-d h:i:s");
                      $total = $prix * $qte;
                      $status = "commandé";
                    
                      $full_name = $_POST['nom_prenom_client'];
                      $tele = $_POST['tele'];
                      $email = $_POST['email_client'];
                      $addresse = $_POST['addresse'];


                      // create a SQL Query
                      $sql1 = "INSERT INTO table_order (titre, prix, qte, order_date, total, status)
                      VALUES 
                      ('$titre', '$prix', '$qte', '$order_date', '$total', '$status')";

                      // create second Query for the form info
                      $sql2 = "INSERT INTO table_client (nom_prenom_client, tele, email_client, addresse)
                      VALUES 
                      ('$full_name', '$tele', '$email', '$addresse')";


                      // Execute the both Query
                      $result1 = mysqli_query($cnx, $sql1);
                      $result2 = mysqli_query($cnx, $sql2);

                      if($result1 && $result2)
                      {
                        $_SESSION['order'] = '<p id="successMessage" style="  background-color: #d4edda;
                                                              color: #155724;
                                                              padding: 10px;
                                                              border: 1px solid #c3e6cb;
                                                              border-radius: 5px;
                                                              font-size: 1rem;
                                                              width: 34%;"
                                                              >Merci, votre commande a été effectué avec succès</p>';
                          header("location:".SITEURL);
                      }
                      else
                      {
                        $_SESSION['order'] = '<p id="successMessage" style="  background-color: #edd4d4;
                                                                              color: black;
                                                                              padding: 10px;
                                                                              border: 1px solid red;
                                                                              border-radius: 5px;
                                                                              font-size: 1rem;
                                                                              width: 24%;"
                                                              >Erreur! veuillez vérifier le formulaire</p>';
                          header("location:".SITEURL);
                      }
                      
                    }
                ?>

      </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    
    <?php include('partials-front/footer.php'); ?>