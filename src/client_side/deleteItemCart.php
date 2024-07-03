<?php
session_start();
require_once("../connect.php");

if (isset($_GET['id'])) {
    $panier_id = $_GET['id'];

    // Suppression du produit du panier de l'utilisateur connecté
    if (isset($_SESSION['user']['id'])) {
        $user_id = $_SESSION['user']['id'];

        $sql = "DELETE FROM panier WHERE id = :id AND user_id = :user_id";
        $query = $db->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->bindValue(":id", $panier_id, PDO::PARAM_INT);
        $query->execute();

        header("Location: panierG.php"); // Redirection vers la page du panier après la suppression
        exit;
    }
}