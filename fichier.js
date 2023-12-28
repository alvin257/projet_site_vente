$(document).ready(function() {
	
	function inscrireUtilisateur() {
		// Récupérer les données du formulaire
		var formData = $('form').serialize();

		$.ajax({
			type: 'POST',
			url: 'enregistrement.php', // Ajoutez le chemin vers votre script de traitement PHP
			data: formData,
			success: function(response) {
				// Analyser la réponse du serveur
				if (response.success) {
					var login = {
						mailc: $('#mail').val(),
						mdp1c: $('#mdp1').val(),
					};

					$.ajax({
						type: 'POST',
						url: 'connecter.php', // Ajoutez le chemin vers votre script de traitement PHP
						data: login,
						success: function(response) {
							setTimeout(function() {
								window.location.href = 'index.php'; // Ajoutez le chemin vers votre page d'accueil
							}, 1000);
						},
						error: function() {
							// Gérer les erreurs de connexion
							$('#message').text('Erreur lors de la connexion après l\'inscription.');
							$('#message').css('color', 'red');
						}
					});
				} else {
					// Erreur : afficher un message d'erreur
					$('#message').text(response.message);
					$('#message').css('color', 'red');
				}
			},
			error: function() {
				// Erreur lors de la requête AJAX
				$('#message').text('Une erreur s\'est produite lors de la création du compte.');
				$('#message').css('color', 'red');
			}
		});
	}	
	
	
	// Gérer la soumission du formulaire
	$('form').submit(function(event) {
		event.preventDefault();
		var valid = true;

		// Fonction de validation pour chaque champ
		function validateField(field, regex, errorMessage) {
			var value = $(field).val().trim();
			if (value === '' || (regex && !regex.test(value))) {
				valid = false;
				$(field).css('border-color', 'red');
				$(field).next('.error-msg').text(errorMessage);
			} else {
				$(field).css('border-color', 'green');
				$(field).next('.error-msg').text('');
			}
		}
		

		// Vérification du champ Nom
		validateField('#nom', null, 'Veuillez entrer votre nom.');

		// Vérification du champ Prénom
		validateField('#prenom', null, 'Veuillez entrer votre prénom.');

		// Vérification du champ Adresse
		validateField('#adresse', null, 'Veuillez entrer votre adresse.');

		// Vérification du champ Numéro de téléphone
		validateField('#numero', null, 'Veuillez entrer votre numéro de téléphone.');

		// Vérification du champ Adresse e-mail
		validateField('#mail', /^[^\s@]+@[^\s@]+\.[^\s@]+$/, 'Veuillez entrer une adresse e-mail valide.');

		// Vérification du champ Mot de passe
		vali.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/, 'Le mot de passe doit contenir au moins 1 lettre, 1 chiffre et 1 caractère spécial.');dateField('#mdp1', /^(?=.*[A-Za-z])(?=.*\d)(?=

		// Vérification de la confirmation du mot de passe
		validateField('#mdp2', null, 'Les mots de passe ne correspondent pas.');

		// Si tous les champs sont valides, inscrire l'utilisateur via AJAX
		if (valid) {
			inscrireUtilisateur();
		}
	});



        return false;
    });
/**
$("#inscription").submit(function(e) {
		if($("#nom").val().length == 0){
			$("#nom").after("\n<span>Merci de remplir ce champ</span>");
		}
		if($("#prenom").val().length == 0){
			$("#prenom").after("\n<span>Merci de remplir ce champ</span>");
		}
		if($("#adresse").val().length == 0){
			$("#adresse").after("\n<span>Merci de remplir ce champ</span>");
		}
		if($("#numero").val().length == 0){
			$("#numero").after("\n<span>Merci de remplir ce champ</span>");
		}
		if($("#mail").val().length == 0){
			$("#mail").after("\n<span>Merci de remplir ce champ</span>");
		}
		if($("#mdp1").val().length == 0){
			$("#mdp1").after("\n<span>Merci de remplir ce champ</span>");
		}
		if($("#mdp2").val().length == 0){
			$("#mdp2").after("\n<span>Merci de remplir ce champ</span>");
		}
	}
	
	function inscrireUtilisateur() {	
        //e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "enregistrement.php",
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
				if (response.success) {
                    $("#inscription").after("<span class='success'>Utilisateur inscrit</span>");
                    // Redirigez côté client après 1 seconde
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 1000);
                } else {
                    $("#inscription").after("<span class='error'>" + response.msg + "</span>");
                }
            },
            error: function() {
				$('#message').text('Une erreur s\'est produite lors de la création du compte.');
                $('#message').css('color', 'red');
                //alert("Une erreur est survenue...");
            }
			}
        });
	**/