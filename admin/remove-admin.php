<?php 

    include('../config/constants.php');

    // get the id if the admin li bina removiwh

    $id = $_GET['id'];

    //Create a SQL Query to delete admin

    $sql = "DELETE FROM table_admin WHERE id=$id";

    // Execute the Query 

    $result = mysqli_query($cnx, $sql);

    //check the Query if successfully executed or not

    if($result == true){
        $_SESSION['delete'] = '<p style=" background-color: #edd4d4;
                                                                color: #black;
                                                                padding: 10px;
                                                                border: 1px solid red;
                                                                border-radius: 5px;
                                                                font-size: 1rem;
                                                                width: 40%;"
                                                                >administrateur supprimé avec succès!</p>';
                   //redirect page to manage admin!
                   header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['delete'] = '<p style=" background-color: #edd4d4;
                                                                color: black;
                                                                padding: 10px;
                                                                border: 1px solid red;
                                                                border-radius: 5px;
                                                                font-size: 1rem;
                                                                width: 40%;"
                                                                >Erreur, administrateur non supprimé!</p>';
                    //redirect page to manage admin!
                    header("location:".SITEURL.'admin/manage-admin.php');
    }

    //Redirect to manage admin page with a message
?>