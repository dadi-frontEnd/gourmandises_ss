<?php
require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

include('includes/header.php');
include('includes/topBar.php');
include('includes/sideBar.php');
// $id_cat = (isset($_GET['id'])) ? $_GET['id'] : NULL;
// echo $id_prod;
// // Sélectionner les données du categorie à mettre à jour
// $sql = "SELECT * FROM categorie WHERE id_prod='$id_prod'";
// $q = mysqli_query($connect, $sql);
// $data = mysqli_fetch_array($q, MYSQLI_ASSOC);
// print_r($data);

?>

<div class="content-wrapper">
    <!-- Modal pour ajouter categories-->
    <div class="modal fade" id="addCatModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une categorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="form_ajt_cat">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nom">Nom categorie</label>
                                    <input type="text" class="form-control" id="nom_categ" name='nom_cat'
                                           placeholder="Entrer Nom du categorie">
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
 <!-- Modal pour metre a jour  categories-->
    <div class="modal fade" id="updateCatModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelcat"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelcat">mise ajour du categorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="form_maj_Cat">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="idCat">Id categorie</label>
                                    <input type="number" class="form-control" id="idCat" name='idCat' readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nomCat">Nom categorie</label>
                                    <input type="text" class="form-control" id="nomCat" name='nom_cat'
                                           placeholder="Entrer Nom du categorie">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="update" id=updateCat>update</button>
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
                        <li class="breadcrumb-item active">Gestion De categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listes Des categories</h3>
            <!-- Button trigger modal -->
            <a href="#" type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
               data-target="#addCatModel">Ajouter categorie </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tableauCategories" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM CATEGORIE</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                    $sql_cat = "SELECT * FROM categories ";
                    if( $sql_cat){
                        $q_cat = mysqli_query($connect, $sql_cat);
                        if($q_cat){
                                    while ($cat = mysqli_fetch_array($q_cat, MYSQLI_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $cat['id_cat'] ?></td>
                                                            <td><?= $cat['nom_categ'] ?></td>
                                                            <td>
                                                                <a href="#" data-id="<?= $cat['id_cat'] ?>" class="deleteCat"><i class="fas fa-trash-alt"></i> Supprimer</a>
                                                                <a href="#" class="editCat"  data-toggle="modal"  data-target="#updateCatModel"
                                                                data-id="<?= $cat['id_cat'] ?>"> <i class="fas fa-pencil-alt"></i> Éditer</a>
                                                            </td>
                                                        </tr>
                                                <?php }

                        }

                    }
               ?>
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
