<?php
	// Se connecter à la base de données en appelant la fonction getBD()
	require "bd.php";
	
	$bdd1 = getBD();
	// Fonction pour enregistrer les infos du nouveau client dans la base de données
	function enregistrer($nom, $prenom, $adresse, $numero, $mail, $mdp) {
		$hashmdp = password_hash($mdp, PASSWORD_DEFAULT);
		$bdd1 = getBD();
		// Préparer la requête à executer
		$sql = "INSERT INTO clients(nom,prenom,adresse,numero,mail,mdp) VALUES (?,?,?,?,?,?)";

		// Executer la requête 
		$requete = $bdd1->prepare($sql);
		$requete->execute([$nom,$prenom,$adresse,$numero,$mail,$hashmdp]);
	}

	// Vérifier si les données sont soumises via le formulaire POST
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Récupérer les données du formulaire
		$nom = $_POST['n'];
		$prenom = $_POST['p'];
		$adresse = $_POST['adr'];
		$numero = $_POST['num'];
		$mail = $_POST['mail'];
		$mdp1 = $_POST['mdp1'];
		$mdp2 = $_POST['mdp2'];
			//vérifier s'il ya un mail identique existant
		$sql = "SELECT * FROM clients WHERE mail= :mail";
		$requete = $bdd1->prepare($sql);
		$requete->bindParam(":mail", $mail);
		$requete->execute();
		$ligne = $requete->fetch();

		if ($ligne) {
			header("Location: nouveau.php");
			exit();
		} else {
			if (empty($nom) || empty($prenom) || empty($adresse) || empty($numero) || empty($mail) || empty($mdp1) || empty($mdp2) || $mdp1 != $mdp2) {
				if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
					// fonction pour créer une chaine de caractères à partir de variables
					$par = http_build_query([
						'n' => $nom,
						'p' => $prenom,
						'adr' => $adresse,
						'mail' => $mail,
						'num' => $numero
					]);

					header("Location: nouveau.php");
					exit();
				}
			} else {
				enregistrer($nom, $prenom, $adresse, $numero, $mail, $mdp1);
				header("Location: index.php");
				exit();
			}
		}

		// Fermer la connexion à la base de données
		$bdd1 = null;
		$requete->closeCursor();
	}
?>
