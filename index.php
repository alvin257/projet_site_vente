<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="styles/index.css" type="text/css" />
		<meta charset="UTF-8">
		<title>Mercedes G & A class</title>
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
		<script src="script1.js"></script>
		<style>
			#chat-container {
				position:fixed;
				bottom: 0;
				right: 0;
				margin-left:75%;
				width: 300px;
				height: 200px;
				overflow: auto;
				border: 1px solid black;
				padding: 10px;
				background-color:grey;
			}

			#chat-input-area{
				position:fixed;
				margin-top:100px;
				width:250px;
				height:25px;
			}

			#chat-window{
				margin-top:5px;
			}

			#message-input {
				width: 50%;
			}
	</style>
	</head>
	
	<body>
		
		<?php include 'header.php'; ?>
		
		
		<?php
		
			require "./bd.php";
			$bdd= getBD();
			
			//question au prof sur le prblème de prepare()
			
			$rep = $bdd->query ("select id_art,nom,quantite,prix from articles");
			//$rep -> execute();
		?>
		<?php 
			
			if (isset($_SESSION['client'])){
				echo "Bonjour ";
				echo $_SESSION['client']['prenom'];
				echo " ";
				echo $_SESSION['client']['nom'];
			}
			else {
		?>
			
		<div class="nouveau">
			<h2>Si vous êtes un nouveau client,<a href="nouveau.php" class="btn"><strong>cliquez ici </strong></a></h2>

		</div>
		
		<div class="connexion">
			<h2>Sinon,<a href="connexion.php" class="btn"><strong>connectez-vous </strong></a></h2>

		</div>
			
		<?php } ?>
		
		<table class= "tableau">
	
		<tr>
			
			<th> Identifiant </th>
			<th> Modèle </th>
			<th> En stock </th>
			<th> Prix (en Euros) </th>
		</tr>

		<?php
		
		while ($ligne = $rep ->fetch() ){
			echo "<tr>";
			echo "<td>" .$ligne["id_art"]. "</td>\n";
			echo "<td><a href='http://localhost/Ingabire/articles/article.php?id_art=" .$ligne["id_art"]. "'>".$ligne["nom"]. "</a></td>\n";
			echo "<td>" .$ligne["quantite"]. "</td>\n";
			echo "<td>" .$ligne["prix"]. "</td>\n";
			echo"</tr>";
		}
		?>
		</table>

		<?php $rep -> closeCursor();?>
		
		
		<em><a href="panier.php" class="btn"><strong>Voir mon panier</strong></a></em></br>
		<?php if (isset($_SESSION['client'])): ?>
			<div id="chat-container">
					<div id="chat-window"></div>
					<input type="text" id="message-input" maxlength="256" placeholder="Tapez votre message...">
					<button onclick="sendMessage()">Envoyer</button>
			</div>
		<?php endif ?>	
		
		<footer>
		
		<?php if (isset($_SESSION['client'])): ?>
			<a href="deconnexion.php" class="btn"><strong>Se déconnecter</strong></a></br>
			<a href="historique.php" class="btn"><strong>Historique des commandes ></strong></a></br>
			
			
			
		<?php endif ?>	
			<a href="contact/contact.html" class="btn"><strong>CONTACT ></strong></a>
			
		</footer>
	</body>
</html>