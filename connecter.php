<?php
	session_start();
	
	if (isset($_GET['mail']) && isset($_GET['mdp1'])) {
    
    $mail = $_GET['mail'];
	//var_dump($mail);
    $mdp1 = $_GET['mdp1'];
	//var_dump($mdp1);
	require "bd.php";
	$bdd = getBD();

	$query = "SELECT * FROM clients WHERE mail = :mail";
	$stmt = $bdd->prepare($query);
	$stmt->bindParam(':mail', $mail);
	$stmt->execute();
	$row = $stmt->fetch();
	//var_dump($row);
	$mdp_hache = $row['mdp'];
	//var_dump(password_verify($mdp1,$mdp_hache));
	//if(password_verify($mdp1,$mdp_hache)){
	$_SESSION['client'] = array(
		'id_client' => $row['0'],
		'nom' => $row['1'],
		'prenom' => $row['2'],
		'adresse' => $row['3'],
		'numero' => $row['4'],
		'mail' => $row['5'],
		'id_stripe' => $row['7'],
	);
	echo json_encode(array('connected' => true));
	exit();
	} else {
		echo json_encode(array('connected' => false, 'message' => 'Mot de passe incorrect'));
		exit();
	}
	//}
	
?>