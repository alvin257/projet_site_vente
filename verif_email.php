<?php
header('Content-Type: application/json');

require("bd.php");
$conn = getBD();


if (isset($_POST['mail'])) {
    $mail = $_POST['mail'];

    // Échappez les données pour éviter les injections SQL
    $mail = $conn->real_escape_string($mail);

    // Requête pour vérifier l'existence de l'e-mail dans la base de données
    $query = "SELECT COUNT(*) as count FROM clients WHERE mail = '$mail'";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $emailExists = ($row['count'] > 0);
		$emailExists=array('exists' => $exists);
        echo json_encode($emailExists);
    } else {
        echo json_encode(['error' => 'Erreur lors de la requête SQL']);
    }
} else {
    echo json_encode(['error' => 'Paramètre manquant']);
}

?>

