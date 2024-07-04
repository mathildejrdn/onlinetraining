<?php
session_start();
require_once("../connect.php");

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = strip_tags($_POST['product_id']);
    $quantity = strip_tags($_POST['quantity']);

    if (isset($_SESSION['user']['id'])) {
        $user_id = $_SESSION['user']['id'];
        
        // Vérifiez la quantité disponible dans la table products
        $sql = "SELECT stock FROM products WHERE id = :product_id";
        $query = $db->prepare($sql);
        $query->bindValue(":product_id", $product_id, PDO::PARAM_INT);
        $query->execute();
        $product = $query->fetch();

        if ($product && $quantity <= $product['stock']) {
            // Mettez à jour la quantité dans le panier
            $sql = "UPDATE panier SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id";
            $query = $db->prepare($sql);
            $query->bindValue(":quantity", $quantity, PDO::PARAM_INT);
            $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $query->bindValue(":product_id", $product_id, PDO::PARAM_INT);
            $query->execute();

            echo json_encode(['success' => true, 'message' => 'Quantité mise à jour.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Quantité non disponible.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Utilisateur non connecté.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Données invalides.']);
}
?>