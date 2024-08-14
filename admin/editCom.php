<?php
require_once('includes/connection.php');

// Vérifiez que vous avez bien reçu l'ID du produit
$id_com = isset($_GET['id']) ? $_GET['id'] : NULL;

// Assurez-vous de sécuriser et valider l'ID du produit avant de l'utiliser dans la requête SQL

// Sélectionner les données du produit à mettre à jour
$sql = "SELECT * FROM commande WHERE id_com='$id_com'";
$q = mysqli_query($connect, $sql);

// Vérifiez si la requête s'est bien déroulée
if ($q) {
    // Récupérez les données de la categorie sous forme de tableau associatif
    $data = mysqli_fetch_array($q, MYSQLI_ASSOC);
    // Vous pouvez renvoyer les données sous forme JSON pour une manipulation côté client
    echo json_encode($data);
} else {
    // Gestion de l'erreur si la requête échoue
       echo json_encode(['error' => 'Commande non trouvé']);

}
?>



 