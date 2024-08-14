<?php
require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

include('includes/header.php');
include('includes/topBar.php');
include('includes/sideBar.php');

?>

<div class="content-wrapper">
    
 <!-- Modal pour metre a jour  utilisateurs-->
    <div class="modal fade" id="updateUtilModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUtil"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelUtil">mise ajour du utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="form_maj_Util">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="idutil">Id Utilisateur</label>
                                    <input type="number" class="form-control" id="idutil" name='idutil' readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nom">Nom Utilisateur</label>
                                    <input type="text" class="form-control" id="nom" name='nom'
                                           placeholder="Entrer Nom du utilisateur">
                                    <span id="userError_util" class="text-danger extra-small-text"> </span>
                                </div>
                                 <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name='email'
                                           placeholder="Entrer L'email">
                                         <span id="emailrError_util" class="text-danger extra-small-text"> </span>
                                </div> 
                                <div class="form-group">
                                    <label for="nomUtil">N°tel</label>
                                    <input type="Number" class="form-control" id="Ntel" name='Ntel'
                                           placeholder="Entrer le N° Tel">
                                    <span id="NtelError_util" class="text-danger extra-small-text"> </span>



                                </div> 
                                <div class="form-group">
                                    <label for="pass">Mot De Pass</label>
                                    <input type="password" class="form-control" id="pass" name='pass'
                                           placeholder="Entrer Le Mot De Pass" autocomplete >
                                    <span id="passError_util" class="text-danger extra-small-text"> </span>

                                </div>
                                <div class="form-group">
                                    <label for="rol">Role</label>
                                    <input type="number" class="form-control" id="rol" name='rol'
                                           placeholder="Entrer Le Role">
                                    <span id="rolError_util" class="text-danger extra-small-text"> </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="update" id=updateUtil>update</button>
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
                        <li class="breadcrumb-item active">Gestion De utilisateurs</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listes Des utilisateurs</h3>
            <!-- Button trigger modal -->
            </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tableauUtilisateurs" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>                    
                    <th>Email</th>
                    <th>N° tel</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                   <?php
                    $sql_Util = "SELECT * FROM utilisateur ";
                    if( $sql_Util){
                        $q_Util = mysqli_query($connect, $sql_Util);
                        if($q_Util){
                                    while ($util = mysqli_fetch_array($q_Util, MYSQLI_ASSOC)) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $util['id_util'] ?></td>
                                                            <td><?= $util['nom'] ?></td>
                                                            <td><?= $util['email'] ?></td>
                                                            <td><?= $util['Num_tel'] ?></td>
                                                            <td><?= $util['motdepass'] ?></td>
                                                            <td><?= $util['rol'] ?></td>
                                                            <td>
                                                                <a href="#" data-id="<?= $util['id_util'] ?>" class="deleteUtil"><i class="fas fa-trash-alt"></i> Supprimer</a>
                                                                <a href="#" class="editUtil"  data-toggle="modal"  data-target="#updateUtilModel"
                                                                data-id="<?= $util['id_util'] ?>"> <i class="fas fa-pencil-alt"></i> Éditer</a>
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
