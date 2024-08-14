<?php
require_once('includes/connection.php');

// Vérifiez que vous avez bien reçu l'ID du utilisateur
$id_util = isset($_GET['id']) ? $_GET['id'] : NULL;

// Assurez-vous de sécuriser et valider l'ID du utilisateur avant de l'utiliser dans la requête SQL

// Sélectionner les données du utilisateur à mettre à jour
$sql = "SELECT * FROM utilisateur WHERE id_util='$id_util'";
$q = mysqli_query($connect, $sql);

// Vérifiez si la requête s'est bien déroulée
if ($q) {
    // Récupérez les données de la categorie sous forme de tableau associatif
    $data = mysqli_fetch_array($q, MYSQLI_ASSOC);
    // Vous pouvez renvoyer les données sous forme JSON pour une manipulation côté client
    echo json_encode($data);
} else {
    // Gestion de l'erreur si la requête échoue
       echo json_encode(['error' => 'Categorie non trouvé']);

}
?>



 