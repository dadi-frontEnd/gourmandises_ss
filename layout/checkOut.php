
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
 
<section>

<?php include('include/affichePanier.php');?>
<div class='d-flex justify-content-center mb-3'>
     <?php if(isset($_SESSION['total_panier'])){
      if($_SESSION['total_panier']!=0){
      ?>
       <a href="add_commande.php" type="submit" class="btn mb-3" >Valider la commande</a>
  <?php
      }
    }
?>
</div>
</div>
 </section> 
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
