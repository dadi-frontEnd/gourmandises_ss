$(document).ready(function () {
  /*****************************/
 
  //Fonction pour vérifier l'état de connexion de l'utilisateur
  function checkLoginStatus() {
    $.ajax({
      url: "../layout/auth/check_login_status.php", // Script PHP qui vérifie le statut de connexion
      method: "GET",
      success: function (response) {
        response = response.trim();
         console.log(response=== "connected !");
        if (response === "connected !") {
          // Utilisateur connecté, changer l'icône
          $("#user_icon").removeClass("fa-user").addClass("fa-sign-out-alt");
          $("#user_nav").attr("href", "auth/log_out.php"); // Redirige vers la page de déconnexion
          $(".user").addClass("circle");
        } else {
        //   // Utilisateur non connecté, afficher l'icône de connexion
          $("#user_icon").removeClass("fa-sign-out-alt").addClass("fa-user");
          $("#user_nav").attr("href", "auth/register.php"); // Redirige vers la page de connexion
          $(".user").removeClass("circle");
         }
      },
      error: function (xhr, status, error) {
        console.log("Erreur AJAX : " + error);
      },
    });
  }

  // Vérifier le statut de connexion au chargement de la page
  checkLoginStatus();
  $(document).on("click", ".fa-sign-out-alt", function () {
    $.ajax({
      url: "auth/log_out.php",
      method: "get",
      success: function (response) {
        response.trim();
        if (response == "disconected") {
          $("#user_icon").removeClass("fa-sign-out-alt").addClass("fa-user");
          $("#user_nav").attr("href", "auth/register.php"); // Redirige vers la page de connexion
          $(".user").removeClass("circle");
          setTimeout(() => {
                  location.href = "../layout/index.php";
                }); 
              
        }
      },
      error: function (xhr, status, error) {
        console.log("Erreur AJAX : " + error);
      },
    });
  });
 


  // Attendre que le document soit prêt
  $(document).on("submit", "#form_reg", function (e) {
    e.preventDefault(); // Empêcher l'envoi du formulaire par défaut

    // Réinitialiser les messages d'erreur
    $("#userError, #emailError, #passError, #pass2Error,#NtelError").text("");

    // Récupération des valeurs du formulaire
    var user = $("#user").val().trim();
    var email = $("#mail").val().trim();
    var pass1 = $("#pass1").val();
    var pass2 = $("#pass2").val();
    var Ntel = $("#Ntel").val();

    // Expressions régulières pour validation
    var userRegex = /^[a-zA-Z0-9_]{3,16}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRegex = /^(0[567]|02[13])[0-9]{8,9}$/;
    var passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

    // Variables pour vérifier les erreurs
    let hasError = false;

    // Validation du nom d'utilisateur
    if (!userRegex.test(user)) {
      $("#userError").text(
        "Nom utilisateur invalide (entre 3 et 16 caractères, lettres, chiffres et underscore)"
      );
      hasError = true;
    }

    // Validation de l'adresse email
    if (!emailRegex.test(email)) {
      $("#emailError").text("Adresse email invalide");
      hasError = true;
    }
     // Validation du N° Tel
    if (!phoneRegex.test(Ntel)) {
      $("#NtelError").text(
        "Numero de Tel invalide"
      );
      hasError = true;
    }
    // Validation du mot de passe
    if (!passRegex.test(pass1)) {
      $("#passError").text(
        "Mot de passe invalide (au moins 6 caractères, une majuscule, une minuscule et un chiffre)"
      );
      hasError = true;
    }

    // Validation de la confirmation du mot de passe
    if (pass1 !== pass2) {
      $("#pass2Error").text("Les mots de passe ne correspondent pas");
      hasError = true;
    }

    // Si une erreur est présente, ne pas continuer avec l'envoi du formulaire
    if (hasError == false) {
      // Préparer les données pour l'envoi via AJAX
      var userData = {
        user: user,
        mail: email,
        pass1: pass1,
        Ntel:Ntel
      };

      // Envoi des données via AJAX
      $.ajax({
        type: "POST",
        url: "../auth/add_user.php", // URL de votre script de traitement PHP
        data: userData,
        success: function (response) {
          response = response.trim();
          console.log(response);
          if (response === "utilisateur ajouter avec succes!") {
            Swal.fire({
              title: "Bienvenue dans gourmandise!",
              text: response,
              icon: "success",
            });
            $.ajax({
              url: "../auth/check_login_status.php", // Script PHP qui vérifie le statut de connexion
              method: "GET",
              success: function (response) {
                response = response.trim();
                console.log(response);
                if (response === "connected !") {
                  // Utilisateur connecté, changer l'icône
                 $("#user_icon")
                    .removeClass("fa-user")
                    .addClass("fa-sign-out-alt");
                  $("#user_nav").attr("href", "auth/log_out.php"); // Redirige vers la page de déconnexion
                  $(".user").addClass("circle");
                 } else {
                  // Utilisateur non connecté, afficher l'icône de connexion
                 $("#user_icon")
                    .removeClass("fa-sign-out-alt")
                    .addClass("fa-user");
                  $("#user_nav").attr("href", "auth/register.php"); // Redirige vers la page de connexion
                $(".user").removeClass("circle");
                }
                setTimeout(() => {
                  location.href = "../index.php";
                }, 3000); // 3000 millisecondes = 3 secondes
              },
              error: function (xhr, status, error) {
                console.log("Erreur AJAX : " + error);
              },
            });
          } else {
            Swal.fire({
              title: "Erreur!",
              text: response,
              icon: "error",
            });
          }

          // Réinitialiser le formulaire ou effectuer d'autres actions après ajout réussi
          $("#form_reg")[0].reset();
        },
        error: function (xhr, status, error) {
          // Afficher un message d'erreur générique si la requête Ajax échoue
          console.log("Erreur AJAX :");
        },
      });
    }
  });

  // Attendre que le document soit prêt
  $(document).on("submit", "#form_lg", function (e) {
    e.preventDefault(); // Empêcher l'envoi du formulaire par défaut

    // Réinitialiser les messages d'erreur
    $(" #emailError, #passError").text("");

    // Récupération des valeurs du formulaire

    var email = $("#mail").val().trim();
    var pass1 = $("#pass1").val();

    // Expressions régulières pour validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    var passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

    // Variables pour vérifier les erreurs
    let hasError = false;

    // Validation de l'adresse email
    if (!emailRegex.test(email)) {
      $("#emailError").text("Adresse email invalide");
      hasError = true;
    }

    // Validation du mot de passe
    if (!passRegex.test(pass1)) {
      $("#passError").text(
        "Mot de passe invalide (au moins 6 caractères, une majuscule, une minuscule et un chiffre)"
      );
      hasError = true;
    }

    // Si une erreur est présente, ne pas continuer avec l'envoi du formulaire
    if (hasError == false) {
      // Préparer les données pour l'envoi via AJAX
      var userData = {
        mail: email,
        pass1: pass1,
      };
      $.ajax({
        type: "POST",
        url: "../auth/user_login.php",
        data: userData,
        success: function (response) {
          response = response.trim();
          if (response === "connected !") {
            Swal.fire({
              title: "Bienvenue dans Gourmandise!",
              text: response,
              icon: "success",
            });
            $.ajax({
              url: "../auth/check_login_status.php", // Script PHP qui vérifie le statut de connexion
              method: "GET",
              success: function (response) {
                response = response.trim();

                if (response == "connected !") {
                  // Utilisateur connecté, changer l'icône
                  $("#user_icon")
                    .removeClass("fa-user")
                    .addClass("fa-sign-out-alt");
                  $("#user_nav").attr("href", "auth/log_out.php"); // Redirige vers la page de déconnexion
                  $(".user").addClass("circle");
                } else {
                  // Utilisateur non connecté, afficher l'icône de connexion
                  $("#user_icon")
                    .removeClass("fa-sign-out-alt")
                    .addClass("fa-user");
                  $("#user_nav").attr("href", "auth/register.php"); // Redirige vers la page de connexion
                  $(".user").removeClass("circle");
                }
                setTimeout(() => {
                  location.href = "../index.php";
                }, 3000); // 3000 millisecondes = 3 secondes
              },
              error: function (xhr, status, error) {
                console.log("Erreur AJAX : " + error);
              },
            });
          } else {
            Swal.fire({
              title: "Erreur!",
              text: response,
              icon: "error",
            });
          }
          // Réinitialiser le formulaire ou effectuer d'autres actions après ajout réussi
          $("#form_lg")[0].reset();
        },
        error: function (xhr, status, error) {
          console.log("Erreur AJAX : " + error);
        },
  
      });

    }
});
  
  
  
  function mettreAJourQuantite(idProduit, nouvelleQuantite) {
    // Envoi de la nouvelle quantité au serveur via AJAX avec jQuery
    $.ajax({
      url: 'mise_ajour_panier.php',
      type: 'POST',
      data: {
        idProduit: idProduit,
        nouvelleQuantite: nouvelleQuantite
      },
       
      success: function (response) {
        // Réponse du serveur (optionnelle)
        console.log(response);
        window.location.reload(); // Recharge la page après la mise à jour

      },
      error: function (xhr, status, error) {
        // Gestion des erreurs lors de la requête
        console.error('Erreur lors de la requête : ' + status + ' - ' + error);
      }
    });
  }
  
 $(document).on("submit", "#form_c", function (e) {
    e.preventDefault(); // Empêcher l'envoi du formulaire par défaut

    // Réinitialiser les messages d'erreur
    $("#userError, #emailError, #adressError, #phoneError").text("");

    // Récupération des valeurs du formulaire
    var user = $("#user_c").val().trim();
    var email = $("#mail_c").val().trim();
    var adress = $("#adress_c").val().trim();
    var phone = $("#phone_c").val().trim();

    // Expressions régulières pour validation
    var userRegex = /^[a-zA-Z]{3,16}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   var adressRegex =/^[0-9]{1,3}[A-Za-z]+$/;
    var phoneRegex = /^(0[567]|02[13])[0-9]{8,9}$/;

    // Variables pour vérifier les erreurs
    let hasError = false;

    // Validation du nom d'utilisateur
    if (!userRegex.test(user)) {
      $("#userError_c").text(
        "Nom utilisateur invalide (entre 3 et 16 caractères, lettres, chiffres et underscore)"
      );
      hasError = true;
    }

    // Validation de l'adresse email
    if (!emailRegex.test(email)) {
      $("#emailError_c").text("Adresse email invalide");
      hasError = true;
    }

    // Validation du N° Tel
    if (!phoneRegex.test(phone)) {
      $("#phoneError").text(
        "Numero de Tel invalide"
      );
      hasError = true;
    }
// Validation de l'adresse
    if (!adressRegex.test(adress)) {
      $("#adressError").text(
        "Adresse invalide"
      );
      hasError = true;
    }
    // Si une erreur est présente, ne pas continuer avec l'envoi du formulaire
    if (hasError == false) {
      // Préparer les données pour l'envoi via AJAX
      var userData = {
        user_c: user,
        mail_c: email,
        adress_c: adress,
        phone_c:phone
      };

      // Envoi des données via AJAX
      $.ajax({
        type: "POST",
        url: "traitement_commande.php", // URL de votre script de traitement PHP
        data: userData,
        success: function (response) {
          response = response.trim();

          if (response === "utilisateur ajouter avec succes!!") {
            Swal.fire({
              title: "Bienvenue dans gourmandise!",
              text: response,
              icon: "success",
            });
          
          } else {
            Swal.fire({
              title: "Erreur!",
              text: response,
              icon: "error",
            });
          }

          // Réinitialiser le formulaire ou effectuer d'autres actions après ajout réussi
          $("#form_c")[0].reset();
        },
        error: function (xhr, status, error) {
          // Afficher un message d'erreur générique si la requête Ajax échoue
          console.log("Erreur AJAX :");
        },
      });
    }
 });
  
});