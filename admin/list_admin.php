<?php
require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

include('includes/header.php');
include('includes/topBar.php');
include('includes/sideBar.php');

?>

<div class="content-wrapper">
      <!-- Modal pour ajouter Admin-->
 <div class="modal fade" id="addAdmModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelA"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelA">Ajouter Admin</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data" id="form_ajt_adm">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="card-body">
                                           <div class="form-group">
                                                <label for="idAdm_aj">Nom</label>
                                                <input type="number" class="form-control" id="idAdm_aj" name='id'
                                                     readonly>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label for="nomAdm_aj">Nom</label>
                                                <input type="text" class="form-control" id="nomAdm_aj" name='nom'
                                                    placeholder="Entrer Nom du Admin">
                                            </div>
                                            
                                           
                                            <div class="form-group">
                                                <label for="emailAdm_aj">Email</label>
                                                <input type="text" class="form-control" id="emailAdm_aj" name='email'
                                                    placeholder="Entrer L'email">
                                            </div> 
                                            <div class="form-group">
                                                <label for="NtelAdm_aj">N°tel</label>
                                                <input type="Number" class="form-control" id="NtelAdm_aj" name='Ntel'
                                                    placeholder="Entrer le N° Tel">
                                            </div> 
                                            <div class="form-group">
                                                <label for="passAdm_aj">Mot De Pass</label>
                                                <input type="password" class="form-control" id="passAdm_aj" name='pass'
                                                    placeholder="Entrer Le Mot De Pass" autocomplete >
                                            </div>
                                            <div class="form-group">
                                                <label for="rolAdm_aj">Role</label>
                                                <input type="number" class="form-control" id="rolAdm_aj" name='rol'
                                                    placeholder="Entrer Le Role">
                                            </div>
                                        
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


            <!-- Modal pour metre a jour Admin-->
                <div class="modal fade" id="updateAdmModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelAdm"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabelAdm">mise ajour des Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" id="form_maj_adm">
                                <div class="row">
                                    <div class="col col-md-8">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="idutil">Id Utilisateur</label>
                                                <input type="number" class="form-control" id="idAdm" name='idutil' readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nom">Nom Utilisateur</label>
                                                <input type="text" class="form-control" id="nomAdm" name='nom'
                                                    placeholder="Entrer Nom du utilisateur">
                                                       <span id="userError_adm" class="text-danger extra-small-text"> </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="emailAdm" name='email'
                                                    placeholder="Entrer L'email">
                                                     <span id="emailError_adm" class="text-danger extra-small-text"> </span>
                                            </div> 
                                            <div class="form-group">
                                                <label for="Ntel">N°tel</label>
                                                <input type="Number" class="form-control" id="NtelAdm" name='Ntel'
                                                    placeholder="Entrer le N° Tel">
                                                     <span id="NtelError_adm" class="text-danger extra-small-text"> </span>
                                            </div> 
                                            <div class="form-group">
                                                <label for="pass">Mot De Pass</label>
                                                <input type="password" class="form-control" id="passAdm" name='pass'
                                                    placeholder="Entrer Le Mot De Pass" autocomplete >
                                                            <span id="passError_adm" class="text-danger extra-small-text "> </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="rolAdm">Role</label>
                                                <input type="number" class="form-control" id="rolAdm" name='rol'
                                                    placeholder="Entrer Le Role">
                                                 <span id="rolError_adm" class="text-danger extra-small-text "> </span>
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
                                    <li class="breadcrumb-item active">Gestion Des Admin</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listes Des Admin</h3>
                        <!-- Button trigger modal -->
                        <a href="#" type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                        data-target="#addAdmModel">Ajouter Admin </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tableauAdm" class="table table-bordered table-striped">
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
                                $sql_Util = "SELECT * FROM utilisateur WHERE rol!=1";
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
                                                                            <a href="#" class="editAdm"  data-toggle="modal"  data-target="#updateAdmModel"
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
