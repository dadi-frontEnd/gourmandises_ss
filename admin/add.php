<?php
require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

include('includes/header.php');
include('includes/topBar.php');
include('includes/sideBar.php');
?>

<div class="content-wrapper">
    <!-- Modal pour ajouter produits-->
    <div class="modal fade" id="addProdModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="form_ajt">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nom">Nom Produit</label>
                                    <input type="text" class="form-control" id="nom" name='nom_prd'
                                           placeholder="Entrer Nom du Produit">
                                </div>
                                <div class="form-group">
                                    <label for="prix_prod">Prix Produit</label>
                                    <input type="number" class="form-control" id="prix_prod"
                                           placeholder="Entrer le Prix" name='prix_prod'>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantité</label>
                                    <input type="number" class="form-control" id="qty" placeholder="Quantité"
                                           name='qty'>
                                </div>
                                <div class="form-group">
                                    <label for="id_N_cat">Catégorie</label>
                                    <?php
                                    // Connexion à la base de données et requête pour récupérer les catégories
                                    $sql_cat = "SELECT * FROM categories";
                                    $q_cat = mysqli_query($connect, $sql_cat);
                                    ?>
                                    <select name="id_N_cat" class="form-select" aria-label="Default select example">
                                        <?php while ($cat = mysqli_fetch_assoc($q_cat)) : ?>
                                            <option><?= $cat['id_cat'] .'.'. $cat['nom_categ'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ph">Image Produit</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="ph" name="my_work"
                                                   accept="image/*">
                                            <label class="custom-file-label" for="ph">Choisissez un fichier</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Télécharger</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="ajouter" >Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gestion De Produits</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- /.card -->
</div>
<!-- /.content-wrapper -->

<?php
include('includes/footer.php');
// Inclusion de jQuery et SweetAlert2 depuis CDN
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.min.js"></script>';

?>
