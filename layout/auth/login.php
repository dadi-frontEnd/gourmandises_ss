<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>

    <!--Boostrap CDN-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!--google font-->
    <link
      href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">
    
<!--Css file-->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/all.min.css" />
    <link rel="stylesheet" href="../css/normalize.css" />
            <link rel="icon" href="../images/logo.PNG" type="image/PNG">
  <!-- Inclure le fichier CSS de SweetAlert -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.5/sweetalert2.min.css">
</head>
<body>
<form class="row d-flex justify-content-center align-items-center h-100 w-100" id="form_lg">
  <div class="col-md-4">
     
  <div class="row m-3 form-group">
    <div class="col">
    <label for="mail"> Address email</label>
    <input type="text" class="form-control" id="mail"  placeholder=" email">
     <span id="emailError" class="text-danger extra-small-text"> </span>
   </div>
  </div>
  <div class="row m-3 form-group">
    <div class="col">
    <label for="pass1">Mot de pass</label>
    <input type="password" class="form-control" id="pass1"autocomplete placeholder="mot de passe">
    <span id="passError" class="text-danger extra-small-text "> </span>
   </div>
   </div>
 <div class="row m-3 form-group">
    <div class="col">
    <button type="submit" class="btn w-100 " id="btn_lg" >Login</button>
  </div>
  </div>
  
  <div class="row m-3 form-group">
    <div class="col">
    <a href="../index.php"class="btn w-100" >Retour sur Gourmandise</a>
  </div>
  </div>
  </div>
   </form>
 
   <!--footer-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  
<!-- SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.5/sweetalert2.all.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../js/main.js"></script>
       <!--footer-->
</body>
</html>
