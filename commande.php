<?php
	session_start();
	
	if (isset($_SESSION['panier']) && !empty ($_SESSION['panier'])) {
		echo 'Récapitulatif de votre commande: ';
		
		echo  '<table>';
		echo '<tr><th>Identifiant</th><th>Modèle</th><th>Prix Unitaire</th><th>Quantité</th><th>Prix Total</th></tr>';

		require "bd.php";
		$bdd= getBD();
		$result = $bdd -> query ("select id_art,nom,prix from articles");
		$prix_total=0;
		foreach ($_SESSION['panier'] as $id_article => $quantite) {
            // Récupérer les détails de l'article à partir de la base de données
            $stmt = $bdd->prepare("SELECT nom, prix,id_stripe FROM articles WHERE id_art = ?");
            $stmt->execute([$id_article]);
            $article = $stmt->fetch();

            if ($article) {
                $prix_unitaire = $article["prix"];
                $prix_total_article = $prix_unitaire * $quantite;
				$id_stripe_prix = $article['id_stripe'];

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
    echo '</table>';
	
	echo "La commande sera expediée à l'adresse suivante:<br>";
	echo $_SESSION['client']['nom']."<br>";
	echo $_SESSION['client']['prenom'].",<br>";
	echo $_SESSION['client']['adresse'];
	
	$id_stripe= isset($_SESSION['client']['id_stripe']) ? $_SESSION['client']['id_stripe'] : '';
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			require_once('vendor/autoload.php');
			require_once('stripe.php');

			// Construire le tableau de produits à acheter
			$items = [];
			foreach ($_SESSION['panier'] as $id_article => $quantite) {
				$items[] = [
					'price' =>$id_stripe_prix,
					'quantity' => $quantite,
				];
			}

			// Créer la session de paiement avec Stripe
			$checkout_session = $stripe->checkout->sessions->create([
				'customer' => $id_stripe,
				'success_url' => 'http://localhost/Ingabire/acheter.php',
				'cancel_url' => 'http://localhost/Ingabire/commande.php',
				'mode' => 'payment',
				'automatic_tax' => ['enabled' => false],
				'items' => $items,
			]);

			// Rediriger l'utilisateur vers la page de paiement de Stripe
			ob_end_flush();
			header("HTTP/1.1 303 See Other");
			header("Location: " . $checkout_session->url);
			exit;
		}
	
	}
	
			
?>
<a href="stripe1.php" class="btn"><strong>Valider </strong></a>