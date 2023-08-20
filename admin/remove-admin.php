<?php 

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_file']))
    {
        $id = $_GET['id'];
        $image_file = $_GET['image_file'];

        if($image_file != "")
        {
            $path = "../images/food".$image_file;

            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['delete_food'] =  '<p id="successMessage" style="background-color: #edd4d4;
                                        color: black;
                                        margin-top: 1cm;
                                        padding: 10px;
                                        border: 1px solid red;
                                        border-radius: 5px;
                                        font-size: 1rem;
                                        width: 30%;
                                        ">Erreur l\'image non supprimé!</p>';
        
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }


        $sql = "DELETE FROM table_food WHERE id=$id";

        $resault = mysqli_query($cnx, $sql);

        if($resault == true)
        {
            $_SESSION['delete_food'] =  '<p id="successMessage" style="background-color: #edd4d4;
                                        color: black;
                                        margin-bottom: .5cm;
                                        margin-top: .5cm;
                                        padding: 10px;
                                        border: 1px solid red;
                                        border-radius: 5px;
                                        font-size: 1rem;
                                        width: 15%;
                                        ">fait !</p>';
        
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete_food'] =  '<p id="successMessage" style="background-color: #edd4d4;
                                        color: black;
                                        margin-top: 1cm;
                                        padding: 10px;
                                        border: 1px solid red;
                                        border-radius: 5px;
                                        font-size: 1rem;
                                        width: 10%;
                                        ">Erreur!</p>';
        
        header('location:'.SITEURL.'admin/manage-food.php');
        }





    }   
    else
    {
        $_SESSION['auto'] =  '<p id="successMessage" style="background-color: #edd4d4;
                                        color: black;
                                        margin-bottom: .5cm;
                                        margin-top: .5cm;
                                        padding: 10px;
                                        border: 1px solid red;
                                        border-radius: 5px;
                                        font-size: 1rem;
                                        width: 15%;
                                        ">Erreur!</p>';
        
        header('location:'.SITEURL.'admin/manage-food.php');
        }

?>