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

            <br><br><br>

            <div class="col-5">

            <?php   
                $sql = "SELECT * FROM table_admin";
                $result = mysqli_query($cnx, $sql);
                $count = mysqli_num_rows($result);
            ?>

                <h2><?php echo $count; ?></h2>
                <br/>
                Admin
            </div>
            <div class="col-5">
                <h2>5</h2>
                <br/>
                Catégories
            </div>
            <div class="col-5">
            <?php   
                $sql1 = "SELECT * FROM table_food";
                $result1 = mysqli_query($cnx, $sql1);
                $count1 = mysqli_num_rows($result1);
            ?>
                <h2><?php echo $count1; ?></h2>
                <br/>
                Repas
            </div>
            <div class="col-5">
            <?php   
                $sql2 = "SELECT * FROM table_order";
                $result2 = mysqli_query($cnx, $sql2);
                $count2 = mysqli_num_rows($result2);
            ?>
                <h2><?php echo $count2; ?></h2>
                <br/>
                Total Commands
            </div>
            <div class="col-5">
            <?php   
                $sql3 = "SELECT SUM(total) AS Total from table_order WHERE status='Livré'";
                $result3 = mysqli_query($cnx, $sql3);
                $row = mysqli_fetch_assoc($result3);
                $total_revenue = $row['Total'];
            ?>
                <h2><?php echo $total_revenue .'dh'; ?></h2>
                <br/>
                Revenus
            </div>
            <div class="fix"></div>
        </div>
    </div>
    <!-- main ends -->

<?php include('partials/footer.php') ?>