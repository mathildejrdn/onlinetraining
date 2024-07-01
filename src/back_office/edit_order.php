<?php

session_start();

require_once("../connect.php");

/* Mise a jour traitement */

if (isset($_POST['user_id']) && isset($_POST['status'])) {
$user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

$valid_statuses = ['pending', 'in_progress', 'approved', 'reject'];
if (!in_array($status, $valid_statuses)) {
$_SESSION['orders'] = "Statut de commande invalide.";
} else {
try {
$sql = "UPDATE orders SET status = :status WHERE user_id = :user_id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

$_SESSION['orders'] = "Statut de commande mis à jour avec succès";
} catch (PDOException $e) {
$_SESSION['orders'] = "Erreur lors de la mise à jour de la commande" . $e->getMessage();
}
}
} else {
$_SESSION['orders'] = "Données de commande manquantes";
}

header('Location: orders.php');
exit;
?>