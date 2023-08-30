<?php

// Access Control
if(!isset($_SESSION['user']))
{
    $_SESSION['no-login-msg'] = '<p style=" background-color: #edd4d4;
                                color: black;
                                padding: 10px;
                                border: 1px solid red;
                                border-radius: 5px;
                                font-size: 1rem;
                                width: 83%;"
                                >connectez-vous pour accès au panneau!</p>';
    header('location:'.SITEURL.'admin/login.php');
}

?>