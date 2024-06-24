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
            }

        ?>

        <th><?= $panier["user_id"]?></th>
        <th><?= $panier["user_name"]?></th>
        <th><?= $panier["product_id"]?></th>
        <th><?= $panier["product_name"]?></th>
        <th><?= $panier["quantity"]?></th>
    </table>

</body>

</html>