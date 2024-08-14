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

print_r($data['my_work']);
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
$nomRepertoire = $_SERVER['DOCUMENT_ROOT'] .'/layout/up1/';


// Vérifiez d'abord si le répertoire n'existe pas déjà
if (!is_dir($nomRepertoire)) {
    // Créez le répertoire avec les permissions 0755 (modifiable selon vos besoins)
    if (mkdir($nomRepertoire,0777)) {
        echo "Répertoire créé avec succès : $nomRepertoire";
    }
}

$path_savad='up1/'.$image_name;
    $path=$nomRepertoire.$image_name;
        move_uploaded_file($image_tmp,$path);

        

$mode = 0644;

if (chmod($path, $mode)) {
    echo "Les permissions du fichier $path ont été modifiées avec succès.";
} else {
    echo "Erreur lors de la modification des permissions pour le fichier $filename.";
}

        $data['my_work']=$path_savad;
    }



}
  
/****************************/
return $data;
}

function addAdm($data){
    global $connect;
    echo'hiiiii';
    print_r($data);
     $sql="insert into  utilisateur(id_util,nom,email,motdepass,rol,Num_tel)values(NULL,'${data['nomAdm']}','${data['emailAdm']}','${data['passAdm']}','${data['rolAdm']}',${data['NtelAdm']})"; 
   // echo($sql);
     $q=mysqli_query($connect,$sql);
      
}
function addCat($data){
    global $connect;
    echo'hiiiii';
    print_r($data);
     $sql="insert into  categories(id_cat,nom_categ)values(NULL,'${data['nom_categ']}')"; 
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


function updateCat($data){
             global $connect;
$sql = "UPDATE  categories SET nom_categ= '${data['nom_categ']}'  WHERE id_cat=${data['id_cat']}";

     $q=mysqli_query($connect,$sql);
     
}

function updateUtil($data)
{
   global $connect;
   // Assuming $connect is your database connection

// Prepare the SQL statement with placeholders
$sql = "UPDATE utilisateur SET nom = ?, email = ?, Num_tel = ?, motdepass = ?, rol = ? WHERE id_util = ?";

// Initialize the prepared statement
$stmt = $connect->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($connect->error));
}

// Bind parameters to the placeholders
$stmt->bind_param('ssisii', $data['nom'], $data['email'], $data['Ntel'], $data['pass'], $data['rol'], $data['idutil']);

// Execute the statement
if ($stmt->execute()) {
    echo "Update successful";
} else {
    echo "Error updating record: " . htmlspecialchars($stmt->error);
}

// Close the statement
$stmt->close();


}
function updateCom($data){
             global $connect;
$sql = "UPDATE commande SET total_amount = '${data['total_amount']}', etat = '${data['etat']}' WHERE id_com = ${data['id_com']} ";


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
?>