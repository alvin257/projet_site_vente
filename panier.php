<?php
	session_start();
	
	if (isset($_SESSION['panier'])) {
		
?>
<table class= "tableau">

	<tr>
		
		<th> Identifiant </th>
		<th> Modèle </th>
		<th> Prix Unitaire(en Euros) </th>
		<th> Exemplaires </th>
		<th> Prix Total </th>
		
	</tr>

<?php

	require "bd.php";
	$bdd= getBD();
	$result = $bdd -> query ("select id_art,nom,prix from articles");
	$prix_total=0;
	
	foreach ($_SESSION['panier'] as $id_article => $quantite) {
		// Récupérer les détails de l'article à partir de la base de données
		$stmt = $bdd->prepare("SELECT nom, prix FROM articles WHERE id_art = ?");
		$stmt->execute([$id_article]);
		$article = $stmt->fetch();
		
		if ($article) {
			$prix_unitaire = $article["prix"];
			$prix_total_article = $prix_unitaire * $quantite;

			echo "<tr>";
			echo "<td>" . $id_article . "</td>\n";
			echo "<td>" . $article["nom"] . "</td>\n";
			echo "<td>" . $prix_unitaire . "</td>\n";
			echo "<td>" . $quantite . "</td>\n";
			echo "<td>" . $prix_total_article . "</td>\n";
			echo "</tr>";

			$prix_total += $prix_total_article;
		}
	}
	
?>
</table>
<?php
echo "Le total de votre panier est de: ",$prix_total," Euros";
?>
<a href="commande.php" class="btn"><strong>Passer la commande </strong></a>
	<?php 
	
	}
	else{
		echo "Votre panier est vide";
	} ?>

<footer>
	<a href="index.php" class="btn"><strong>Retour </strong></a>

</footer>

