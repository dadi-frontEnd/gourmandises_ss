<?php
//inclure la page de connexion
 require_once ('include/connection.php');
 include('include/functionLayout.php');
 //verifier si une session existe
 if(!isset($_SESSION)){
    //si non demarer la session
    session_start();
 }
 //creer la session
 if(!isset($_SESSION['panier'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['panier'] = array();
   

 }
 if(!isset($_SESSION['total_panier'])){
    $_SESSION['total_panier']=0;
 }
 //récupération de l'id dans le lien
  if(isset($_GET['id'])){//si un id a été envoyé alors :
    $id = $_GET['id'] ;
    echo($id);
    
    //verifier grace a l'id si le produit existe dans la base de  données
    $produit = mysqli_query($connect ,"SELECT * FROM produit WHERE id_prod = $id") ;
    if(empty(mysqli_fetch_assoc($produit))){
        //si ce produit n'existe pas
        die("Ce produit n'existe pas");
    }
    //ajouter le produit dans le panier ( Le tableau)

    if(!isset($_SESSION['panier'][$id])){// si le produit est déjà dans le panier
        $_SESSION['panier'][$id]=1; //Représente la quantité 
    }
  calcul_total();
   //redirection vers la page index.php
   header("Location:index.php#pro");
  

  }
?>
 