<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Connexion</title>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</head>
		
	<body>
		
		<div class="formulaire">
			<div id="message"></div>
				<label for="mail">Email :</label>
				<input type="text" id="mail" name="mail" value="<?php echo isset($_POST['mail']) ? $_POST['mail'] : ''; ?>">

				<label for="mdp1">Mot de passe :</label>
				<input type="password" id="mdp1" name="mdp1"><br>


			<button id="submit">Se connecter</button><br>
    
		</div>
		
		<p>Nouveau client? <a href="nouveau.php" class="btn"><strong>inscrivez-vous </strong></a></p>
		
		<div><p> *: champs obligatoires </p></div>
		
		<script>
        $(document).ready(function() {
            $('#submit').click(function() {
                var formData = {
                    mail: $('#mail').val(),
                    mdp1: $('#mdp1').val(),
                };

                $.ajax({
                    type: 'GET',
                    url: 'connecter.php',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.connected) {
                            $('#message').html('<div style="color: green;">Connecté avec succès. Redirection en cours...</div>');
                            setTimeout(function() {
                                window.location.href = 'index.php'; // Redirection vers index.php
                            }, 1000);
                        } else {
                            $('#message').html('<div style="color: red;">Erreur de connexion : ' + response.message + '</div>');
                        }
                    },
                    error: function() {
                        console.error('Erreur lors de la requête AJAX de connexion.');
                    }
                });
            });
        });
    </script>
		
	</body>
</html>