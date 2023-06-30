<?php include('partials/menu.php');?>

<style>
    .tbl-add{
    width: 50%
}

/* add form */
.add-input{
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

.add-input::placeholder{
    color: #9f5356;
}

.add-input:focus{
    filter: brightness(100%);
    background-color: #edf2f4;
    border-color: #9d0208;
}


.add-input:hover{
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
            <h1>Ajouter un admin</h1>

            
            <?php
            
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

            ?>

            <form action="" method="POST">
                <table class="tbl-add">
                    <tr>
                        <td class="label">Nom complète : </td>
                        <td><input class="add-input" type="text" name="full_name" required placeholder="Nom Prénom" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td class="label">Nom d'utilisateur : </td>
                        <td><input class="add-input" type="text" name="username" required placeholder="nom_prénom" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td class="label">Mot de passe : </td>
                        <td><input class="add-input" type="password" name="password" required placeholder="P@ssw0rd123!" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Ajouter" name="submit" class="st-btn">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
</div>

<!-- social Section Starts Here -->


<?php
    // process the velue form and save it in DB
    // checking if lboton tecklika elih or not!

    if(isset($_POST['submit'])){
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // md5 make an encrypted passcode

        //SQL Query then sabe inot DB

        $sql = "INSERT INTO table_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        $results = mysqli_query($cnx, $sql) or die(mysqli_error());

        if ($results == true){
            $_SESSION['add'] = '<p id="successMessage" style="  background-color: #d4edda;
                                            color: #155724;
                                            padding: 10px;
                                            border: 1px solid #c3e6cb;
                                            border-radius: 5px;
                                            font-size: 1rem;
                                            width: 40%;"
                                            >les données ont été insérées avec succès!</p>';

            //redirect page to manage admin!
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            $_SESSION['add'] = "les données n'ont pas été insérées avec succès";
            //redirect page to add admin page!
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>


<?php include('partials/footer.php'); ?>