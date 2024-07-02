<?php
session_start();
require_once("../connect.php");

/* Mise à jour traitement */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['status'], $_POST['raison'])) {
        // Sanitize input
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
        $raison = filter_var($_POST['raison'], FILTER_SANITIZE_STRING);

        // Define valid statuses
        $valid_statuses = ['pending', 'in_progress', 'approved', 'rejected'];

        // Check if status is valid
        if (!in_array($status, $valid_statuses)) {
            $_SESSION['orders'] = "Statut de commande invalide.";
        } else {
            try {
                // Prepare SQL query
                $sql = "UPDATE orders SET status = :status WHERE first_name = :first_name AND last_name = :last_name";
                $stmt = $db->prepare($sql);

                // Bind parameters
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
                $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
                $stmt->execute();

                $_SESSION['orders'] = "Statut de commande mis à jour avec succès";

                // Log the reason for the update
                if (!empty($raison)) {
                    // You can log the reason here in your database or file system
                    // Example: file_put_contents('log.txt', "Raison de la mise à jour : $raison\n", FILE_APPEND);
                }
            } catch (PDOException $e) {
                $_SESSION['orders'] = "Erreur lors de la mise à jour de la commande: " . $e->getMessage();
            }
        }
    } else {
        $_SESSION['orders'] = "Données de commande manquantes";
    }

    header('Location: orders.php');
    exit;
}
?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mettre à jour le statut de la commande</title>
  <link rel="stylesheet" href="../styles/output.css">
  <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form id="order_status_form" action="update_order_status.php" class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Mettre à jour le statut de la commande</h1>

        <!-- Champ pour le prénom -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="first_name" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
        </div>

        <!-- Champ pour le nom de famille -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="last_name" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom de famille</label>
        </div>

        <!-- Champ pour le statut de la commande -->
        <div class="relative z-0 w-full mb-5 group">
            <select name="status" id="status" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" required>
                <option value="" disabled selected>Choisissez le statut de la commande</option>
                <option value="pending">En attente</option>
                <option value="in_progress">En cours</option>
                <option value="approved">Approuvé</option>
                <option value="rejected">Rejeté</option>
            </select>
            <label for="status" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red
