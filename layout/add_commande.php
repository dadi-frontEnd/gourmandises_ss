
<?php
session_start();

  require_once('include/connection.php');
  // Variables de session (supposons qu'elles sont déjà définies)
$user_id = $_SESSION['user_id'];
$total_panier = $_SESSION['total_panier'];

// Préparer l'instruction SQL avec des placeholders sécurisés pour éviter les injections SQL
$sql = "INSERT INTO commande (id_com,id_util, total_amount, created_at) VALUES (null,?, ?, NOW())";

// Préparer la requête SQL
$stmt = $connect->prepare($sql);

// Liage des paramètres et exécution de la requête
$stmt->bind_param("id", $user_id, $total_panier);

// Exécuter la requête
if ($stmt->execute()) {
    echo "New record created successfully";unset($_SESSION['total_panier']);unset($_SESSION['panier']);
   echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
      Swal.fire({
        title: 'commande en cours de traitement',
        text: 'Notre equipe vous contactera pour plus de details et confirmation',
        icon: 'success',
        timer: 5000, // L'alerte se fermera automatiquement après 3 secondes (3000 ms)
        willClose: () => {
          // Rediriger ou exécuter une autre action après la fermeture de l'alerte
          window.location.href = 'index.php'; // Changez cette URL en fonction de vos besoins
        }
      });
    </script>
    ";
    //header('location:index.php');

} else {
  echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
      Swal.fire({
        title: 'Erreur!',
        text: 'Quelque chose s\'est mal passé.',
        icon: 'error',
        timer: 3000, // L'alerte se fermera automatiquement après 3 secondes
        willClose: () => {
          window.location.href = 'votre_page.php'; // Changez cette URL en fonction de vos besoins
        }
      });
    </script>
    ";
   // echo "Error: " . $sql . "<br>" . $conn->error;
}

  ?>