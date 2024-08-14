<?php
require_once('includes/connection.php');

// Vérifiez que vous avez bien reçu l'ID du produit
$id_prod = isset($_GET['id']) ? $_GET['id'] : NULL;

// Assurez-vous de sécuriser et valider l'ID du produit avant de l'utiliser dans la requête SQL

// Sélectionner les données du produit à mettre à jour
$sql = "SELECT * FROM produit WHERE id_prod='$id_prod'";
$q = mysqli_query($connect, $sql);

// Vérifiez si la requête s'est bien déroulée
if ($q) {
    // Récupérez les données du produit sous forme de tableau associatif
    $data = mysqli_fetch_array($q, MYSQLI_ASSOC);
   $sqlc = "SELECT nom_categ FROM categories WHERE id_cat='${data['id_cat']}'";
$qc = mysqli_query($connect, $sqlc);
if($qc){
        $datac = mysqli_fetch_array($qc, MYSQLI_ASSOC);
      $data['nom_categ']=$datac['nom_categ'];
}
    // Vous pouvez renvoyer les données sous forme JSON pour une manipulation côté client
    echo json_encode($data);
} else {
    // Gestion de l'erreur si la requête échoue
       echo json_encode(['error' => 'Produit non trouvé']);

}
?>



 