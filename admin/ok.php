    
    <?php
    require_once('includes/connection.php');
    include_once('includes/functionAdmlte.php');

    // Récupérer les données du formulaire ou de l'endroit approprié
    $data = getAllData();

    // Vérifier si les données sont présentes avant d'ajouter le produit
    if (!empty($data['nom_prd']) && !empty($data['prix_prod']) && !empty($data['qty']) && !empty($data['id_N_cat']) && !empty($data['my_work'])) {
        addProduct($data);

        
    } else {
        // Gérer le cas où les données nécessaires ne sont pas complètes
        echo "Erreur : Les données du produit sont incomplètes.";
    }
    // header('location:list.php');
    ?>

