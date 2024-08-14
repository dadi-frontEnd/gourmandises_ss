<?php
// Inclure le fichier de connexion à la base de données
require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

include('includes/header.php');
include('includes/topBar.php');
include('includes/sideBar.php');


?>

<div class="content-wrapper">
    
<!-- Modal pour metre a jour  commande-->
    <div class="modal fade" id="updateComModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelcat"
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
                <form action="" method="post" enctype="multipart/form-data" id="form_maj_Com">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="idCat">Id Commande</label>
                                    <input type="number" class="form-control" id="idCom" name='idCom'  readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nomCat">Id Client</label>
                                    <input type="number" class="form-control" id="idUtil" name='idUtil'
                                       readonly    >
                                </div>
                                <div class="form-group">
                                    <label for="nomCat">Total(DA)</label>
                                    <input type="number" class="form-control" id="total" name='total'
                                           >
                                </div>
                                <div class="form-group">
                                    <label for="etat">Etat</label>
                                    <select class="form-control" id="etat" name="etat">
                                        <option value="Nouvelle">Nouvelle</option>
                                        <option value="En cours de traitement">En cours de traitement</option>
                                        <option value="En attente de paiement">En attente de paiement</option>
                                        <option value="Expédiée">Expédiée</option>
                                        <option value="Annulée">Annulée</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nomCat">Date</label>
                                    <input type="text" class="form-control" id="dateCr" name='dateCr'
                                       readonly    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="update" id=updateCom>update</button>
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
                        <li class="breadcrumb-item active">Liste Des Commandes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listes Des commandes</h3>
            <!-- Button trigger modal -->
            </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tableauCommandes" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID_COMMANDE</th>
                    <th>ID_CLIENT</th>
                    <th>TOTAL(DA)</th>
                    <th>ETAT</th>
                    <TH>DATE</TH>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                   <?php

                    // Préparer la requête SQL pour récupérer les commandes
                     $sql_com = "SELECT id_com, id_util, total_amount,etat ,created_at FROM commande ORDER BY created_at DESC";

                    if( $sql_com){
                        $q_com = mysqli_query($connect, $sql_com);
                        if($q_com){
                                    while ($com = mysqli_fetch_array($q_com, MYSQLI_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $com['id_com'] ?></td>
                                                            <td><?= $com['id_util'] ?></td>
                                                            <td><?= $com['total_amount'] ?></td>
                                                            <td><?= $com['etat'] ?></td>
                                                            <td><?= $com['created_at'] ?></td>
                                                            <td>
                                                                <a href="#" data-id="<?= $com['id_com'] ?>" class="deleteCom"><i class="fas fa-trash-alt"></i> Supprimer</a>
                                                                <a href="#" class="editCom"  data-toggle="modal"  data-target="#updateComModel"
                                                                data-id="<?= $com['id_com'] ?>"> <i class="fas fa-pencil-alt"></i> Éditer</a>
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
