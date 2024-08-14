<?php
require_once('include/connection.php');
include ('include/header.php');
 include ('include/navbar.php')
 
 ?>

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


   
<!-- debut de section pour afficher les produits-->
<div class="container">
<?php
     $id=(isset($_GET['id']))?$_GET['id']:null;
  if($id !== null){
            $sql="SELECT nom_categ FROM categories WHERE id_cat=$id";
             $q=mysqli_query($connect,$sql);
if($q){
     $cat=mysqli_fetch_array($q,MYSQLI_ASSOC);
 $sql = "SELECT id_prod, nom_prd, prix_prod, my_work FROM produit WHERE id_cat = $id  ORDER BY id_prod DESC ";
            $result = mysqli_query($connect, $sql);
            ?>
            <h2 class="title py-4">Gâteaux <?php echo $cat['nom_categ']; ?></h2>

            <div class="row">
                <?php
                if ($result && $result->num_rows > 0) {
                    // Affichage des produits
                    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                        <div class="col-sm-12 col-md-3 mb-4 d-flex justify-content-center prod">
                            <div class="card" style="max-width: 18rem;">
                                <img src="<?php echo $data['my_work']; ?>" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $data['nom_prd']; ?></h5>
                                    <p class="card-text"><?php echo $data['prix_prod']; ?> DA</p>
                                </div>
                                <div>
                                    <a href="ajouter_panier.php?id=<?php echo $data['id_prod']; ?>" class="btn m-3">Ajouter au Panier</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // Aucun produit trouvé pour cette catégorie
                    echo "<div class='col-12 no-products'>Aucun produit trouvé dans cette catégorie.</div>";
                }
                ?>
            </div>
            <?php 
        }
    } else {
        echo "Erreur dans la requête SQL : " . mysqli_error($connect);
    }
    ?>
</div>
     
 </div>                


  


<!-- fin de section pour afficher les produits-->
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