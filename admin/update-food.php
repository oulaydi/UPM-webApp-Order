<?php include('partials/menu.php'); ?>


<?php

if(isset($_GET['id']))
{
    // get all the info
    $id = $_GET['id'];

    // SQL Query to get selected data
    $sql = "SELECT * FROM table_food WHERE id=$id";
    
    // execute the query
    $result = mysqli_query($cnx, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // get the values from the executed query 
        $row = mysqli_fetch_assoc($result);

        // get individual data from selected food
        $title = $row['titre'];
        $description = $row['description'];
        $prix = $row['prix'];
        $current_image = $row['image'];
    } else {
        // Handle no result or query error here
    }
}
else
{
    // redirect to manage food page
    $_SESSION['update'] = '<p style="  background-color: #edd4d4; ...">Erreur! ...</p>';
    //redirect page to manage food!
    header("location:".SITEURL.'admin/manage-food.php');
    exit(); // Always remember to exit after a header redirect
}

?>



<style>
 .tbl-add {
            width: 50%;
        }

        /* add form */
        .add-input {
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

        .add-input::placeholder {
            color: #9f5356;
        }

        .add-input:focus {
            filter: brightness(100%);
            background-color: #edf2f4;
            border-color: #9d0208;
        }

        .add-input:hover {
            filter: brightness(97%);
        }

        form {
            padding-top: 1cm;
        }

        .st-btn {
            background-color: rgba(106, 219, 26, 0.802);
            padding: .6em;
            margin-top: .5cm;
            color: white;
            font-size: 1em;
            text-decoration: none;
            font-weight: bold;
            transition: .3s;
            border-radius: 3px;
            cursor: pointer;
        }

        .st-btn:hover {
            color: white;
            background-color: green;
        }

        .label {
            font-size: 1.2em;
            font-size: 1.2em;
            display: inline-block;
            width: 100px; /* Adjust the width as needed */
            margin-right: 10px;
            vertical-align: top;
        }
</style>

<div class="main-content">
        <div class="cadder">
            <h1>Modifier le repas</h1>
            
             <form action="" method="POST" enctype="multipart/form-data">
                <label class="label">Titre:</label>
                <input class="add-input" type="text" name="titre" value="" autocomplete="off"><br><br>
                    
                <label class="label">Description:</label>
                <textarea class="add-input" name="description" cols="20" rows="5"></textarea><br><br>
                
                <label class="label">Prix:</label>
                <input class="add-input" type="number" name="prix" min="10" value="" autocomplete="off"><br><br>
                
                <label class="label">Image actuelle</label>
                <tr><td>

                </td></tr><br><br>
                    
                <label class="label">Nouvelle image:</label>
                <input class="add-input" type="file" name="image"><br><br>
                
                <td><tr>
                    <!-- <input type="hidden" name="id" value="<php echo $id; ?>"> -->
                    <!-- <input type="hidden" name="current_image" value="<php echo $current_image; ?>"> -->
                    <input type="submit" value="Sauvegarder" name="submit" class="st-btn">
                </tr></td>
        </form>

        <!-- <php 
        
            if(isset($_POST['submit']))
            {
                //echo "Button Clicked";

                //1. Get all the details from the form
                $id = $_POST['id'];
                $titre = $_POST['titre'];
                $description = $_POST['description'];
                $prix = $_POST['prix'];
                $current_image = $_POST['current_image'];

                //2. Upload the image if selected

                //CHeck whether upload button is clicked or not
                if(isset($_FILES['image']['name']))
                {
                    //Upload BUtton Clicked
                    $image_file = $_FILES['image']['name']; //New Image NAme

                    //CHeck whether th file is available or not
                    if($image_file!="")
                    {
                        //IMage is Available
                        //A. Uploading New Image

                        //REname the Image
                        $filename_parts = explode('.', $image_file); //Gets the extension of the image
                        $ext = end($filename_parts);


                        $image_file = "image-".rand(000, 999).'.'.$ext; //THis will be renamed image
                        

                        //Get the Source Path and DEstination PAth
                        $src_path = $_FILES['image']['tmp_name']; //Source Path
                        $dest_path = "../images/food/".$image_file; //DEstination Path

                        //Upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        /// CHeck whether the image is uploaded or not
                        if($upload==false)
                        {
                            //FAiled to Upload
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            //REdirect to Manage Food 
                            header('location:'.SITEURL.'admin/manage-food.php');
                            //Stop the Process
                            die();
                        }
                        //3. Remove the image if new image is uploaded and current image exists
                        //B. Remove current Image if Available
                        if($current_image!="")
                        {
                            //Current Image is Available
                            //REmove the image
                            $remove_path = "../images/food/".$current_image;
                        
                            $remove = unlink($remove_path);

                            //Check whether the image is removed or not
                            if($remove==false)
                            {
                                //failed to remove current image
                                $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current image.</div>";
                                //redirect to manage food
                                // header('location:'.SITEURL.'admin/manage-food.php');
                                //stop the process
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_file = $current_image; //Default Image when Image is Not Selected
                    }
                }
                else
                {
                    $image_file = $current_image; //Default Image when Button is not Clicked
                }

                

                //4. Update the Food in Database
                $sql1 = "UPDATE table_food SET 
                    titre = '$titre',
                    description = '$description',
                    prix = $prix,
                    image_file = '$image_file',
                    WHERE id=$id
                ";

                //Execute the SQL Query
                $res1 = mysqli_query($cnx, $sql1);

                //CHeck whether the query is executed or not 
                if($res1==true)
                {
                    //Query Exectued and Food Updated
                    $_SESSION['update'] = "<div class='success'>Food Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //Failed to Update Food
                    $_SESSION['update'] = "<div class='error'>Failed to Update Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }

                
            }
?> -->
        </div>
</div>

<?php include('partials/footer.php'); ?>