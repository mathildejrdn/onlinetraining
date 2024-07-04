<?php
session_start();
if(isset($_POST["livraison"], $_POST["add_to_order"])  && !empty($_POST["livraison"])){

        $user_name = strip_tags($_POST["user_name"]);
        $user_id = strip_tags($_POST["user_id"]);
        $email=strip_tags($_POST["user_email"]);
        $total_price=strip_tags($_POST["total_price"]);
        $date_order=strip_tags($_POST["date_order"]);
        $livraison= strip_tags($_POST["livraison"]);
        $product_id = strip_tags($_POST["product_id"]);
        $product_name = strip_tags($_POST["product_name"]);
        $user_adress = strip_tags($_POST["user_adress"]);
        $quantity = strip_tags($_POST["quantity"]);


        require_once("../connect.php");
        $sql = "INSERT INTO `orders` (`user_name`, `user_id`,`email`, `total_price`, `date_order`, `livraison`, `product_id`, `product_name`, `user_adress`, `quantity`) VALUE (:user_name, :user_id, :email, :total_price, :date_order, :livraison, :product_id, :product_name, :user_adress, :quantity)";

        $query=$db->prepare($sql);
        $query->bindValue(":user_name", $user_name);
        $query->bindValue(":user_id", $user_id , PDO::PARAM_INT);
        $query->bindValue(":email", $email , PDO::PARAM_STR);
        $query->bindValue(":total_price", $total_price , PDO::PARAM_INT);
        $query->bindValue(":date_order", $date_order , PDO::PARAM_STR);
        $query->bindValue(":livraison", $livraison , PDO::PARAM_STR);
        $query->bindValue(":product_id", $product_id , PDO::PARAM_INT);
        $query->bindValue(":product_name", $product_name , PDO::PARAM_STR);
        $query->bindValue(":user_adress", $user_adress , PDO::PARAM_STR);
        $query->bindValue(":quantity", $quantity , PDO::PARAM_INT);

        $query->execute();
        header("Location: ../index.php");

    }else {
       die("Erreur lors de la validation de la commande. Veuillez réessayer.");
    }


