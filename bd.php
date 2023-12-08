<?php
	
	function getBD(){
		$bdd= new PDO('mysql:host=localhost;dbname=garage;charset=utf8','root','');
		return $bdd;
	}
	
?>