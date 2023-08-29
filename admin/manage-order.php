<?php include('partials/menu.php');  ?>
    <!-- header ends -->

<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  .inline-buttons a {
    display: inline-block;
    padding: 5px 10px;
    margin-right: 5px;
    border-radius: 3px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s, color 0.3s;
  }

  .st-btn {
    background-color: rgba(106, 219, 26, 0.802);
    color: white;
  }

  .st-btn:hover {
    background-color: green;
  }

  .show-btn {
    background-color: rgb(79, 79, 207);
    color: white;
  }

  .show-btn:hover {
    background-color: blue;
  }

  .nd-btn {
    background-color: rgba(255, 0, 0, 0.591);
    color: white;
  }

  .nd-btn:hover {
    background-color: red;
  }

</style>

<div class="main-content">
  <h1>Commandes</h1>

  <br>

  <?php
                if(isset($_SESSION['update_order'])) {
                    echo $_SESSION['update_order'];
                    unset($_SESSION['update_order']);
                }
                if(isset($_SESSION['delete_order'])) {
                    echo $_SESSION['delete_order'];
                    unset($_SESSION['delete_order']);
                }
?>

  <br><br>

        <table>
        <thead>
                      <tr>
                        <th scope="col">#Id_cmd</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date de commande</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                <?php
                
                    // get all data from the db
                    $sql = "SELECT * FROM table_order";

                    // execute the Query
                    $result = mysqli_query($cnx, $sql);

                    // check if there's a rows or not
                    $count = mysqli_num_rows($result);

                    if($count > 0)
                    {
                        // kayna Data
                        while($row = mysqli_fetch_assoc($result))
                        {
                            // get all data from db
                            $id = $row['id_order'];
                            $titre = $row['titre'];
                            $prix = $row['prix'];
                            $qte = $row['qte'];
                            $order_date = $row['order_date'];
                            $total = $row['total'];
                            $status = $row['status'];
                            
                            ?>

                                <tr>
                                    <td width="80px" style="font-weight: bold;"><?php echo 'N°-26-'. $id; ?></td>
                                    <td ><?php echo $titre; ?></td>
                                    <td ><?php echo $prix; ?></td>
                                    <td style="text-align: center;"><?php echo $qte; ?></td>
                                    <td ><?php echo $total .'dh'; ?></td>
                                    <td ><?php echo $order_date; ?></td>
                                    <td >
                                      <?php 
                                        if($status == "Commandé")
                                        {
                                          echo "<p style='color: grey; font-weight: bold;'>$status</p>";
                                        }

                                        elseif($status == "À la livraison")
                                        {
                                          echo "<p style='color: blue; font-weight: bold;'>$status</p>";
                                        }

                                        elseif($status == "Livré")
                                        {
                                          echo "<p style='color: green; font-weight: bold;'>$status</p>";
                                        }
                                        
                                        else
                                        {
                                          echo "<p style='color: red; font-weight: bold;'>$status</p>";
                                        }
                                      ?>
                                    </td>
                                    <td class="inline-buttons">
                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id_order=<?php echo $id; ?>" class="st-btn">Mettre à jour</a>

                                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

                                        <button  href="<?php SITEURL; ?>more-info.php" type="button" class="btn btn-primary" titre="Plus d'informations" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="uil uil-eye"></i>
                                        </button>

                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

                                        <a href="<?php echo SITEURL; ?>admin/remove-order.php?id_order=<?php echo $id; ?>" class="nd-btn" title="Supprimer">X</a>
                                    </td>
                                </tr>

                            <?php
                        }
                    }
                    else
                    {
                        // No data
                        echo '<p style="color: red; font-weight: bold; display: inline-block;" >il n\'y a pas de commandes!</p>';
                    }

                ?>            
        </table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Informations personnelles</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <table class="table">
                  <thead>
                      <tr>
                        <th scope="col">#Id_client</th>
                        <th scope="col">Nom et prénom</th>
                        <th scope="col">Tele</th>
                        <th scope="col">Email</th>
                        <th scope="col">Addresse</th>
                      </tr>
                    </thead>

                      <?php
                      
                          // get all data from the db
                          $sql = "SELECT * FROM table_client";

                          // execute the Query
                          $result = mysqli_query($cnx, $sql);

                          // check if there's a rows or not
                          $count = mysqli_num_rows($result);

                          if($count > 0)
                          {
                              // kayna Data
                              while($row = mysqli_fetch_assoc($result))
                              {
                                  // get all data from db
                                  $id = $row['id_client'];
                                  $nom_prenom_client = $row['nom_prenom_client'];
                                  $tele = $row['tele'];
                                  $email_client = $row['email_client'];
                                  $addresse = $row['addresse'];

                                  ?>
                                      <tbody>
                                          <tr>
                                            <th scope="row"><?php echo 'client-N°-'.$id; ?></th>
                                            <td><?php echo $nom_prenom_client; ?></td>
                                            <td><?php echo $tele; ?></td>
                                            <td><?php echo $email_client; ?></td>
                                            <td><?php echo $addresse; ?></td>
                                          </tr>
                                        </tbody>
                                  <?php

                              }
                          }
                          else
                          {
                              // No data
                              echo '<p style="color: red; font-weight: bold; display: inline-block;" >il n\'y a pas de commandes!</p>';
                          }

                      ?>                  
              </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

</div>
    <!-- social Section Starts Here -->
   <?php include('partials/footer.php');  ?>