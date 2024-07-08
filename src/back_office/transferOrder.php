 <?php
if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");
    $id = strip_tags($_GET["id"]);
            
    $sql = "SELECT * FROM orders WHERE order_id = :order_id";
    $query= $db->prepare($sql);
    $query->bindValue(":order_id", $id, PDO::PARAM_INT);
    $query->execute();
        
    $order = $query->fetch();
            
    if(!$order){
        header("Location: ../index.php");
        exit;
    } else {
        $sql = "INSERT INTO `completed_orders` 
                (`order_id`,`user_name`, `user_firstname`, `user_id`, `email`, `total_price`, `date_order`, `livraison`, `product_id`, `product_name`, `user_adress`, `quantity`, `phone_number`, `product_price`, `statut`) 
                VALUES 
                (:order_id, :user_name, :user_firstname, :user_id, :email, :total_price, :date_order, :livraison, :product_id, :product_name, :user_adress, :quantity, :phone_number, :product_price, :statut)";

        $query = $db->prepare($sql);
        $query->bindValue(":order_id", $order["order_id"], PDO::PARAM_INT);
        $query->bindValue(":user_name", $order["user_name"]);
        $query->bindValue(":user_firstname", $order["user_firstname"]);
        $query->bindValue(":user_id", $order["user_id"], PDO::PARAM_INT);
        $query->bindValue(":email", $order["email"], PDO::PARAM_STR);
        $query->bindValue(":total_price", $order["total_price"], PDO::PARAM_INT);
        $query->bindValue(":date_order", $order["date_order"], PDO::PARAM_STR);
        $query->bindValue(":livraison", $order["livraison"], PDO::PARAM_STR);
        $query->bindValue(":product_id", $order["product_id"], PDO::PARAM_INT);
        $query->bindValue(":product_name", $order["product_name"], PDO::PARAM_STR);
        $query->bindValue(":product_price", $order["product_price"], PDO::PARAM_INT);
        $query->bindValue(":user_adress", $order["user_adress"], PDO::PARAM_STR);
        $query->bindValue(":quantity", $order["quantity"], PDO::PARAM_INT);
        $query->bindValue(":phone_number", $order["phone_number"], PDO::PARAM_INT);
        $query->bindValue(":statut", $order["statut"], PDO::PARAM_INT);

        $query->execute();

            // Supprimer l'utilisateur de la table users
            $sql = "DELETE FROM orders WHERE order_id = :order_id";
            $query = $db->prepare($sql);
            $query->bindValue(":order_id", $id, PDO::PARAM_INT);
            $query->execute();
            header("Location: orders.php");
            exit;
            }
            
        } else {
                die("Erreur lors du transfert. Veuillez réessayer.");
        }
        
        