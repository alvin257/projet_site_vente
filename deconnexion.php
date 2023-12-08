<?php
	session_start();
	unset($_SESSION['client'], $_SESSION['panier']);
		//destruction de la session
	session_destroy();
	
		//redirection sur la page index
	header("Location: index.php");
	exit();
?>