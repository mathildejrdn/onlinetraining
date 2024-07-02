<?php

require_once("../connect.php");

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    try {
        // Requête SQL pour récupérer le nom complet de l'utilisateur
        $sql = "SELECT first_name, last_name FROM users WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si on a récupéré un résultat valide
        if ($row) {
            // Concaténer first_name et last_name 
            $fullName = $row['first_name'] . ' ' . $row['last_name'];
            echo htmlspecialchars($fullName); 
        } else {
            echo "-";
        }
    } catch (PDOException $e) {
        // Gérer toute erreur de base de données ici
        echo "-";
    }
} else {
    echo "-";
}
?>

