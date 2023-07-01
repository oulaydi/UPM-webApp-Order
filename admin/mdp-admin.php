<?php include('partials/menu.php'); ?>

<style>
    .tbl-mdp{
    width: 50%
}

/* add form */
.mdp-input{
    padding: .6rem 1.5rem;
    margin-left: 1.1cm;
    background: #edf2f4;
    border: 2px solid #9d02075d;
    border-radius: 13px;
    font-size: .85rem;
    font-weight: 500;
    color: black;
    outline: none;
    transition: .3s;
}

.mdp-input::placeholder{
    color: #9f5356;
}

.mdp-input:focus{
    filter: brightness(100%);
    background-color: #edf2f4;
    border-color: #9d0208;
}


.mdp-input:hover{
    filter: brightness(97%);

}


form{
    padding-top: 1cm;
}

.st-btn{
    background-color: rgba(106, 219, 26, 0.802);
    padding: 2%;
    margin-top: .5cm;
    color: white;
    font-size: 1em;
    text-decoration: none;
    font-weight: bold;
    transition: .3s;
    border-radius: 3px;
    cursor: pointer;
}

.st-btn:hover{
    color: white;
    background-color: green;
}

.label{
    font-size: 1.1em;
}
</style>

<div class="main-content">
        <div class="cadder">
            <h1>changer le mot de passe</h1>

            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
            ?>

            <form action="" method="POST">
            <table class="tbl-mdp">
                <tr>
                    <td class="label">Ancien mot de passe : </td>
                    <td><input class="mdp-input" type="password" name="current_pwd" required placeholder="Ancien mot de pass" autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="label">nouveau mot de passe : </td>
                    <td><input class="mdp-input" type="password" name="new_pwd" required placeholder="nouveau mot de pass" autocomplete="off"></td>
                </tr>
                <tr>
                    <td class="label">confirmer new password : </td>
                    <td><input class="mdp-input" type="password" name="confirm_pwd" required placeholder="confirmer mot de pass" autocomplete="off"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Modifier" name="submit" class="st-btn">
                    </td>
                </tr>
                </table>
            </form>
        </div>
</div>


<?php include('partials/footer.php'); ?>