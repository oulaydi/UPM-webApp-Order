<?php include('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search-1">
      <div class="container">
        <h2 class="text-center">
          Remplissez ce formulaire pour confirmer votre commande.
        </h2>

        <form action="#" class="order">
          <fieldset>
            <legend>sélectionnée</legend>

            <div class="food-menu-img">
              <img
                src="images/menu-pizza.jpg"
                alt="Chicke Hawain Pizza"
                class="img-responsive img-curve"
              />
            </div>

            <div class="food-menu-desc">
              <h3>Pizza margherita</h3>
              <p class="food-price">15dh</p>

              <div class="order-label">Quantité</div>
              <input
                type="number"
                name="qty"
                class="input-responsive"
                value="1"
                required
              />
            </div>
          </fieldset>

          <fieldset>
            <legend>Détails de livraison</legend>
            <div class="order-label">Nom et Prenom</div>
            <input
              type="text"
              name="full-name"
              placeholder="Oulaydi Hajita"
              class="input-responsive"
              required
            />

            <div class="order-label">Numero tele</div>
            <input
              type="tel"
              name="contact"
              placeholder="+212612345678"
              class="input-responsive"
              required
            />

            <div class="order-label">Email</div>
            <input
              type="email"
              name="email"
              placeholder="text.exemple@email.com"
              class="input-responsive"
              required
            />

            <div class="order-label">Adresse</div>
            <textarea
              name="address"
              rows="10"
              placeholder="Rue, résidence, appartement, N°"
              class="input-responsive"
              required
            ></textarea>

            <input
              type="submit"
              name="submit"
              value="Confirmer la commande"
              class="btn btn-primary"
            />
          </fieldset>
        </form>
      </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
   

    <?php include('partials-front/footer.php'); ?>