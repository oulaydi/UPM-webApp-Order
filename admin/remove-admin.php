<?php 

    include('../config/constants.php');

    // get the id if the admin li bina removiwh

    $id = $_GET['id'];

    //Create a SQL Query to delete admin

    $sql = "DELETE FROM tabla_admin WHERE id=$id";

    // Execute the Query 

    $result = mysqli_query($cnx, $sql);

    //check the Query if successfully executed or not

    if($result == true){
        echo "administrateur supprimé";
    }
    else{
        echo "Erreur, administrateur non supprimé!";
    }

    //Redirect to manage admin page with a message
?>