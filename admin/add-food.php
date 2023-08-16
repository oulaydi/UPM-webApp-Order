<?php include('partials/menu.php'); ?>

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
            <h1>Ajouter un repas</h1>

            <?php
            
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }                

            ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <label class="label">Titre:</label>
            <input class="add-input" type="text" name="titre" placeholder="Tajin" autocomplete="off"><br><br>
                
            <label class="label">Description:</label>
            <textarea class="add-input" name="description" placeholder="votre repas" cols="20" rows="5"></textarea><br><br>
                
            <label class="label">Prix:</label>
            <input class="add-input" type="number" name="prix" min="10" autocomplete="off"><br><br>
                
            <label class="label">Image:</label>
            <input class="add-input" type="file" name="image"><br><br>
                
            <input type="submit" value="Ajouter" name="submit" class="st-btn">
        </form>

        <?php
        
            //check if the submit button is clicked ot not
            if(isset($_POST['submit']))
            {
                //get data from the form
                $titre = $_POST['titre'];
                $description = $_POST['description'];
                $prix = $_POST['prix'];
                                
                //upload the image if selected
                //check if the select image clicked or not!
                if(isset($_FILES['image']['name']))
                {
                    //get more info about the selected pic
                    $image_file = $_FILES['image']['name'];
                    
                    if($image_file != "")
                    {
                        //so the pic is selected
                        //get the extension (jpg, png, gif or etc)
                        // $ext = end( ('.', $image_file));

                        $filename_parts = explode('.', $image_file);
                        $ext = end($filename_parts);


                        //rename the image  
                        $image_file = "image-N°-".rand(000,999).".".$ext;

                        //upload the image
                        //getting the path
                        /* source path is the current location of the image */
                        $src = $_FILES['image']['tmp_name'];

                        /* Destination path for the image */
                        $dst = "../images/food/".$image_file;

                        //upload the image
                        $upload = move_uploaded_file($src, $dst);

                        //check if the pic uploaded or not
                        if($upload == false)
                        {
                            //redirect to the adding food page
                            $_SESSION['upload'] = '<p style="   background-color: #edd4d4;
                                                                color: black;
                                                                padding: 10px;
                                                                border: 1px solid red;
                                                                border-radius: 5px;
                                                                font-size: 1rem;
                                                                width: 40%;"
                                                                >Erreur l\'image sont pas ajoute !</p>';
                            //redirect page to manage admin!
                            header("location:".SITEURL.'admin/add-food.php');
                            die();
                        }
                    }
                }
                else
                {
                    $image_file = ""; //setting default value as blank
                }

                //insert it into the db

                //craete a SQL Query
                $sql = "INSERT INTO table_food SET
                    titre = '$titre',
                    description = '$description',
                    prix = $prix,
                    image = '$image_file'
                ";

                //execute the query 
                $result = mysqli_query($cnx, $sql);

                //check if the data is inserted or not
                if ($result == true)
                {
                    //data inserted successfully
                    $_SESSION['upload'] = '<p style="  background-color: #d4edda;
                                            color: #155724;
                                            margin-top: 1cm;
                                            padding: 10px;
                                            border: 1px solid #c3e6cb;
                                            border-radius: 5px;
                                            font-size: 1rem;
                                            width: 40%;"
                                            >les données ont été insérées avec succès!</p>';

                    //redirect page to manage food!
                    header("location:".SITEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['upload'] = '<p style="   background-color: #edd4d4;
                                                        color: black;
                                                        padding: 10px;
                                                        border: 1px solid red;
                                                        border-radius: 5px;
                                                        font-size: 1rem;
                                                        width: 40%;"
                                                        >Erreur, donnees sont pas ajoute avec succès!</p>';

                    //redirect page to add food!
                    header("location:".SITEURL.'admin/add-food.php');
                }
            }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>