<?php  

function addProduct($data) {
    global $connect;

    $nom_prd = mysqli_real_escape_string($connect, $data['nom_prd']);
    $prix_prod = (int) $data['prix_prod'];
    $qty = (int) $data['qty'];
    $id_cat = (int) $data['id_cat'];
    $my_work = mysqli_real_escape_string($connect, $data['my_work']);

    $sql = "INSERT INTO produit (id_prod, nom_prd, prix_prod, quantite, id_cat, my_work) 
            VALUES (NULL, '$nom_prd', $prix_prod, $qty, $id_cat, '$my_work')";
    
    $q = mysqli_query($connect, $sql);







    //   echo'hiiiii prod';
    //  print_r($data);
   

    //  $sql="insert into  produit(id_prod,nom_prd,prix_prod,quantite,id_cat,my_work)values(NULL,'${data['nom']}',${data['prix']},${data['qty']},${data['id_cat']},'up/295956881_524538556145903_1707004592915755400_n (1).jpg	')"; 
    // //  echo($sql);
    //  $q=mysqli_query($connect,$sql);


    //   /

}
function getAllData(){


    $data = array();

    // Récupérer les données du formulaire
    $data['nom_prd'] = isset($_POST['nom_prd']) ? $_POST['nom_prd'] : '';
    $data['prix_prod'] = isset($_POST['prix_prod']) ? $_POST['prix_prod'] : '';
    $data['qty'] = isset($_POST['qty']) ? $_POST['qty'] : '';
    $data['id_N_cat'] = isset($_POST['id_N_cat']) ? $_POST['id_N_cat'] : '';
    //$data['my_work'] = isset($_FILES['my_work']['name']) ? 'up/' . $_FILES['my_work']['name'] : '';
print_r($data);
//echo($_FILES['my_work']['name']);
   
    global $connect;
    echo 'hii getad';
    $n=$_POST['nom_prd'];

   
if( isset($_POST['id_N_cat'])){

    // Sépare la chaîne basée sur le délimiteur '.' et récupère le premier élément
$id_cat_parts = explode(".", $_POST['id_N_cat'], 2);
$id_cat = reset($id_cat_parts);

}
$data['id_cat'] = isset($id_cat) ? $id_cat  : null;

echo'done!!! getalldata';
     print_r($data);
/*********************************/
if (isset($_FILES['my_work']['name'])){
  
$errors=[];
  $image=$_FILES['my_work'];
 echo   '<pre>';
       print_r($_FILES);
 echo  '</pre>';

 $image_name=$_FILES['my_work']['name'];
 $image_path=$_FILES['my_work']['full_path'];
 $image_type=$_FILES['my_work']['type'];
 $image_tmp=$_FILES['my_work']['tmp_name'];
 $image_error=$_FILES['my_work']['error'];
 $image_size=$_FILES['my_work']['size'];



 echo 'image name:  '.$image_name.'<br>';
  echo 'image path:  '.$image_path.'<br>';
 echo 'image type:   '.$image_type.'<br>';
 echo 'image tmp:    '.$image_tmp.'<br>';
 echo 'image error:  '.$image_error.'<br>';
 echo 'image size:   '.$image_size.'<br>';

$max=1000000;
if($image_error==4){//Check if file is uploaded
        $errors[]='<div> No file uploaded</div>';
}else {
     if($image_size>$max){
        $errors[]='<div> file size cant be more than 100000 </div>';
     }
     $alloweded_ext=array('pdf','doc','jpg','png','gif','jpeg','webp');
     $image_ext1=explode('.',$image_name);
     $image_ext=end($image_ext1);
     $image_ext=strtolower($image_ext);
     //Check if file is valid

      if(!in_array($image_ext,$alloweded_ext)){
        $errors[]='<div> FILE IS NOT VALID!!!</div>';
      }
  
}
 if(!empty($errors)){
    foreach($errors as $error){
        echo $error;
    }
    
 }
else{   echo 'FILE UPLOADED BY SUCCESS';

// Spécifiez le chemin du répertoire que vous souhaitez créer
$nomRepertoire = $_SERVER['DOCUMENT_ROOT'].'/admin'.'/up/';

// Vérifiez d'abord si le répertoire n'existe pas déjà
if (!is_dir($nomRepertoire)) {
    // Créez le répertoire avec les permissions 0755 (modifiable selon vos besoins)
    if (mkdir($nomRepertoire, 0755)) {
        echo "Répertoire créé avec succès : $nomRepertoire";
    }
}


    $path=$nomRepertoire.$image_name;
        move_uploaded_file($image_tmp,$path);
        $data['my_work']=$path;
    }



}
  
/****************************/
return $data;
}


