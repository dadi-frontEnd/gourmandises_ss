<?php
session_start();
require_once('../include/connect.php'); // Inclusion du fichier de connexion à la base de données
include('../include/functionLayout.php'); // Inclusion de vos autres fonctions

function user_exist($pass1, $mail) {
    global $connect;

    // Requête SQL préparée pour vérifier si l'utilisateur existe
    $sql = "SELECT id_util,rol  FROM utilisateur WHERE email = ? AND motdepass = ?";
    if ($stmt = $connect->prepare($sql)) {
        $stmt->bind_param("ss", $mail, $pass1);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            // Utilisateur trouvé
            $stmt->bind_result($id_util,$rol);
          

            $stmt->fetch();
            $_SESSION['user_id'] = $id_util; // Stocker l'ID utilisateur dans la session
            $_SESSION['user_c'] = $mail[0]; // Stocker l'email dans la session
             $_SESSION['login'] = "oui";
             if($rol!='1')   $_SESSION['isAdmin'] = "oui";
           
            echo "connected !";
        } else {
            echo "Email ou mot de passe incorrect!";
        }
        $stmt->close();
    } else {
        echo 'Erreur de requête SQL';
    }
}

// Récupération des données POST
$pass1 = isset($_POST['pass1']) ? $_POST['pass1'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';

// Vérification si l'utilisateur existe déjà
user_exist($pass1, $mail);

// Fermeture de la connexion à la base de données
//$connect->close();
?>

   


