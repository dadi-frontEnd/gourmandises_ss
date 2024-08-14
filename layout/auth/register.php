<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.5/sweetalert2.min.css"> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
<body>
 <form class="row d-flex justify-content-center align-items-center w-100 mt-5" id="form_reg">
  <div class="col-md-4">
    <div class="row m-3 form-group">
      <div class="col">
        <label for="user">Nom utilisateur</label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Nom utilisateur">
   <span id="userError" class="text-danger extra-small-text"> </span>
      </div>
    </div>
    <div class="row m-3 form-group">
      <div class="col">
        <label for="mail">Adresse email</label>
        <input type="text" class="form-control" id="mail" name="mail"  placeholder="Email">
        <span id="emailError" class="text-danger extra-small-text"> </span>
      </div>
    </div>
     <div class="row m-3 form-group">
      <div class="col">
        <label for="Ntel">Num Tel</label>
        <input type="number" class="form-control" id="Ntel" name="Ntel"  placeholder="Ntel">
        <span id="NtelError" class="text-danger extra-small-text"> </span>
      </div>
    </div>
    <div class="row m-3 form-group">
      <div class="col">
        <label for="pass1">Mot de passe</label>
        <input type="password" class="form-control" id="pass1" name="pass1"autocomplete  placeholder="Mot de passe">
        <span id="passError" class="text-danger extra-small-text "> </span>
      </div>
    </div>
    <div class="row m-3 form-group">
      <div class="col">
        <label for="pass2">Confirmer Mot de passe</label>
        <input type="password" class="form-control" id="pass2"autocomplete  name="pass2" placeholder="Confirmer mot de passe">
        <span id="pass2Error" class="text-danger extra-small-text"> </span>
      </div>
    </div>
    <div class="row m-3 form-group">
      <div class="col">
        <button type="submit" class="btn btn-primary w-100" id="submitBtn">S'inscrire</button>
      </div>
    </div>
  </div>
</form>


<form class="row d-flex justify-content-center align-items-center  w-100" >
  <div class="col-md-4">
     
    <div class="row m-3 form-group">
    <div class="col">
    <a href="login.php" class="btn w-100" >Vous avez déja un compte</a>
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
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="../js/main.js"></script>
       <!--footer-->
</body>
</html>