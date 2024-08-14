
<?php

require_once('includes/connection.php');
include_once('includes/functionAdmlte.php');

 
      
    // Récupérer les données du formulaire
   $data=getAllData();
       $data['id_prod'] = isset($_POST['id_prod']) ? $_POST['id_prod'] : '';

   $sql = "SELECT * FROM produit WHERE id_prod = ${data['id_prod']} ";

    $q = mysqli_query($connect, $sql);
   $last_data=mysqli_fetch_array($q,MYSQLI_ASSOC);
                  print_r($last_data['my_work']);

   foreach ($data as $key => $value) {
    if(!$data[$key]) $data[$key]=$last_data[$key];
 }   

                echo'hiiiii';
               print_r($data);
//               //Vérifiez si les valeurs ne sont pas vides
      update($data);

   
    // Préparer la réponse JSON
$response = array(
    'status' => 'success',
    'message' => 'Produit mis à jour avec succès',
    // autres données à envoyer si nécessaire...
);

// Retourner la réponse JSON
echo json_encode($response);
   
// // Fermeture de la connexion à la base de données
// // mysqli_close($connect);
// ?>