
<?php

require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

 
      
    // Récupérer les données du formulaire
  $data['nom_categ'] = isset($_POST['nom_categ']) ? $_POST['nom_categ'] : '';
    $data['id_cat'] = isset($_POST['id_cat']) ? $_POST['id_cat'] : '';
    

   $sql = "SELECT * FROM categories WHERE id_cat = ${data['id_cat']} ";

    $q = mysqli_query($connect, $sql);
    //recuperer les anciennes val de cat
   $last_data=mysqli_fetch_array($q,MYSQLI_ASSOC);
   //si utilisateur n'a pas changer un champ on garde l'ancienne val
   foreach ($data as $key => $value) {
    if($data[$key]=='') $data[$key]=$last_data[$key];
 }   

                echo'hiiiii';
               print_r($data);
//               //Vérifiez si les valeurs ne sont pas vides
      updateCat($data);

   
    // Préparer la réponse JSON
$response = array(
    'status' => 'success',
    'message' => 'categorie mis à jour avec succès',
    // autres données à envoyer si nécessaire...
);

// Retourner la réponse JSON
echo json_encode($response);
   
// // Fermeture de la connexion à la base de données
// // mysqli_close($connect);
// ?>