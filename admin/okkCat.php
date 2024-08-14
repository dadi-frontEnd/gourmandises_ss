<!-- <?php
require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

// Récupérer les données du formulaire
$nom_cat = isset($_POST['nom_cat']) ? $_POST['nom_cat'] : '';

// Vérifier si les données sont présentes avant d'ajouter la catégorie
if (!empty($nom_cat)) {
    $data = array(
        'nom_categ' => $nom_cat
    );
     decremente('categories');
    // Appeler votre fonction pour ajouter la catégorie
    addCat($data);

    // Répondre avec un message de succès ou autre indication si nécessaire
    echo "Catégorie ajoutée avec succès.";
} else {
    // Gérer le cas où les données nécessaires ne sont pas complètes
    echo "Erreur : Les données de la catégorie sont incomplètes.";
}
?>
