<?php include('partials/menu.php'); ?>

<style>
    .tbl-update{
    width: 60%;
}

/* add form */
.update-input{
    width: 40%;
    padding: .6rem;
    background: #edf2f4;
    border: 2px solid #9d02075d;
    border-radius: 13px;
    font-size: .85rem;
    font-weight: 500;
    color: black;
    outline: none;
    transition: .3s;
}

.update-input::placeholder{
    color: #9f5356;
}

.update-input:focus{
    filter: brightness(100%);
    background-color: #edf2f4;
    border-color: #9d0208;
}


.update-input:hover{
    filter: brightness(97%);

}

.st-btn{
    background-color: rgba(106, 219, 26, 0.802);
    padding: 2%;
    margin-top: .5cm;
    color: white;
    font-size: 1em;
    text-decoration: none;
    font-weight: bold;
    transition: .3s;
    border-radius: 3px;
    cursor: pointer;
}

.st-btn:hover{
    color: white;
    background-color: green;
}

.label{
    font-size: 1.2em;
}

form{
    padding: 4%;
}

</style>

<div class="main-content">
        <div class="cadder">
            <h1>mettre à jour la commande</h1>

            <?php

            // Assuming you have already established the database connection ($cnx)

                //get the id to change
                if(isset($_GET['id_order']))
                {
                    $id = $_GET['id_order'];

                    // Create the SQL Query with parameter binding
                    $sql = "SELECT * FROM table_order WHERE id_order=?";
                    $stmt = mysqli_prepare($cnx, $sql);
                    mysqli_stmt_bind_param($stmt, "i", $id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    // Check if the query execution was successful
                    if ($result) {
                        $count = mysqli_num_rows($result);
                        if ($count == 1) {
                            // Details available
                            $row = mysqli_fetch_assoc($result);
                            $id_food = $row['id_order'];
                            $titre = $row['titre'];
                            $qte = $row['qte'];
                            $prix = $row['prix'];
                            $status = $row['status'];
                        } else {
                            header("location:".SITEURL.'admin/manage-order.php');
                        }
                    } else {
                        echo "Query error: " . mysqli_error($cnx);
                    }
                }
                else
                {
                    header("location:".SITEURL.'admin/manage-order.php');
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-update">
                
                <tr class="label">
                    <td>Id : </td>
                    <td><?php echo 'N°-26-' . $id; ?></td>
                </tr>
                <tr class="label">
                    <td>Titre : </td>
                    <td><?php echo $titre; ?></td>
                </tr>
                <tr>
                    <td class="label">Nouvelles quantités : </td>
                    <td><input class="update-input" type="number" name="qte" min="1" autocomplete="off" value="<?php echo $qte; ?>"></td>
                </tr>
                <tr>
                    <td class="label">Statut de la commande : </td>
                    <td>
                        <select name="status" style=" width: 70%;
                                                        padding: 10px;
                                                        font-size: 16px;
                                                        border: 1px solid #9d02075d;
                                                        border-radius: 5px;
                                                        background-color: #f2f2f2;
                                                        color: #333;
                                                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                                        transition: border-color 0.3s, box-shadow 0.3s;">
                            <option  <?php if($status == "Commandé"){echo "selected";} ?> value="Commandé">Commandé</option>
                            <option <?php if($status == "À la livraison"){echo "selected";} ?> value="À la livraison" style="color: blue;">À la livraison</option>
                            <option <?php if($status == "Livré"){echo "selected";} ?> value="Livré" style="color: green;">Livré</option>
                            <option <?php if($status == "Annulé"){echo "selected";} ?> value="Annulé" style="color: red;">Annulé</option>
                        </select>
</td>               
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id_order" value="<?php echo $id; ?>">
                    <input type="submit" value="Sauvegarder" name="submit" class="st-btn">
                    </td>
                </tr>
                </table>
            </form>

            <?php
            
                // check if the button is clicked or not
                if(isset($_POST['submit']))
                {
                    // get the data from the form
                    $id = $_POST['id_order'];
                    $qte = $_POST['qte'];

                    $total = $qte * $prix;
                    
                    $status = $_POST['status'];


                    // SQL Query
                    $sql1 = "UPDATE table_order SET
                        qte = $qte,
                        total = $total,
                        status = '$status'
                        WHERE id_order=$id
                    ";

                    // execute the query
                    $result1 = mysqli_query($cnx, $sql1);

                    if($result1)
                    {
                        $_SESSION['update_order'] = '<p style="  background-color: #d4edda;
                                                        color: #155724;
                                                        padding: 10px;
                                                        margin-top: 1cm;
                                                        border: 1px solid #c3e6cb;
                                                        border-radius: 5px;
                                                        font-size: 1rem;
                                                        width: 30%;"
                                                        >les données ont été modifié avec succès!</p>';
                        //redirect page to manage order!
                        header("location:".SITEURL.'admin/manage-order.php');
                    }
                    else
                    {
                        //Failed to Update order
                    $_SESSION['update_order'] = '<p style="   background-color: #edd4d4;
                                            color: black;
                                            padding: 10px;
                                            margin-top: 1cm;
                                            border: 1px solid red;
                                            border-radius: 5px;
                                            font-size: 1rem;
                                            width: 40%;"
                                            >Les données n\'ont pas été modifiées !</p>';
                        //redirect page to manage admin!
                        header("location:".SITEURL.'admin/update-order.php');
                        exit();
                    }
                }
            ?>

        </div>
</div>

<?php include('partials/footer.php'); ?>