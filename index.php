
<?php include('partials-front/menu.php');?>

<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
        

            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Rechercher .." required autocomplete="off">
                <input type="submit" name="submit" value="Recherche" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Repas le plus vendu</h2>

            <a href="category-pizza.php">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve" id="oussama">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a>

            <a href="category-burger.php">
            <div class="box-3 float-container">
                <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve" id="scroll_pic">

                <h3 class="float-text text-white">Burger</h3>
            </div>
            </a>

            <a href="category-tacos.php">
            <div class="box-3 float-container">
                <img src="images/momo.jpg" alt="Momo" class="img-responsive img-curve test" id="scroll_pic">

                <h3 class="float-text text-white">Tacos</h3>    
            </div>
            </a>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Menu</h2>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Pizza family</h4>
                    <p class="food-price">30dh</p>
                    <p class="food-detail">
                        Fait avec de la sauce italienne, ahsen pizza fel 3alam, f derb dabachi.
                    </p>
                    <br>

                    <a href="order.php" class="btn btn-primary">Order</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Burger Poulet</h4>
                    <p class="food-price">20dh</p>
                    <p class="food-detail">
                        Burger dabachi ofc, wakha matay yakel 3endhom tahed hh
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/burger.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Burger légumes</h4>
                    <p class="food-price">25dh</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Pizza 4 formages</h4>
                    <p class="food-price">23dh</p>
                    <p class="food-detail">
                        pizza fiha la souce o chi hwayj idk hhh, mhm ah zina
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Pizza 4 season</h4>
                    <p class="food-price">40dh</p>
                    <p class="food-detail">
                        Hadi pizza 4 season fiha 4 ta3 lhwayj, mhm la ma 3ejbeek djaj ah kayna lkefta.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order</a>
                </div>
            </div>

            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Tacos</h4>
                    <p class="food-price">25dh</p>
                    <p class="food-detail">
                        Hada tcos ta3 djaj, tan diroh b djaj lmiyeet, "i dont like fast foood!".
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order</a>
                </div>
            </div>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">voir tout le menu</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>