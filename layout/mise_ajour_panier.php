 <?php
session_start();
require_once('include/connection.php');
 include('include/functionLayout.php');
// Vérifier si les données POST existent
if (isset($_POST['idProduit']) && isset($_POST['nouvelleQuantite'])) {
    $idProduit = $_POST['idProduit'];
    $nouvelleQuantite = $_POST['nouvelleQuantite'];

    // Exemple de mise à jour du panier en session
    if (isset($_SESSION['panier'][$idProduit])) {
        $_SESSION['panier'][$idProduit] = $nouvelleQuantite;
        
    }
 calcul_total();
    // Réponse au client (facultatif)
    echo "Quantité mise à jour pour le produit ID $idProduit : $nouvelleQuantite";
   
} else {
    // En cas de données manquantes
    http_response_code(400);
    echo "Erreur : Données manquantes dans la requête.";
}
?>
