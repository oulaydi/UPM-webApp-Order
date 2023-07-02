<?php 
    //check the user is logged in or not
    if (!isset($_POST['user'])){
        
        $_SESSION['no-login-msg'] = '<p style="  background-color: #6a040f;
                                            color: white;
                                            padding: 10px;
                                            border: 1px solid #370617;
                                            border-radius: 5px;
                                            font-size: 1rem;
                                            width: 60%;"
                                            >Veuillez connecter pour accéder au panneau d\'administration!</p>';
            //redirect page to manage admin!
            header("location:".SITEURL.'admin/login.php');
    }
?>