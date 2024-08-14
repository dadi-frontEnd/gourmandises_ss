<?php
require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

include('includes/header.php');
include('includes/topBar.php');
include('includes/sideBar.php');
$id_prod = (isset($_GET['id'])) ? $_GET['id'] : NULL;
echo $id_prod;
// Sélectionner les données du produit à mettre à jour
$sql = "SELECT * FROM produit WHERE id_prod='$id_prod'";
$q = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($q, MYSQLI_ASSOC);
print_r($data);

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
 <!-- Modal pour metre a jour  produits-->
    <div class="modal fade" id="updateProdModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">mise ajour du Produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="form_maj">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="idp">Id Produit</label>
                                    <input type="text" class="form-control" id="idp" name='idp'
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="nomp">Nom Produit</label>
                                    <input type="text" class="form-control" id="nomp" name='nom_prd'
                                           placeholder="Entrer Nom du Produit">
                                </div>
                                <div class="form-group">
                                    <label for="prix_p">Prix Produit</label>
                                    <input type="number" class="form-control" id="prix_p"
                                           placeholder="Entrer le Prix" name='prix_prod'>
                                </div>
                                <div class="form-group">
                                    <label for="qtyp">Quantité</label>
                                    <input type="number" class="form-control" id="qtyp" placeholder="Quantité"
                                           name='qty'>
                                </div>
                                <div class="form-group">
                                    <label for="id_N_catp">Catégorie</label>
                                    <?php
                                    // Connexion à la base de données et requête pour récupérer les catégories
                                    $sql_cat = "SELECT * FROM categories";
                                    $q_cat = mysqli_query($connect, $sql_cat);
                                    ?>
                                    <select name="id_N_catp"id="id_N_catp" class="form-select" aria-label="Default select example">
                                        <?php while ($cat = mysqli_fetch_assoc($q_cat)) : ?>
                                            <option><?= $cat['id_cat'] .'.'. $cat['nom_categ'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="php">Image Produit</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="php" name="my_work"
                                                   accept="image/*">
                                            <label class="custom-file-label" for="php">Choisissez un fichier</label>
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
                        <button type="submit" class="btn btn-primary" name="update" id=update>update</button>
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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listes Des Produits</h3>
            <!-- Button trigger modal -->
            <a href="#" type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
               data-target="#addProdModel">Ajouter Produit </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body ">
            <table id="tableauProduits" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>PRIX</th>
                    <th>QUANTITE</th>
                    <th>PHOTO</th>
                    <th>CATEGORIE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql_prd = "SELECT * FROM produit";
                $q_prd = mysqli_query($connect, $sql_prd);

                while ($prd = mysqli_fetch_array($q_prd, MYSQLI_ASSOC)) :
                    $sql_cat = "SELECT nom_categ FROM categories WHERE id_cat = {$prd['id_cat']}";
                    $q_cat = mysqli_query($connect, $sql_cat);
                    $cat = mysqli_fetch_array($q_cat, MYSQLI_ASSOC);
                    ?>
                    <tr>
                        <td><?= $prd['id_prod'] ?></td>
                        <td><?= $prd['nom_prd'] ?></td>
                        <td><?= $prd['prix_prod'] ?></td>
                        <td><?= $prd['quantite'] ?></td>
                        <td><?= $prd['my_work'] ?></td>
                        <td><?= $cat['nom_categ'] ?></td>
                        <td>
                            <a href="#" data-id="<?= $prd['id_prod'] ?>" class="delete"><i class="fas fa-trash-alt"></i> Supprimer</a>
                            <a href="#"     class="edit"  data-toggle="modal"
               data-target="#updateProdModel"
                            data-id="<?= $prd['id_prod'] ?>"> <i class="fas fa-pencil-alt"></i> Éditer</a>
                        </td>
                    </tr>
                <?php endwhile ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.content-wrapper -->

<?php
include('includes/footer.php');

?>
