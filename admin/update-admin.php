<?php include('partials/menu.php'); ?>

<style>
    .tbl-update{
    width: 50%
}

/* add form */
.update-input{
    padding: .6rem 1.5rem;
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


form{
    padding-top: 1cm;
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
</style>

<div class="main-content">
        <div class="cadder">
            <h1>mettre à jour l'administrateur</h1>

            <?php
                //get the id to change
                $id=$_GET['id'];

                //Create the SQL Query
                $sql="SELECT * FROM table_admin WHERE id=$id";

                //Execute the Query 
                $result = mysqli_query($cnx, $sql);

                //check the Query if executed or not
                if ($result == true){
                    $count = mysqli_num_rows($result);
                        if($count == 1){
                            $row = mysqli_fetch_assoc($result);

                            $full_name = $row['full_name'];
                            $username = $row['username'];
                        }
                        else{
                            header("location:".SITEURL.'admin/manage-admin.php');
                        }
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-update">
                <tr>
                    <td class="label">Nom complète : </td>
                    <td><input class="update-input" type="text" name="full_name" placeholder="Nom Prénom" autocomplete="off" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td class="label">Nom d'utilisateur : </td>
                    <td><input class="update-input" type="text" name="username" placeholder="nom_prénom" autocomplete="off" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" value="Sauvegarder" name="submit" class="st-btn">
                    </td>
                </tr>
                </table>
            </form>

        </div>
</div>

<?php

    //check if the button has been clicked or not
    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
    
        // Create SQL Query to update the admin
        $sql = "UPDATE table_admin SET
            full_name = '$full_name', username = '$username' WHERE id='$id'
        ";

        //Execute the Query 
        $result = mysqli_query($cnx, $sql);

        //check if the Query has been succssefully executed
        if($result == true){
            $_SESSION['update'] = '<p style="  background-color: #d4edda;
                                            color: #155724;
                                            padding: 10px;
                                            border: 1px solid #c3e6cb;
                                            border-radius: 5px;
                                            font-size: 1rem;
                                            width: 40%;"
                                            >les données ont été modifié avec succès!</p>';
            //redirect page to manage admin!
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['update'] = '<p style="   background-color: #edd4d4;
                                                color: black;
                                                padding: 10px;
                                                border: 1px solid red;
                                                border-radius: 5px;
                                                font-size: 1rem;
                                                width: 40%;"
                                                >Les données n\'ont pas été modifiées !</p>';
            //redirect page to manage admin!
            header("location:".SITEURL.'admin/update-admin.php');
        }
    }

?>

<?php include('partials/footer.php'); ?>