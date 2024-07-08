<?php
if(isset($_GET["id"]) && !empty($_GET["id"])){
    require_once("../connect.php");
    $id = strip_tags($_GET["id"]);
    
    $sql = "SELECT * FROM orders WHERE order_id = :order_id";
    $query= $db->prepare($sql);
    $query->bindValue(":order_id", $id, PDO::PARAM_INT);
    $query->execute();

    $orders = $query->fetchAll();
    
} else {
    header("Location: orders.php");
    exit();
}

if(!empty($_POST)){
    if(isset($_POST["firstname"], $_POST["lastname"], $_POST["adress"], $_POST["phonenumber"], $_POST["date"], $_POST["statut"]) && (!empty($_POST["firstname"])) && (!empty($_POST["lastname"])) && (!empty($_POST["adress"])) && (!empty($_POST["phonenumber"])) && (!empty($_POST["date"]))  && (!empty($_POST["statut"]))){

        $firstname = strip_tags($_POST["firstname"]);
        $lastname = strip_tags($_POST["lastname"]);
        $adress = strip_tags($_POST["adress"]);
        $phonenumber = strip_tags($_POST["phonenumber"]);
        $statut = strip_tags($_POST["statut"]);
        $date = strip_tags($_POST["date"]);

        $sql = "UPDATE orders SET user_firstname = :user_firstname, user_name = :user_name, user_adress = :user_adress, phone_number = :phone_number, statut = :statut,  date_order = :date_order WHERE order_id = :order_id";

        $query = $db->prepare($sql);
        $query->bindValue("user_firstname", $firstname, PDO::PARAM_STR);
        $query->bindValue("user_name", $lastname, PDO::PARAM_STR);
        $query->bindValue("user_adress", $adress, PDO::PARAM_STR);
        $query->bindValue("phone_number", $phonenumber, PDO::PARAM_STR);
        $query->bindValue(":statut", $statut, PDO::PARAM_STR);
        $query->bindValue(":date_order", $date, PDO::PARAM_STR);
        $query->bindValue(":order_id", $id, PDO::PARAM_INT);

        $query->execute();
        header("Location: orders.php");
                exit();
        
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Éditer Commande</title>
  <link rel="stylesheet" href="../styles/output.css">
  <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <?php
    
        $orderId = $orders[0]["order_id"];
                 $displayOrderId = 'CMD0' . $orderId;
        ?>
        
    <form id="order_form" class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Résumé de la Commande <?=$displayOrderId?></h1>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="firstname" id="firstname" value="<?=$orders[0]["user_firstname"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="firstname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="lastname" id="lastname" value="<?=$orders[0]["user_name"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="lastname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="adress" id="adress" value="<?=$orders[0]["user_adress"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="adress" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="date" id="date" value="<?=$orders[0]["date_order"]?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="adress" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" name="phonenumber" id="phonenumber" value="<?=$orders[0]["phone_number"]?>" pattern="[0-9]{10}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="phonenumber" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro de téléphone</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PRODUIT</th>
                    <th>PRIX</th>
                    <th>QUANTITE</th>
                </tr>
            </thead>
            <tbody>
           <?php foreach($orders as $order){ ?>
                <tr>
                    <td><?=$order["product_id"]?></td>
                    <td><?=$order["product_name"]?></td>
                    <td><?=$order["product_price"]?>€</td>
                    <td><?=$order["quantity"]?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
          </table>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select name="statut" id="statut" value="<?=$order[0]['statut']?>" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" required>
                <option value="" disabled selected>Statut de la commande</option>
                <option value="pending">En attente</option>
                <option value="en cours">En cours</option>
                <option value="terminée">Terminée</option>
            </select>
            <label for="statut" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Statut de la commande</label>
        </div>
        <div id="order_btn">
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 mb-5">Enregistrer</button>
        </div>
    </form>
   
</body>
</html>





