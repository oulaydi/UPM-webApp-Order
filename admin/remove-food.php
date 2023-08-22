<?php

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image']))
    {
        // get the Id and the image name
        $id = $_GET['id'];
        $image = $_GET['image'];

        // remove the image if its available
        // check if the image is available or not
        if($image)
        {
            // it has image and need to remove from the folder
            // Get the image path
            $path = "../images/food".$image;
            $remove = unlink($path);

            // check if the image removed or not
            if ($remove == false)
            {
                // error
                $_SESSION['error'] = '<p style="  background-color: #edd4d4;
                                                color: black;
                                                padding: 10px;
                                                margin-top: .5cm;
                                                border: 1px solid red;
                                                border-radius: 5px;
                                                font-size: 1rem;
                                                width: 40%;"
                                                >Erreur! Impossible de supprimer l\'image.</p>';

                //redirect page to add food!
                header("location:".SITEURL.'admin/manage-food.php');
                die();
            }
        }

        // delete food from the database
        $sql = "DELETE FROM table_food WHERE id_food=$id";

        // execute the Query
        $resault = mysqli_query($cnx, $sql);

        // check if the query has been sucssefully executed
        // redirect to manage page with a session message 
        if($resault == true)
        {
            $_SESSION['query'] = '<p style="  background-color: #d4edda;
                                            color: #155724;
                                            margin-top: 1cm;
                                            padding: 10px;
                                            border: 1px solid #c3e6cb;
                                            border-radius: 5px;
                                            font-size: 1rem;
                                            width: 40%;"
                                            >le repas a ete supprime avec succès!</p>';

                    //redirect page to manage food!
                    header("location:".SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['query_error'] = '<p style="   background-color: #edd4d4;
                                                        color: black;
                                                        padding: 10px;
                                                        margin-top: .5cm;
                                                        border: 1px solid red;
                                                        border-radius: 5px;
                                                        font-size: 1rem;
                                                        width: 40%;"
                                                        >Erreur, l\'image non supprime!</p>';

                    //redirect page to add food!
                    header("location:".SITEURL.'admin/add-food.php');
        }
    }
    else
    {
        $_SESSION['delete_food'] = '<p style="  background-color: #edd4d4;
                                                color: black;
                                                padding: 10px;
                                                margin-top: .5cm;
                                                border: 1px solid red;
                                                border-radius: 5px;
                                                font-size: 1rem;
                                                width: 20%;"
                                                >Erreur!</p>';

        //redirect page to add food!
        header("location:".SITEURL.'admin/manage-food.php');
    }

?>