<?php include('partials/menu.php'); ?>

<style>
    .tbl-mdp{
    width: 50%
}

/* add form */
.mdp-input{
    padding: .6rem 1.5rem;
    margin-left: 1.1cm;
    background: #edf2f4;
    border: 2px solid #9d02075d;
    border-radius: 13px;
    font-size: .85rem;
    font-weight: 500;
    color: black;
    outline: none;
    transition: .3s;
}

.mdp-input::placeholder{
    color: #9f5356;
}

.mdp-input:focus{
    filter: brightness(100%);
    background-color: #edf2f4;
    border-color: #9d0208;
}


.mdp-input:hover{
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
    font-size: 1.1em;
}
</style>

<div class="main-content">
        <div class="cadder">
            <h1>changer le mot de passe</h1>
            
            <br><br>
            
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                if(isset($_SESSION['no_user'])){
                    echo $_SESSION['no_user'];
                    unset($_SESSION['no_user']);
                }
                if(isset($_SESSION['pwd_not_same'])){
                    echo $_SESSION['pwd_not_same'];
                    unset($_SESSION['pwd_not_same']);
                }
            ?>

            <form action="" method="POST">
            <table class="tbl-mdp">
                <tr>
                    <td class="label">Ancien mot de passe : </td>
                    <td><input class="mdp-input" type="password" name="current_pwd" required placeholder="Ancien mot de pass" autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="label">Nouveau mot de passe : </td>
                    <td><input class="mdp-input" type="password" name="new_pwd" required placeholder="nouveau mot de pass" autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="label">Confirmer new password : </td>
                    <td><input class="mdp-input" type="password" name="confirm_pwd" required placeholder="confirmer mot de pass" autocomplete="off"></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Modifier" name="submit" class="st-btn">
                    </td>
                </tr>
                </table>
            </form>
        </div>
</div>


<?php

    //check if the button is clicked or not
    if(isset($_POST['submit'])){
        
        //get data from the form
        $id = $_POST['id'];
        $current_pwd = md5($_POST['current_pwd']);
        $new_pwd = md5($_POST['new_pwd']);
        $confirm_pwd = md5($_POST['confirm_pwd']);

        //check the current id and the current pwd if is exists or not!
        $sql = "SELECT * FROM table_admin WHERE id=$id AND password='$current_pwd'";

        //Execute the Query 
        $result = mysqli_query($cnx, $sql);

        if($result == true){
            $count = mysqli_num_rows($result);
                if($count == 1){
                    //check if the user exixt and the pwd changed
                    //check if the pwd match or not!
                        if($new_pwd == $confirm_pwd){

                            //Update the pasword from sql
                            $sql1 = "UPDATE table_admin SET
                                password='$new_pwd' WHERE id=$id
                            "; 

                            //Execute the Query 
                            $result1 = mysqli_query($cnx, $sql1);

                            //check if the Query executed or not
                            if($result1 == true){

                            }
                            else{
                                
                            }

                            $_SESSION['pwd_is_same'] = '<p style="  background-color: #d4edda;
                                                                color: #155724;
                                                                padding: 10px;
                                                                border: 1px solid #c3e6cb;
                                                                border-radius: 5px;
                                                                font-size: 1rem;
                                                                width: 40%;"
                                                                >le mot de passe a été modifié avec succès!</p>';
                            //redirect page to manage admin!
                            header("location:".SITEURL.'admin/manage-admin.php');
                        }
                        else{
                            $_SESSION['pwd_not_same'] = '<p style="  background-color: #edd4d4;
                                                                color: black;
                                                                padding: 10px;
                                                                border: 1px solid red;
                                                                border-radius: 5px;
                                                                font-size: 1rem;
                                                                width: 40%;"
                                                                >Le mot de passe ne correspond pas!</p>';
                            //redirect page to manage admin!
                            header("location:".SITEURL.'admin/mdp-admin.php');
                        }
                }
                else{
                    //User does not exist, set msg and redirect
                    $_SESSION['no_user'] = '<p style="  background-color: #edd4d4;
                                                        color: black;
                                                        padding: 10px;
                                                        border: 1px solid red;
                                                        border-radius: 5px;
                                                        font-size: 1rem;
                                                        width: 40%;"
                                                        >vérifier l\'ancien mot de passe!</p>';
                     //redirect page to manage admin!
                    header("location:".SITEURL.'admin/mdp-admin.php');
                }
        }

    }

?>


<?php include('partials/footer.php'); ?>