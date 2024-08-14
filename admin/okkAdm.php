<!-- <?php
require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

// Récupérer les données du formulaire
$data['nomAdm'] = isset($_POST['nom']) ? $_POST['nom'] : '';
$data['emailAdm']= isset($_POST['email']) ? $_POST['email'] : '';
$data['rolAdm']= isset($_POST['rol']) ? $_POST['rol'] : '';
$data['passAdm']= isset($_POST['pass']) ? $_POST['pass'] : '';
$data['NtelAdm']= isset($_POST['Ntel']) ? $_POST['Ntel'] : '';
print_r($data);
// Vérifier si les données sont présentes avant d'ajouter la catégorie
if (!empty( $data['nomAdm']) && !empty($data['emailAdm']) && !empty($data['rolAdm']) && !empty($data['passAdm']) && !empty($data['NtelAdm'])){
    // Appeler votre fonction pour ajouter la catégorie
    addAdm($data);

    // Répondre avec un message de succès ou autre indication si nécessaire
    echo "Catégorie ajoutée avec succès.";
} else {
    // Gérer le cas où les données nécessaires ne sont pas complètes
    echo "Erreur : Les données de la catégorie sont incomplètes.";
}
?>
