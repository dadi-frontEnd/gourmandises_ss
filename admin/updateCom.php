
<?php

require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

 
      
    // Récupérer les données du formulaire
  $data['id_util'] = isset($_POST['id_util']) ? $_POST['id_util'] : '';
  $data['id_com'] = isset($_POST['id_com']) ? $_POST['id_com'] : '';
  $data['total_amount'] = isset($_POST['total_amount']) ? $_POST['total_amount'] : '';
  $data['etat'] = isset($_POST['etat']) ? $_POST['etat'] : '';
  $data['created_at'] = isset($_POST['created_at']) ? $_POST['created_at'] : '';
  
print_r($data);
   $sql = "SELECT * FROM commande WHERE id_com = ${data['id_com']} ";

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
      updateCom($data);

   
    // Préparer la réponse JSON
$response = array(
    'status' => 'success',
    'message' => 'commande mis à jour avec succès',
    // autres données à envoyer si nécessaire...
);

// Retourner la réponse JSON
echo json_encode($response);
   
// // Fermeture de la connexion à la base de données
// // mysqli_close($connect);
// ?>