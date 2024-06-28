<?php

session_start();

require_once("../connect.php");

if (isset($_POST['user_id']) && isset($_POST['status'])) {
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

    $valid_statuses = ['in_progress', 'approved', 'rejected'];
    if (!in_array($status, $valid_statuses)) {
        $_SESSION['orders'] = "Statut de commande invalide.";
    } else {
        if ($status == 'in_progress') {
            $sql = "UPDATE orders SET in_progress = 1, approved = 0 WHERE id = :user_id";
        } elseif ($status == 'approved') {
            $sql = "UPDATE orders SET in_progress = 0, approved = 1 WHERE id = :user_id";
        } elseif ($status == 'rejected') {
            $sql = "UPDATE orders SET in_progress = 0, approved = 0 WHERE id = :user_id";
        }

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['orders'] = "Commande mise à jour avec succès";
        } else {
            $_SESSION['orders'] = "Erreur lors de la mise à jour de la commande : " . $stmt->errorInfo()[2];
        }
    }
} else {
    $_SESSION['orders'] = "Données de commande manquantes.";
}

header('Location: orders.php');
exit;
?>