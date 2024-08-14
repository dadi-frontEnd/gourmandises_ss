<?php 
if(!isset($_SESSION)){
    // Démarrer la session si elle n'est pas déjà démarrée
    session_start();
}

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = [];
}
require_once('include/connection.php');
?>

<style>
    .card-img-top {
        max-height: 300px;
        object-fit: cover;
    }
</style>

<div class="container mt-4">
    <?php 
    // la requête SQL pour récupérer les catégories
    $sql1 = "SELECT * FROM categories";

    // Exécution de la requête
    $q1 = mysqli_query($connect, $sql1);

    // Vérification de la requête
    if ($q1) {
        // Parcourir les catégories
        while ($cat = mysqli_fetch_array($q1, MYSQLI_ASSOC)) {
            //  la requête SQL pour récupérer les produits de la catégorie actuelle
            $sql = "SELECT id_prod, nom_prd, prix_prod, my_work FROM produit WHERE id_cat = " . $cat['id_cat'] . " ORDER BY id_prod DESC LIMIT 8";
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

<?php $connect->close(); ?>
