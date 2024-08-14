<?php
session_start();
// Inclusion des fichiers nécessaires
require_once('../include/connect.php');
include('../include/functionLayout.php');

// Supposons que la fonction decremente('utilisateur'); fait une action spécifique, bien que cela ne soit pas défini dans votre message

// Récupération du nom d'utilisateur depuis la requête POST
$user = isset($_POST['user']) ? $_POST['user'] : '';
    $mail = isset($_POST['mail']) ? $_POST['mail'] : '';

    // Échapper les caractères spéciaux dans $user pour éviter les injections SQL
    $user = mysqli_real_escape_string($connect, $user);

// Vérification si l'utilisateur existe déjà
$exist = test_exist($user,$mail);

//Initialisation de la réponse JSON
//$response = array();

if (!$exist) {
    
    // Si l'utilisateur n'existe pas, procéder à l'ajout
    $pass = isset($_POST['pass1']) ? $_POST['pass1'] : '';
    $Ntel = isset($_POST['Ntel']) ? $_POST['Ntel'] : '';

    // Échapper les valeurs pour éviter les injections SQL
    $user = mysqli_real_escape_string($connect, $user);
    $pass = mysqli_real_escape_string($connect, $pass);
    $mail = mysqli_real_escape_string($connect, $mail);

    // Requête SQL pour ajouter un nouvel utilisateur
    $sql = "INSERT INTO utilisateur (id_util, nom, email, motdepass,Num_tel) VALUES (NULL, '$user', '$mail', '$pass',$Ntel)";
    $q = mysqli_query($connect, $sql);
    
     
     if ($q) {
         // Si l'insertion a réussi
           $_SESSION['login']='oui';
           $_SESSION['user_c']=$mail[0];
           // $_SESSION['user_id'] = $id_util; // Stocker l'ID utilisateur dans la session

            echo("utilisateur ajouter avec succes!");

     } else {
        // Si l'insertion a échoué
       echo("error");
    }
}
//     else {
//         // Si utilisateur existe
//        echo('userExist');
// }
?>
