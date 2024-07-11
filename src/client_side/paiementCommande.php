<?php
session_start();
if (isset($_POST["livraison"], $_POST["add_to_order"]) && !empty($_POST["livraison"])) {
    $user_name = strip_tags($_POST["user_lastName"]);
    $user_firstName = strip_tags($_POST["user_firstName"]);
    $user_id = strip_tags($_POST["user_id"]);
    $email = strip_tags($_POST["user_email"]);
    $total_price = strip_tags($_POST["total_price"]);
    $date_order = date('Y-m-d H:i:s', strtotime(strip_tags($_POST["date_order"])));
    $livraison = strip_tags($_POST["livraison"]);
    $user_adress = strip_tags($_POST["user_adress"]);
    $phoneNumber = strip_tags($_POST["user_phoneNumber"]);

    $product_ids = $_POST["product_id"];
    $product_names = $_POST["product_name"];
    $quantities = $_POST["product_quantity"];
    $product_prices = $_POST["product_price"];

    require_once("../connect.php");
     // Insertion dans la table order_ids
     $sql = "INSERT INTO order_ids 
     (user_name, user_firstname, user_id, email, total_price, date_order, livraison, user_adress, phone_number) 
     VALUES 
     (:user_name, :user_firstname, :user_id, :email, :total_price, :date_order, :livraison, :user_adress, :phone_number)";

      $query = $db->prepare($sql);
      $query->bindValue(":user_name", $user_name);
      $query->bindValue(":user_firstname", $user_firstName);
      $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
      $query->bindValue(":email", $email, PDO::PARAM_STR);
      $query->bindValue(":total_price", $total_price, PDO::PARAM_INT);
      $query->bindValue(":date_order", $date_order, PDO::PARAM_STR);
      $query->bindValue(":livraison", $livraison, PDO::PARAM_STR);
      $query->bindValue(":user_adress", $user_adress, PDO::PARAM_STR);
      $query->bindValue(":phone_number", $phoneNumber, PDO::PARAM_STR);
      $query->execute();

      // Récupérer l'order_id généré
      $order_id = $db->lastInsertId();

    

    for ($i = 0; $i < count($product_ids); $i++) {
        $product_id = strip_tags($product_ids[$i]);
        $product_name = strip_tags($product_names[$i]);
        $quantity = strip_tags($quantities[$i]);
        $product_price = strip_tags($product_prices[$i]);

        $sql = "INSERT INTO `orders` 
                (`order_id`,`user_name`, `user_firstname`, `user_id`, `email`, `total_price`, `date_order`, `livraison`, `product_id`, `product_name`, `user_adress`, `quantity`, `phone_number`, `product_price`) 
                VALUES 
                (:order_id, :user_name, :user_firstname, :user_id, :email, :total_price, :date_order, :livraison, :product_id, :product_name, :user_adress, :quantity, :phone_number, :product_price)";

        $query = $db->prepare($sql);
        $query->bindValue(":order_id", $order_id, PDO::PARAM_INT);
        $query->bindValue(":user_name", $user_name);
        $query->bindValue(":user_firstname", $user_firstName);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->bindValue(":email", $email, PDO::PARAM_STR);
        $query->bindValue(":total_price", $total_price, PDO::PARAM_INT);
        $query->bindValue(":date_order", $date_order, PDO::PARAM_STR);
        $query->bindValue(":livraison", $livraison, PDO::PARAM_STR);
        $query->bindValue(":product_id", $product_id, PDO::PARAM_INT);
        $query->bindValue(":product_name", $product_name, PDO::PARAM_STR);
        $query->bindValue(":product_price", $product_price, PDO::PARAM_INT);
        $query->bindValue(":user_adress", $user_adress, PDO::PARAM_STR);
        $query->bindValue(":quantity", $quantity, PDO::PARAM_INT);
        $query->bindValue(":phone_number", $phoneNumber, PDO::PARAM_INT);

        $query->execute();
    }
    

    $sql = "DELETE FROM panier WHERE user_id = :user_id";
        $query = $db->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->execute();
        
    header("Location: ../index.php");
    exit();
} else {
    die("Erreur lors de la validation de la commande. Veuillez réessayer.");
}
?>
