<?php include('partials/menu.php');  ?>

<style>
.st-btn{
    background-color: rgba(106, 219, 26, 0.802);
    padding: 2%;
    margin-left: 13%;
    color: white;
    font-size: 1em;
    text-decoration: none;
    font-weight: bold;
    transition: .3s;
    border-radius: 2px;
}

.st-btn:hover{
    color: white;
    background-color: green;
}

.nd-btn{
    background-color: rgba(255, 0, 0, 0.591);
    padding: 2%;
    margin-left: 12%;
    color: white;
    font-size: 1em;
    text-decoration: none;
    font-weight: bold;
    transition: .3s;
    border-radius: 3px;
}

.nd-btn:hover{
    color: white;
    background-color: red;
}
</style>

    <!-- header ends -->

    <!-- main starts -->
    <div class="main-content">
        <div class="cadder">
            <h1>Admin</h1>

            <br/><br/>
            <br/>
            <a href="#" class="add-btn">Ajouter</a>
            <br/><br/>
            <br/>

            <table class="tbl-full">
                <tr>
                    <th>CNE</th>
                    <th>Nom et Prenom</th>
                    <th>Nom d'utilisateur</th>
                    <th>Action</th>
                </tr>

                <tr>
                    <td>EE667357</td>
                    <td>Oussama Oulaydi</td>
                    <td>oulaydi</td>
                    <td>
                        <a href="#" class="st-btn">mettre à jour</a>
                        <a href="#" class="nd-btn" title="supprimer">X</a>
                    </td>
                <tr>
                    <td>EE637986</td>
                    <td>Mohamed Hajita</td>
                    <td>Hajita_m</td>
                    <td>
                        <a href="#" class="st-btn">mettre à jour</a>
                        <a href="#" class="nd-btn" title="supprimer">X</a>
                    </td>
                <tr>
                    <td>E509002</td>
                    <td>UPM Admin</td>
                    <td>upm</td>
                    <td>
                        <a href="#" class="st-btn">mettre à jour</a>
                        <a href="#" class="nd-btn" title="supprimer">X</a>
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <!-- main ends -->

    <!-- social Section Starts Here -->
   <?php include('partials/footer.php'); ?>