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
  <h1>informations de la commande</h1>

  <br><br>

        <table>
            <tr>
                <th>Id</th>
                <th>Nom et prénom</th>
                <th>Tele</th>
                <th>Email</th>
                <th>Addresse</th>
                <th>Action</th>
            </tr>

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
                        }
                    }
                    else
                    {
                        // No data
                        echo '<p style="color: red; font-weight: bold; display: inline-block;" >il n\'y a pas de commandes!</p>';
                    }

                ?>

            <tr>
                <td>EE667357</td>
                <td>Oussama Oulaydi</td>
                <td>oulaydi</td>
                <td>oulaydi</td>
                <td>oulaydi</td>
                <td class="inline-buttons">
                    <a href="#" class="show-btn" title="Afficher plus d'informations"><i class="uil uil-eye"></i></a>
                    <a href="#" class="nd-btn" title="Supprimer">X</a>
                </td>
            </tr>
            
        </table>
</div>
    <!-- social Section Starts Here -->
   <?php include('partials/footer.php');  ?>