function addCat($data){
    global $connect;
    echo'hiiiii';
    print_r($data);
     $sql="insert into  categories(id_cat,nom_categ)values(NULL,'${data['nom']}')"; 
   // echo($sql);
     $q=mysqli_query($connect,$sql);
      
}
function getAllCat(){
    global $connect;
    $data['nom'] = isset($_POST['nom']) ? $_POST['nom'] : null;
// echo'done!!!';
return $data;
}


function update($data){
             global $connect;
$sql = "UPDATE  produit SET nom_prd= '${data['nom_prd']}' ,prix_prod= ${data['prix_prod']},quantite=${data['qty']},my_work= '${data['my_work']}', id_cat= ${data['id_cat']} WHERE id_prod=${data['id_prod']}";

     $q=mysqli_query($connect,$sql);
     
}


function decremente($tableName){
    global $connect;

// Requête SQL pour compter le nombre d'enregistrements dans la table
$sql = "SELECT COUNT(*) as total FROM $tableName";

// Exécution de la requête SQL
$result = mysqli_query($connect, $sql);

// Vérification si la requête a réussi
if ($result) {
    // Récupération du résultat sous forme de tableau associatif
    $row = mysqli_fetch_assoc($result);
    
    // Récupération du total d'enregistrements
    $totalRecords = $row['total'];
    
    // Vérification si la table est vide
    if ($totalRecords == 0) {
        echo "La table $tableName est vide.";
        $sqld="ALTER TABLE $tableName   AUTO_INCREMENT = 1";
        $q_d=mysqli_query($connect,$sqld);
    } else {
        echo "La table $tableName contient $totalRecords enregistrements.";
    }
} else {
    // Affichage de l'erreur si la requête a échoué
    echo "Erreur lors de la requête : " . mysqli_error($connect);
}
};
function test_exist($user, $mail) {
    global $connect;

    // Requête SQL pour vérifier si l'utilisateur existe en se basant sur le nom
    $sql1 = "SELECT COUNT(*) AS count FROM utilisateur WHERE nom = '$user'";
    $result1 = mysqli_query($connect, $sql1);

    // Requête SQL pour vérifier si l'email existe
    $sql2 = "SELECT COUNT(*) AS count FROM utilisateur WHERE email = '$mail'";
    $result2 = mysqli_query($connect, $sql2);

    if ($result1 || $result2) {
        $row1 = mysqli_fetch_assoc($result1);
        $count1 = $row1['count'];
        
        $row2 = mysqli_fetch_assoc($result2);
        $count2 = $row2['count'];

        if ($count1 > 0 && $count2>0) {
            echo 'Compte exisitant !';
            return true;
        }
        else if ($count2 > 0) {
            echo ' Changez Email,il est attribué à un compte !';
            return true;
        }
        else if($count1>0){
            echo 'Changez le nom,il est attribué à un compte !';
            return true;
             }
       // return false; // L'utilisateur n'existe pas
    } else {
        return false;
    }
};

function test_user_exist($mail){
 global $connect;

    // Requête SQL pour vérifier si l'utilisateur existe en se basant sur le nom
   

    // Requête SQL pour vérifier si l'email existe
    $sql2 = "SELECT COUNT(*) AS count FROM utilisateur WHERE email = '$mail'";
    $result2 = mysqli_query($connect, $sql2);

    if ( $result2) {
       
        
        $row2 = mysqli_fetch_assoc($result2);
        $count2 = $row2['count'];

        if ($count2 > 0 ) {
            echo 'Compte exisitant !';
            return true;
        }
        else { // return false; // L'utilisateur n'existe pas
        return false;
    }

};
}
// Fonction pour calculer le total du panier
function calcul_total() {
    global $connect; // Utilisation de la connexion à la base de données (ou session) existante

    // Initialisation du total à zéro
    $total = 0;

    // Vérification si le panier existe dans la session
    if (isset($_SESSION['panier'])) {
        // Récupération des IDs des produits dans le panier
        $ids = array_keys($_SESSION['panier']);

        // Parcours de chaque produit dans le panier pour calculer le total
        foreach ($ids as $id) {
            // Récupération des informations du produit depuis la base de données (ou autre source)
        
            $sql = mysqli_query($connect, "SELECT * FROM produit WHERE id_prod =$id");
            
                    { $product = mysqli_fetch_array($sql, MYSQLI_ASSOC);

                    // Calcul du prix total pour ce produit en multipliant par la quantité
                    $prix_total = $product['prix_prod'] * $_SESSION['panier'][$id];

                    // Ajout du prix total au total général du panier
                    $total += $prix_total;
                }
           
    
}
$_SESSION['total_panier'] = $total;
    
}
}

?>




