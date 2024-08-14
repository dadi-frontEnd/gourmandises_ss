$(document).ready(function () {
  // Capturer l'événement de soumission du formulaire pour ajouter une categorie
  $("#form_ajt_cat").submit(function (e) {
    e.preventDefault(); // Empêcher la soumission par défaut du formulaire
    let fm = $('#form_ajt_cat').serializeArray()
    console.log(fm);

    // //Envoyer la requête AJAX
    $.ajax({
      url: "okkCat.php", // URL du script PHP de traitement
      type: "POST", // Méthode HTTP POST
      data: fm, // Données FormData (y compris le fichier)
       success: function (response) {
        // Gérer la réponse du serveur si nécessaire
        console.log("Réponse du serveur :", response);

        // Réinitialiser le formulaire ou afficher un message de confirmation
        $("#form_ajt_cat")[0].reset();

        // Fermer le modal si nécessaire
        $("#addCatModel").modal("hide");

        // Exemple: actualiser une section particulière
        $("#tableauCategories").load("list_cat.php #tableauCategories > *");
      },
      error: function (xhr, status, error) {
        // Gérer les erreurs de la requête AJAX
        console.error("Erreur AJAX :", status, error);
      },
    });
  });

// Capturer l'événement de soumission du formulaire pour ajouter un produit
  $("#form_ajt").submit(function (e) {
    e.preventDefault(); // Empêcher la soumission par défaut du formulaire

    var formData = new FormData(); // Créer un objet FormData pour les données du formulaire

    // Sérialiser les champs du formulaire (sauf le fichier) et ajouter à formData
    var serializedForm = $(this).serializeArray();
    $.each(serializedForm, function (index, field) {
      formData.append(field.name, field.value);
    });

    // Récupérer le fichier sélectionné par l'utilisateur
    var file = $("#ph")[0].files[0];
    /*************************************/
    


    /************************************/



    console.log(file);
    if (file) {
      formData.append("my_work", file); // Ajouter le fichier à formData
    }
    console.log(formData);
    // Envoyer la requête AJAX
    $.ajax({
      url: "ok.php", // URL du script PHP de traitement
      type: "POST", // Méthode HTTP POST
      data: formData, // Données FormData (y compris le fichier)
      processData: false, // Ne pas traiter les données
      contentType: false, // Ne pas définir le type de contenu
      success: function (response) {
        // Gérer la réponse du serveur si nécessaire
        console.log("Réponse du serveur :", response);

        // Réinitialiser le formulaire ou afficher un message de confirmation
        $("#form_ajt")[0].reset();

        // Fermer le modal si nécessaire
        $("#addProdModel").modal("hide");

        // Exemple: actualiser une section particulière
        $("#tableauProduits").load("list.php #tableauProduits > *");
      },
      error: function (xhr, status, error) {
        // Gérer les erreurs de la requête AJAX
        console.error("Erreur AJAX :", status, error);
      },
    });
  });


  // Capturer l'événement de suppression du produit

  $(document).on("click", ".delete", function (event) {
    event.preventDefault();
    let test = $(this).data("id");
    //alert(test)
    let myId = { id: test };

    /**************************** */
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      /*******Ajax ********** */
      if (result.isConfirmed) {
        $.ajax({
          url: "delete.php",
          type: "GET",
          data: myId,
          success: function (rep, x) {
            if (rep) {
              Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
              });

              $(event.target).closest("tr").remove(); // Supprimer la ligne du tableau par exemple
            }

            //console.log(rep,x);
            else console.log("errrrrrrrrrrrrrr");
            //  $(".data").text(rep)
          },
          error: function (xhr, textStatus, errorTh) {
            console.log(xhr, textStatus, errorTh);
          },
        });
      } // end confirm delete
      /***************** */
    });
    //   /**************************** */
    // });
  });

   // Capturer l'événement de suppression de la categorie

  $(document).on("click", ".deleteCat", function (event) {
    event.preventDefault();
    let test = $(this).data("id");
    //alert(test)
    let myId = { id: test };

    /**************************** */
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      /*******Ajax ********** */
      if (result.isConfirmed) {
        $.ajax({
          url: "deleteCat.php",
          type: "GET",
          data: myId,
          success: function (rep, x) {
            if (rep) {
              Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
              });

              $(event.target).closest("tr").remove(); // Supprimer la ligne du tableau par exemple
            }

            //console.log(rep,x);
            else console.log("errrrrrrrrrrrrrr");
          },
          error: function (xhr, textStatus, errorTh) {
            console.log(xhr, textStatus, errorTh);
          },
        });
      } // end confirm delete
      /***************** */
    });
    //   /**************************** */
    // });
  });

  // Capturer l'événement de suppression de la commande

  $(document).on("click", ".deleteCom", function (event) {
    event.preventDefault();
    let test = $(this).data("id");
    //alert(test)
    let myId = { id: test };

    /**************************** */
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      /*******Ajax ********** */
      if (result.isConfirmed) {
        $.ajax({
          url: "deleteCom.php",
          type: "GET",
          data: myId,
          success: function (rep, x) {
            if (rep) {
              Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
              });

              $(event.target).closest("tr").remove(); // Supprimer la ligne du tableau 
            }

            //console.log(rep,x);
            else console.log("errrrrrrrrrrrrrr");
          },
          error: function (xhr, textStatus, errorTh) {
            console.log(xhr, textStatus, errorTh);
          },
        });
      } // end confirm delete
      /***************** */
    });
    //   /**************************** */
    // });
  });
  // Capturer l'événement de maj du tableau produit

  $(document).on("click", ".edit", function (e) {
    e.preventDefault();
    var productId = $(this).data("id");
    var myId = { id: productId };

    $.ajax({
      url: "edit.php",
      type: "GET",
      data: myId,
      dataType: "json",
      success: function (response) {
        console.log("Réponse du serveur :", response);

        // Remplir le formulaire avec les données récupérées
        $("#idp").val(response.id_prod);
        $("#nomp").val(response.nom_prd);
        $("#prix_p").val(response.prix_prod);
        $("#qtyp").val(response.quantite);
        $("#id_N_catp").val(response.id_cat + "." + response.nom_categ);
       // $("#php").val(response.my_work);

        // Afficher le modal pour la mise à jour du produit
        //$("#updateProdModel").modal("show");

        // Gestion de la soumission du formulaire
        $("#form_maj").submit(function (e) {
          e.preventDefault(); // Empêcher la soumission par défaut du formulaire

          // Récupérer les valeurs du formulaire
          var idProduit = $("#idp").val();
          var nomProduit = $("#nomp").val();
          var prixProduit = $("#prix_p").val();
          var quantiteProduit = $("#qtyp").val();
          var idCatProduit = $("#id_N_catp").val();
          var fichierProduit = $("#php")[0].files[0];

          // Créer un objet FormData pour encapsuler les données
          var formData = new FormData();
          formData.append("id_prod", idProduit);
          formData.append("nom_prd", nomProduit);
          formData.append("prix_prod", prixProduit);
          formData.append("qty", quantiteProduit);
          formData.append("id_N_cat", idCatProduit);
         
                    // Ajouter le fichier à formData
                formData.append("my_work", fichierProduit);

          // Envoyer la requête AJAX pour mettre à jour le produit
          $.ajax({
            url: "update.php",
            type: "POST",
            data: formData,
            processData: false, // Ne pas traiter les données
            contentType: false, // Ne pas définir le type de contenu
            // dataType: "json", // Type de données attendu du serveur

            success: function (response) {
              console.log("Réponse du serveur :", response);

              // Réinitialiser le formulaire ou afficher un message de confirmation
              $("#form_maj")[0].reset();

              // Fermer le modal après la mise à jour
              $("#updateProdModel").modal("hide");

              // Actualiser une section particulière de la page si nécessaire
              $("#tableauProduits").load("list.php #tableauProduits > *");
            },
            error: function (xhr, status, error) {
              console.error("Erreur AJAX :", status, error);
            },
          });
        });
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX :", status, error);
      },
    });
  });
    // Capturer l'événement de maj du tableau categories

   $(document).on("click", ".editCat", function (e) {
    e.preventDefault();
    var catId = $(this).data("id");
    var myId = { id: catId };
     console.log(myId);
    $.ajax({
      url: "editCat.php",
      type: "GET",
      data: myId,
      dataType: "json",
      success: function (response) {
        console.log("Réponse du serveur :", response.id_cat);

        // Remplir le formulaire avec les données récupérées
         $("#idCat").val(response.id_cat);
        $("#nomCat").val(response.nom_categ);
       
        // Afficher le modal pour la mise à jour du produit
        //("#updateCatdModel").modal("show");

        // Gestion de la soumission du formulaire
        $("#form_maj_Cat").submit(function (e) {
          e.preventDefault(); // Empêcher la soumission par défaut du formulaire

          // Récupérer les valeurs du formulaire
          var idCat = $("#idCat").val();
          var nomCat = $("#nomCat").val();
          
          // Créer un objet FormData pour encapsuler les données
          var formData = new FormData();
          formData.append("id_cat", idCat);
          formData.append("nom_categ", nomCat);
          
          // Envoyer la requête AJAX pour mettre à jour le produit
          $.ajax({
            url: "updateCat.php",
            type: "POST",
            data: formData,
            processData: false, // Ne pas traiter les données
            contentType: false, // Ne pas définir le type de contenu
            // dataType: "json", // Type de données attendu du serveur

            success: function (response) {
              console.log("Réponse du serveur :", response);

              // Réinitialiser le formulaire ou afficher un message de confirmation
              $("#form_maj_Cat")[0].reset();

              // Fermer le modal après la mise à jour
              $("#updateCatModel").modal("hide");

              // Actualiser une section particulière de la page si nécessaire
              $("#tableauCategories").load("list_cat.php #tableauCategories > *");
            },
            error: function (xhr, status, error) {
              console.error("Erreur AJAX :", status, error);
            },
          });
        });
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX :", status, error);
      },
    });
   });
  
    // Capturer l'événement de maj du tableau commande

   $(document).on("click", ".editCom", function (e) {
    e.preventDefault();
    var catId = $(this).data("id");
    var myId = { id: catId };
     console.log(myId);
    $.ajax({
      url: "editCom.php",
      type: "GET",
      data: myId,
      dataType: "json",
      success: function (response) {
        console.log("Réponse du serveur :", response);

        // Remplir le formulaire avec les données récupérées
         $("#idCom").val(response.id_com);
        $("#idUtil").val(response.id_util);
       $("#total").val(response.total_amount);
        $("#etat").val(response.etat);
        $("#dateCr").val(response.created_at);
        // Gestion de la soumission du formulaire
        $("#form_maj_Com").submit(function (e) {
          e.preventDefault(); // Empêcher la soumission par défaut du formulaire

          // Récupérer les valeurs du formulaire
          var idCom = $("#idCom").val();
          var idUtil = $("#idUtil").val();
          var total = $("#total").val();
           var etat = $("#etat").val();
           var dateCr = $("#dateCr").val();

          // Créer un objet FormData pour encapsuler les données
          var formData = new FormData();
          formData.append("id_com", idCom);
          formData.append("id_util", idUtil);
          formData.append("total_amount", total);
          formData.append("etat", etat);
          formData.append("created_at", dateCr);
        console.log(formData);
          // Envoyer la requête AJAX pour mettre à jour le produit
          $.ajax({
            url: "updateCom.php",
            type: "POST",
            data: formData,
            processData: false, // Ne pas traiter les données
            contentType: false, // Ne pas définir le type de contenu
            // dataType: "json", // Type de données attendu du serveur

            success: function (response) {
              console.log("Réponse du serveur :", response);

              // Réinitialiser le formulaire ou afficher un message de confirmation
              $("#form_maj_Com")[0].reset();

              // Fermer le modal après la mise à jour
              $("#updateComModel").modal("hide");

              // Actualiser une section particulière de la page si nécessaire
              $("#tableauCommandes").load("list_com.php #tableauCommandes > *");
            },
            error: function (xhr, status, error) {
              console.error("Erreur AJAX :", status, error);
            },
          });
        });
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX :", status, error);
      },
    });
   });
  // Capturer l'événement de maj du tableau utilisateur

   $(document).on("click", ".editUtil", function (e) {
    e.preventDefault();
    var catId = $(this).data("id");
    var myId = { id: catId };
     console.log(myId);
    $.ajax({
      url: "editUtil.php",
      type: "GET",
      data: myId,
      dataType: "json",
      success: function (response) {
        console.log("Réponse du serveur :", response);

        // Remplir le formulaire avec les données récupérées
         $("#nom").val(response.nom);
        $("#idutil").val(response.id_util);
       $("#email").val(response.email);
        $("#Ntel").val(response.Num_tel);
        $("#pass").val(response.motdepass);
         $("#rol").val(response.rol);
        // Gestion de la soumission du formulaire
        $("#form_maj_Util").submit(function (e) {
          e.preventDefault(); // Empêcher la soumission par défaut du formulaire

          // Récupérer les valeurs du formulaire
          var nom = $("#nom").val();
          var idutil = $("#idutil").val();
          var email = $("#email").val();
          var Ntel = $("#Ntel").val();
          var pass = $("#pass").val();
          var rol = $("#rol").val();

          
           // Expressions régulières pour validation
    var userRegex = /^[a-zA-Z0-9_]{3,16}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRegex = /^[567]\d{8}$/;
    var passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    var rolRegex =/^\d$/;
    $("#userError_util, #emailError_util, #passError_util,#NtelError_util,#rolError_util").text("");

    // Variables pour vérifier les erreurs
    let hasError = false;

    // Validation du nom d'utilisateur
    if (!userRegex.test(nom)) {
      $("#userError_util").text(
        "Nom utilisateur invalide (entre 3 et 16 caractères, lettres, chiffres et underscore)"
      );
      hasError = true;
    }

    // Validation du rol d'utilisateur
    if (!rolRegex.test(rol)) {
      $("#rolError_util").text(
        "Role utilisateur invalide (un chiffre)"
      );
      hasError = true;
    }
    // Validation de l'adresse email
    if (!emailRegex.test(email)) {
      $("#emailError_util").text("Adresse email invalide");
      hasError = true;
    }
     // Validation du N° Tel
    if (!phoneRegex.test(Ntel)) {
      $("#NtelError_util").text(
        "Numero de Tel invalide"
      );
      hasError = true;
    }
    // Validation du mot de passe
    if (!passRegex.test(pass)) {
      $("#passError_util").text(
        "Mot de passe invalide (au moins 6 caractères, une majuscule, une minuscule et un chiffre)"
      );
      hasError = true;
    }

   

    // Si une erreur est présente, ne pas continuer avec l'envoi du formulaire
         
          if (hasError == false) {

            // Créer un objet FormData pour encapsuler les données
            var formData = new FormData();
            formData.append("nom", nom);
            formData.append("idutil", idutil);
            formData.append("email", email);
            formData.append("Ntel", Ntel);
            formData.append("pass", pass);
            formData.append("rol", rol);
            console.log(formData);
            // Envoyer la requête AJAX pour mettre à jour l'utilisateur
            $.ajax({
              url: "updateUtil.php",
              type: "POST",
              data: formData,
              processData: false, // Ne pas traiter les données
              contentType: false, // Ne pas définir le type de contenu
              // dataType: "json", // Type de données attendu du serveur

              success: function (response) {
                console.log("Réponse du serveur :", response);

                // Réinitialiser le formulaire ou afficher un message de confirmation
                $("#form_maj_Util")[0].reset();

                // Fermer le modal après la mise à jour
                $("#updateUtilModel").modal("hide");

                // Actualiser une section particulière de la page si nécessaire
                $("#tableauUtilisateurs").load("list_user.php #tableauUtilisateurs > *");
              },
              error: function (xhr, status, error) {
                console.error("Erreur AJAX :", status, error);
              },
            });
          }
        });
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX :", status, error);
      },
    });
   });
    //misa a jour des Admins
   $(document).on("click", ".editAdm", function (e) {
    e.preventDefault();
    var catId = $(this).data("id");
    var myId = { id: catId };
     console.log(myId);
    $.ajax({
      url: "editUtil.php",
      type: "GET",
      data: myId,
      dataType: "json",
      success: function (response) {
        console.log("Réponse du serveur :", response);

        // Remplir le formulaire avec les données récupérées
         $("#nomAdm").val(response.nom);
        $("#idAdm").val(response.id_util);
       $("#emailAdm").val(response.email);
        $("#NtelAdm").val(response.Num_tel);
        $("#passAdm").val(response.motdepass);
         $("#rolAdm").val(response.rol);
        // Gestion de la soumission du formulaire
        $("#form_maj_adm").submit(function (e) {
          e.preventDefault(); // Empêcher la soumission par défaut du formulaire

          // Récupérer les valeurs du formulaire
          var nom = $("#nomAdm").val();
          var idutil = $("#idAdm").val();
          var email = $("#emailAdm").val();
          var Ntel = $("#NtelAdm").val();
          var pass = $("#passAdm").val();
          var rol = $("#rolAdm").val();
   

           // Expressions régulières pour validation
    var userRegex = /^[a-zA-Z0-9_]{3,16}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var phoneRegex = /^[567]\d{8}$/;
    var passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    var rolRegex =/^\d$/;
    $("#userError_adm, #emailError_adm, #passError_adm, #NtelError_adm,#rolError_adm").text("");

    // Variables pour vérifier les erreurs
    let hasError = false;

    // Validation du nom d'utilisateur
    if (!userRegex.test(nom)) {
      $("#userError_adm").text(
        "Nom utilisateur invalide (entre 3 et 16 caractères, lettres, chiffres et underscore)"
      );
      hasError = true;
    }

    // Validation du rol d'utilisateur
    if (!rolRegex.test(rol)) {
      $("#rolError_adm").text(
        "Role utilisateur invalide (un chiffre)"
      );
      hasError = true;
    }
    // Validation de l'adresse email
    if (!emailRegex.test(email)) {
      $("#emailError_adm").text("Adresse email invalide");
      hasError = true;
    }
     // Validation du N° Tel
    if (!phoneRegex.test(Ntel)) {
      $("#NtelError_adm").text(
        "Numero de Tel invalide"
      );
      hasError = true;
    }
    // Validation du mot de passe
    if (!passRegex.test(pass)) {
      $("#passError_adm").text(
        "Mot de passe invalide (au moins 6 caractères, une majuscule, une minuscule et un chiffre)"
      );
      hasError = true;
    }

   

    // Si une erreur est présente, ne pas continuer avec l'envoi du formulaire
          if (hasError == false) {
     



            // Créer un objet FormData pour encapsuler les données
            var formData = new FormData();
            formData.append("nom", nom);
            formData.append("idutil", idutil);
            formData.append("email", email);
            formData.append("Ntel", Ntel);
            formData.append("pass", pass);
            formData.append("rol", rol);
            console.log(formData);
            // Envoyer la requête AJAX pour mettre à jour l'utilisateur
            $.ajax({
              url: "updateUtil.php",
              type: "POST",
              data: formData,
              processData: false, // Ne pas traiter les données
              contentType: false, // Ne pas définir le type de contenu
              // dataType: "json", // Type de données attendu du serveur

              success: function (response) {
                console.log("Réponse du serveur :", response);

                // Réinitialiser le formulaire ou afficher un message de confirmation
                $("#form_maj_adm")[0].reset();

                // Fermer le modal après la mise à jour
                $("#updateAdmModel").modal("hide");

                // Actualiser une section particulière de la page si nécessaire
                $("#tableauAdm").load("list_admin.php #tableauAdm > *");
              },
              error: function (xhr, status, error) {
                console.error("Erreur AJAX :", status, error);
              },
            });
          }
        });
      },
      error: function (xhr, status, error) {
        console.error("Erreur AJAX :", status, error);
      },
    });
   });
   // Capturer l'événement de suppression de l'utilisateur

  $(document).on("click", ".deleteUtil", function (event) {
    event.preventDefault();
    let test = $(this).data("id");
    //alert(test)
    let myId = { id: test };

    /**************************** */
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      /*******Ajax ********** */
      if (result.isConfirmed) {
        $.ajax({
          url: "deleteUtil.php",
          type: "GET",
          data: myId,
          success: function (rep, x) {
            if (rep) {
              Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
              });

              $(event.target).closest("tr").remove(); // Supprimer la ligne du tableau 
            }

            //console.log(rep,x);
            else console.log("errrrrrrrrrrrrrr");
          },
          error: function (xhr, textStatus, errorTh) {
            console.log(xhr, textStatus, errorTh);
          },
        });
      } // end confirm delete
      /***************** */
    });
    //   /**************************** */
    // });
  });
