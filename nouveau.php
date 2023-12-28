<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="#" type="text/css" />
		<meta charset="UTF-8">
		<title>Inscription</title>
		
	</head>
	
	<body>
		<form id="inscription" action="enregistrement.php" method="post" autocomplete="on">
			<p>
				Nom* :
				<input class="form-control" type="text" name="n" id="nom"/>
			</p>
			
			<p>
				Prénom* :
				<input class="form-control" type="text" name="p" id="prenom"/>
			</p>
			
			Homme* :
				<INPUT type="radio" name="genre" value="M"><br />
			Femme* :
				<INPUT type="radio" name="genre" value="F">
			
			<p>
				Adresse :
				<input class="form-control" type="text" name="adr" id="adresse"/>
			</p>
			
			<p>
				Numéro de téléphone :
				<input class="form-control" type="text" name="num" id="numero"/>
			</p>
			
			<p>
				Adresse e-mail* :
				<input class="form-control" type="text" name="mail" id="mail"/>
			</p>
			
			<p>
				Mot de passe* :
				<input  class="form-control" type="password" name="mdp1" id="mdp1"/>
			</p>
			
			<p>
				Confirmer votre mot de passe* :
				<input class="form-control" type="password" name="mdp2" id="mdp2"/>
			</p>
			
			<p>
				<input type="submit" value="Envoyer">
			</p>
			
		</form>
		
		<div><p> *: champs obligatoires </p></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="fichier.js"></script>
		
	
	</body>
	
</html>