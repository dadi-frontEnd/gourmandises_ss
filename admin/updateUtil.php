
<?php

require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

 
      
    // Récupérer les données du formulaire
  $data['nom'] = isset($_POST['nom']) ? $_POST['nom'] : '';
  $data['idutil'] = isset($_POST['idutil']) ? $_POST['idutil'] : '';
  $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
  $data['Ntel'] = isset($_POST['Ntel']) ? $_POST['Ntel'] : '';
  $data['pass'] = isset($_POST['pass']) ? $_POST['pass'] : '';
  $data['rol'] = isset($_POST['rol']) ? $_POST['rol'] : '';

  print_r($data);
   $sql = "SELECT * FROM utilisateur WHERE  id_util = ${data['idutil']} ";

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
      updateUtil($data);

   
    // Préparer la réponse JSON
$response = array(
    'status' => 'success',
    'message' => 'utilisateur mis à jour avec succès',
    // autres données à envoyer si nécessaire...
);

// Retourner la réponse JSON
echo json_encode($response);
   
// // Fermeture de la connexion à la base de données
// // mysqli_close($connect);
// ?>