// ajoutre Admin
 $("#form_ajt_adm").submit(function (e) {
    e.preventDefault(); // Empêcher la soumission par défaut du formulaire
    let fm = $('#form_ajt_adm').serializeArray()
    console.log(fm);

    // //Envoyer la requête AJAX
   $.ajax({
     url: "okkAdm.php", // URL du script PHP de traitement
     type: "POST", // Méthode HTTP POST
     data: fm, // Données FormData (y compris le fichier)
     success: function (response) {
       // Gérer la réponse du serveur si nécessaire
       console.log("Réponse du serveur :", response);
       
       // Réinitialiser le formulaire ou afficher un message de confirmation
       $("#form_ajt_adm")[0].reset();

       // Fermer le modal si nécessaire
       $("#addAdmModel").hide();
         
       // Optionally show a success message
       Swal.fire({
         title: 'Success!',
         text: 'Admin added successfully.',
         icon: 'success',
         confirmButtonText: 'OK'
       });
       // Exemple: actualiser une section particulière
       let h = setTimeout(function () {
                          location.href = "list_admin.php";
          }, 3000);

      },
      error: function (xhr, status, error) {
        // Gérer les erreurs de la requête AJAX
        console.error("Erreur AJAX :", status, error);
      },
    });
  });
  
});
