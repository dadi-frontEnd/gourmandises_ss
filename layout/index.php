<?php
include ('include/header.php');
 include ('include/navbar.php')?>

    <!--home-->
    <div id="home" class="bg-ligh">
      <div
        id="carouselExampleControls"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active carousel-image bg-img1">
            <div class="description text-center">
              <div class="info">
                <h1 class="title">wedding cake</h1>
                <p class="title mb-3">gourmandise_selma</p>
              </div>
            </div>
          </div>
          <div class="carousel-item carousel-image bg-img2">
            <div class="description text-center">
              <div class="info">
                <h1 class="title">birthday cake</h1>
                <p class="title mb-3">gourmandise_selma</p>
              </div>
            </div>
          </div>
          <div class="carousel-item carousel-image bg-img3">
            <div class="description text-center">
              <div class="info">
                <h1 class="title">mini cake</h1>
                <p class="title mb-3">gourmandise_selma</p>
              </div>
            </div>
          </div>
          <div class="carousel-item carousel-image bg-img4">
            <div class="description text-center">
              <div class="info">
                <h1 class="title">traditional</h1>
                <p class="title mb-3">gourmandise_selma</p>
              </div>
            </div>
          </div>
          <div class="carousel-item carousel-image bg-img5">
            <div class="description text-center">
              <div class="info">
                <h1 class="title">prestige</h1>
                <p class="title mb-3">gourmandise_selma</p>
              </div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleControls"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleControls"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="overlay"></div>
    </div>
    <!--about-->
    <div id="about">
      <div class="container">
        <div class="row">
          <div
            class="col-sd-12 col-md-3"
          >
            <img
              class="w-100 rounded"
              src="images/semi-naked-floral-wedding-cake.webp"
              alt=""
            />
          </div>
          <div
            class="col-sd-12 col-md-3"
           
          >
            <img
              class="w-100 rounded"
              src="images/semi-naked-floral-wedding-cake.webp"
              alt=""
            />
          </div>

          <div
            class="col-sd-12 col-md-6 descrp"
           
          >
            <p class="title">beautiful story</p>
            <p class="text text-black-50">
             La pâtisserie est bien plus qu'une simple cuisine, 
             c'est un art qui demande précision, créativité et amour du détail. 
             Chaque gâteau, chaque dessert est une œuvre d'art sucrée, 
             où les textures et les saveurs se marient pour créer des moments 
             de pur bonheur. Pour les passionnés, la pâtisserie est une façon
              d'expression personnelle, un moyen de partager leur passion avec
               les autres. Du pétrissage de la pâte à la décoration finale, chaque
                étape est une invitation à la créativité, où l'on transforme des ingrédients simples en délices exquis qui apportent joie et douceur à ceux qui les dégustent.
            </p>
          </div>
          <div class="col-sd-12 d-flex justify-content-center">
            <a class="btn mt-2" href="#product">mes creations</a>
          </div>
        </div>
      </div>
    </div>
  <div id='pro'>
   <?php include('product.php')?>
  </div>
    <div class="custommers">
      <div class="glad">
        <p class="text-center text-capitalize">
          the amount of love gained by you people is just pure and we are keep
          on improving our services
        </p>
      </div>
      <div class="row" id="count">
        <div class="col-md-4">
          <div class="value text-center" akhi="100">1000</div>
          <p class="title text-center">months of experience</p>
        </div>
        <div class="col-md-4 text-center">
          <div class="value text-center" akhi="200">200</div>
          <p class="title">happy custommers</p>
        </div>
        <div class="col-md-4">
          <div class="value text-center" akhi="50">50</div>
          <p class="title text-center">cakes varieties</p>
        </div>
      </div>
    </div>
    <?php include('include/footer.php')?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="js/main.js"></script>
     
  </body>
</html>