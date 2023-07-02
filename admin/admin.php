<?php   include('partials/menu.php'); ?>

    <!-- main starts -->
    <div class="main-content">
        <div class="cadder">

        <?php
            
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br><br>

            <h1>TABLEAU DE BORD</h1>

            <div class="col-5">
                <h1>5</h1>
                <br/>
                Catégories
            </div>
            <div class="col-5">
                <h1>5</h1>
                <br/>
                Catégories
            </div>
            <div class="col-5">
                <h1>5</h1>
                <br/>
                Catégories
            </div>
            <div class="col-5">
                <h1>5</h1>
                <br/>
                Catégories
            </div>
            <div class="col-5">
                <h1>5</h1>
                <br/>
                Catégories
            </div>
            <div class="fix"></div>
        </div>
    </div>
    <!-- main ends -->

<?php include('partials/footer.php') ?>