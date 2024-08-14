
<?php 
require_once('include/connection.php');
include('include/functionLayout.php');
include ('include/header.php');
 include ('include/navbar.php');

 if(isset($_GET['del'])){
     $del_id=$_GET['del'];
     unset($_SESSION['panier'][$del_id]);
          calcul_total();

 };
if(isset($_GET['qty_p'])){
     $_SESSION['panier'][$id]=$_GET['qty_p'];
     calcul_total();
 };
 ?>

 <div class="panier">
  <div>    <a href="index.php" class="btn m-3">Boutique</a>
</div>
 <section>
        <table>
            <tr>
                <th>image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
             <?php 
             if(!isset($_SESSION['panier'])){
                                              
                         echo ('panier vide');}
                 else {
                          
                            // liste des produits
                            //récupérer les clés du tableau session
                            $ids = array_keys($_SESSION['panier']);
                            // print_r ($ids);
                            if(!empty($ids)){
                                                 foreach ($ids as $i => $id) {
                                                    //si oui 
                                                    $sql= mysqli_query($connect, "SELECT * FROM produit WHERE id_prod =$id") ;
                                                    $products[$i]=mysqli_fetch_array($sql,MYSQLI_ASSOC);
                                                    ?>
                                                    <tr>
                                                    <td><img src="<?=$products[$i]['my_work']?>"></td>
                                                    <td><?=$products[$i]['nom_prd']?></td>
                                                    <td><?=$products[$i]['prix_prod']?>DA</td>
                                                    <td> <form id="qty_form" >
                                                         <input type="hidden" id="id_p" name="id" value="<?= $id ?>">
                                                         <input type="number" name="qty" id="qty_p" min="1" value="<?= $_SESSION['panier'][$id] ?>" onchange="mettreAJourQuantite(<?= $id ?>, this.value)">
                                                         </form>
                                                         <td><a href="panier.php?del=<?=$id?>"><i class="fa-solid fa-trash " style="color:red;cursor:pointer"></i></a></td>
                                                     
                                                </tr>
                                    <?php
                                              }
              
                }
            }
            ?>
             <tr class="total">
               <td> <th>Total : <?=isset($_SESSION['total_panier'])?$_SESSION['total_panier']:0;?>DA</th></td>
            </tr>
            
        </table>
    </section>
    <div>
 <?php if(isset($_SESSION['total_panier'])){
      if($_SESSION['total_panier']!=0){
      ?>
                          <td><a href="test_client.php" class="btn my-3">Acheter Maintenant</a></td>
     <?php
      }
    }
?>
    </div>
   
 </div>  
  <?php include('include/footer.php')?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
     <script>
     function mettreAJourQuantite(idProduit, nouvelleQuantite) {
    // Envoi de la nouvelle quantité au serveur via AJAX avec jQuery
    $.ajax({
      url: 'mise_ajour_panier.php',
      type: 'POST',
      data: {
        idProduit: idProduit,
        nouvelleQuantite: nouvelleQuantite
      },
       
      success: function (response) {
        // Réponse du serveur (optionnelle)
        console.log(response);
        window.location.reload(); // Recharge la page après la mise à jour

      },
      error: function (xhr, status, error) {
        // Gestion des erreurs lors de la requête
        console.error('Erreur lors de la requête : ' + status + ' - ' + error);
      }
    });
  }
     </script>
  </body>
</html>
