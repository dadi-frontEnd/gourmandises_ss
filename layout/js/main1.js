$(document).ready(function () {
  /*****************************/
  document.addEventListener("DOMContentLoaded", function () {
    // Initialiser AOS
    AOS.init();
  });
  // Fonction pour vérifier l'état de connexion de l'utilisateur
  function checkLoginStatus() {
    $.ajax({
      url: "check_login_status.php", // Script PHP qui vérifie le statut de connexion
      method: "GET",
      success: function (response) {
        if (response === "connected !") {
          // Utilisateur connecté, changer l'icône
          $("#user_icon").removeClass("fa-user").addClass("fa-sign-out-alt");
          $("#user_nav").attr("href", "auth/logout.php"); // Redirige vers la page de déconnexion
        } else {
          // Utilisateur non connecté, afficher l'icône de connexion
          $("#user_icon").removeClass("fa-sign-out-alt").addClass("fa-user");
          $("#user_nav").attr("href", "auth/register.php"); // Redirige vers la page de connexion
        }
      },
      error: function (xhr, status, error) {
        console.log("Erreur AJAX : " + error);
      },
    });
  }

  // Vérifier le statut de connexion au chargement de la page
  checkLoginStatus();

  // Optionnel: Vous pouvez aussi vérifier l'état après une connexion réussie ou une déconnexion
  $("#form_lg").on("submit", function (e) {
    e.preventDefault();
    var email = $("#mail").val().trim();
    var pass1 = $("#pass1").val();
    var userData = { email: email, password: pass1 };

    $.ajax({
      type: "POST",
      url: "user_login.php",
      data: userData,
      success: function (response) {
        if (response === "Compte existant !") {
          Swal.fire({
            title: "Bienvenue dans Gourmandise!",
            text: response,
            icon: "success",
          }).then(() => {
            checkLoginStatus();
          });
        } else {
          Swal.fire({
            title: "Erreur!",
            text: response,
            icon: "error",
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
    $("#userError, #emailError, #passError, #pass2Error").text("");

    // Récupération des valeurs du formulaire
    var user = $("#user").val().trim();
    var email = $("#mail").val().trim();
    var pass1 = $("#pass1").val();
    var pass2 = $("#pass2").val();

    // Expressions régulières pour validation
    var userRegex = /^[a-zA-Z0-9_]{3,16}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

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
      };

      // Envoi des données via AJAX
      $.ajax({
        type: "POST",
        url: "add_user.php", // URL de votre script de traitement PHP
        data: userData,
        success: function (response) {
          console.log(response);
          if (response == "utilisateur ajouter avec succes!!") {
            Swal.fire({
              title: "Bienvenue  dans gourmandise!",
              text: response,
              icon: "success",
            });
            location.href = "../index.php";
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

      // Envoi des données via AJAX
      $.ajax({
        type: "POST",
        url: "user_login.php", // URL de votre script de traitement PHP
        data: userData,
        success: function (response) {
          console.log(response);
          if (response === "connected !") {
            // Utilisateur connecté, changer l'icône
            $("#user_icon").removeClass("fa-user").addClass("fa-sign-out-alt");
            $("#user_nav").attr("href", "auth/logout.php"); // Redirige vers la page de déconnexion
            // Réinitialiser le formulaire ou effectuer d'autres actions après ajout réussi
            $("#form_lg")[0].reset();
            location.href = "../index.php";
          } else {
            // Utilisateur non connecté, afficher l'icône de connexion
            $("#user_icon").removeClass("fa-sign-out-alt").addClass("fa-user");
            $("#user_nav").attr("href", "auth/register.php"); // Redirige vers la page de connexion
          }
        },
        error: function (xhr, status, error) {
          console.log("Erreur AJAX : " + error);
        },
      });
    }
  });
});
