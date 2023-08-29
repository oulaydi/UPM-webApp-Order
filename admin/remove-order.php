<?php 

    include('../config/constants.php');

    // get the id if the admin li bina removiwh

    $id = $_GET['id_order'];

    //Create a SQL Query to delete admin

    $sql = "DELETE FROM table_order WHERE id_order=$id";
    $sql1 = "DELETE FROM table_client WHERE id_client=$id";

    // Execute the Query 

    $result = mysqli_query($cnx, $sql);
    $result1 = mysqli_query($cnx, $sql1);

    //check the Query if successfully executed or not

    if($result == true){
        $_SESSION['delete_order'] = '<p style=" background-color: #d4edda;
                                                                color: #155724;
                                                                padding: 10px;
                                                                margin-top: .5cm;
                                                                border: 1px solid #c3e6cb;
                                                                border-radius: 5px;
                                                                font-size: 1rem;
                                                                width: 26%;"
                                                                >La commande supprimé avec succès!</p>';
                   //redirect page to manage order!
                   header("location:".SITEURL.'admin/manage-order.php');
    }
    else{
        $_SESSION['delete_order'] = '<p style=" background-color: #edd4d4;
                                                                color: black;
                                                                padding: 10px;
                                                                border: 1px solid red;
                                                                border-radius: 5px;
                                                                font-size: 1rem;
                                                                width: 26%;"
                                                                >Erreur, la commande non supprimé!</p>';
                    //redirect page to manage order!
                    header("location:".SITEURL.'admin/manage-order.php');
    }

    //Redirect to manage admin page with a message
?>