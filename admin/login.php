<?php include('../config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Connexion - Marrakchi</title>
</head>
<link rel="stylesheet" href="../css/login.css">
<body>
<div class="container-logo">
            <div class="logo">
                <a href="http://localhost/webProject/" title="Logo">
                    <img src="../images/login-logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
   <div class="box">
    <div class="container">

        <div class="top">
            <header>Connexion</header>
        </div>

        <?php
            
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-msg'])){
                echo $_SESSION['no-login-msg'];
                unset($_SESSION['no-login-msg']);
            }

        ?>
        <br><br>

        <form action="" method="POST">
            <div class="input-field">
                <input type="text" class="input" placeholder="Nom d'utilisateur" autocomplete="off" name="username">
                <i class='bx bx-user' ></i>
            </div>

            <div class="input-field">
                <input type="Password" class="input" placeholder="Mot de passe" required autocomplete="off" name="password">
                <i class='bx bx-lock-alt'></i>
            </div>

            <div class="input-field">
                <input type="submit" class="submit" value="Connexion" autocomplete="off" name="submit">
            </div>
        </form>
        <div class="two-col">
            <div class="two">
                <label><a href="#">Besoin d'aide !</a></label>
            </div>
        </div>
    </div>
</div>  
</body>
</html>
<?php include('partials/footer.php'); ?>

<?php

    //check if the submit button is clocked or not
    if(isset($_POST['submit'])){
        //process the logine, get data from the form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //check the username and the password if existe or not
        $sql = "SELECT * FROM table_admin WHERE username='$username' AND password='$password'";

        //Execute the Query
        $result = mysqli_query($cnx,$sql);

        //Count the rows and check if the user exist there(db) or not
        $count = mysqli_num_rows($result);

            if ($count == 1){
                $_SESSION['login'] = '<p style="    background-color: #d4edda;
                                                    color: #155724;
                                                    padding: 10px;
                                                    border: 1px solid #c3e6cb;
                                                    border-radius: 5px;
                                                    font-size: 1rem;
                                                    width: 40%;"
                                                    >L\'administrateur est connecté avec succès!</p>';
                $_SESSION['user'] = $username; //check if the user logged in or not, when logout will unset it
            //redirect page to manage admin!
            header("location:".SITEURL.'admin/admin.php');
            }
            else{
                $_SESSION['login'] = '<p style="  background-color: #6a040f;
                                            color: white;
                                            padding: 10px;
                                            border: 1px solid #370617;
                                            border-radius: 5px;
                                            font-size: 1rem;
                                            width: 60%;"
                                            >Nom d\'utilisateur ou le mot de passe est incorrect!</p>';
            //redirect page to manage admin!
            header("location:".SITEURL.'admin/login.php');
            }
    }
?>

