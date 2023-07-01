<?php include('partials/menu.php');  ?>

<style>
.st-btn{
    background-color: rgba(106, 219, 26, 0.802);
    padding: 2%;
    margin-left: 10%;
    color: white;
    font-size: 1em;
    text-decoration: none;
    font-weight: bold;
    transition: .3s;
    border-radius: 2px;
}

.st-btn:hover{
    color: white;
    background-color: green;
}

.nd-btn{
    background-color: rgba(255, 0, 0, 0.591);
    padding: 2%;
    margin-left: 2%;
    color: white;
    font-size: 1em;
    text-decoration: none;
    font-weight: bold;
    transition: .3s;
    border-radius: 3px;
}

.nd-btn:hover{
    color: white;
    background-color: red;
}
</style>

    <!-- header ends -->

    <!-- main starts -->
    <div class="main-content">
        <div class="cadder">
            <h1>Admin</h1>

            <br>
            
            <?php
            
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

            ?>

            <br/><br/>
            <br/>
            <a href="add-admin.php" class="add-btn">Ajouter</a>
            <br/><br/>
            <br/>
            

            <table class="tbl-full">
                <tr>
                    <th>N°</th>
                    <th>Nom et Prenom</th>
                    <th>Nom d'utilisateur</th>
                    <th>Action</th>
                </tr>

                    <?php
                        //Query to get all admins
                        $sql = "SELECT * FROM table_admin";
                        // Execute the Query 
                        $result = mysqli_query($cnx, $sql);

                        if ($result == true){
                            $rows = mysqli_num_rows($result); //functions that gets all rows from db
                            
                                $count_id = 1;

                                if ($rows > 0){
                                    // we hava data
                                        while($rows=mysqli_fetch_assoc($result))
                                        {
                                            $id=$rows['id'];
                                            $full_name=$rows['full_name'];
                                            $username=$rows['username'];

                                            //Dispalying the values
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $count_id++; ?></td>
                                                <td><?php echo $full_name; ?></td>
                                                <td><?php echo $username; ?></td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="st-btn">mettre à jour</a>
                                                    <a href="<?php echo SITEURL; ?>admin/mdp-admin.php?id=<?php echo $id; ?>" class="mdp-btn">changer le mdp</a>
                                                    <a href="<?php echo SITEURL; ?>admin/remove-admin.php?id=<?php echo $id; ?>" class="nd-btn" title="supprimer">X</a>
                                                </td>
                                            <tr>

                                            <?php
                                        }
                                }
                                else{
                                    //we do not have any data
                                    echo '<p id="successMessage" style="  background-color: #edd4d4;
                                    color: black    ;
                                    padding: 10px;
                                    border: 1px solid red;
                                    border-radius: 5px;
                                    font-size: 1rem;
                                    width: 40%;"
                                    >désolé, vous n avez pas d administrateur !</p>';
                                }
                        }
                    ?>
            </table>

        </div>
    </div>
    <!-- main ends -->

    <!-- social Section Starts Here -->
   <?php include('partials/footer.php'); ?>