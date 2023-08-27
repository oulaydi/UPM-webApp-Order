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
?>

  <br><br>

        <table>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Date de commande</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

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
                                    <td style="color: red; font-weight: bold;"><?php echo $status; ?></td>
                                    <td class="inline-buttons">
                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id_order=<?php echo $id; ?>" class="st-btn">Mettre à jour</a>
                                        <a href="<?php SITEURL; ?>more-info.php" class="show-btn" title="Afficher plus d'informations"><i class="uil uil-eye"></i></a>
                                        <a href="#" class="nd-btn" title="Supprimer">X</a>
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
</div>
    <!-- social Section Starts Here -->
   <?php include('partials/footer.php');  ?>