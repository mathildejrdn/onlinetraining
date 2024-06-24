<?php 

$host = 'db';  
$user = 'online';
$password = 'online_password';
$database = 'online';
$port = 3306; 

session_start();

$mysqli = new mysqli($host, $user, $password, $database, $port);
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Produits</th>
            <th>Nom du produits</th>
            <th>Quantité</th>
        </tr>
        <?php
            if(empty($_SESSION['panier'])){
                echo"Votre pannier est vide";
            } else {
                $ids = array_keys($_SESSION['panier']);
                if (count($ids) > 0) {
                $ids = implode(',', array_map('intval', $ids));
                $products = $mysqli->query("SELECT * FROM panier WHERE id IN ($ids)");
                if($products && $products->num_rows > 0){
                $total = 0;
                while($product = $products->fetch_assoc()) {
                    $total += $product['quantity'] * $_SESSION['panier'][$product['id']];
            }
        }
    }
}
        ?>
        <tr>
            <td><?= $panier["user_id"] ?></td>
            <td><?= $panier["user_name"] ?></td>
            <td><?= $panier["product_id"] ?></td>
            <td><?= $panier["product_name"] ?></td>
            <td><?= $panier["quantity"] ?></td>
        </tr>

    </table>

    <tr>
        <th>Quantité Total:<?=array_sum($_SESSION['panier']) ?></th>
    </tr>

</body>

</html>