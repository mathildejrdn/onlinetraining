<?php

if(!isset($_GET["id"]) || empty($_GET["id"])){
    
    header("Location: index.php");
}
$id= strip_tags($_GET["id"]);
require_once("connect.php");
$sql = "SELECT * FROM products WHERE id = :id";

$query=$db->prepare($sql);
$query->bindValue("id", $id, PDO::PARAM_INT);
$query->execute();
$product=$query->fetch();
if(!$product){
    // dans ce cas la erreur 404
    http_response_code(404);
    echo "Article inexistant";
    exit;
}

include_once("./includes/navbar.php");
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="./styles/output.css">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="font.css">
  <script src="script.js"></script>
</head>
<section>
    <a href="index.php">Accueil </a>
    <article> 
        <div class="img-container">
            <?php
            $imagePath=$product["image"];
            $class = 'back_office/' . $imagePath; 
            ?>
            <img id="img-article" src="<?=$class?>" alt="photo <?=strip_tags($product["nom"])?>">
        </div>
        <div class="info-container">
            <div class="contenu-info">
                <h1><?=strip_tags($product["nom"])?></h1> 
                <p><?=strip_tags($product["prix"])?>€</p>
                <div class="options">
                <form method="POST" action="client_side/panierG.php">
                        <input type="hidden" name="product_id" value="<?= $product['id']?>">
                        <input type="hidden" name="product_img" value="<?= $product['image']?>">
                        <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['nom']) ?>">
                        <input type="hidden" name="product_price" value="<?= htmlspecialchars($product['prix']) ?>">
                        <button type="submit" name="add_to_cart">Ajouter au panier</button>
                </form>
                </div>
                <p class="stock">Il nous en reste <?=strip_tags($product["stock"])?>  en magasin.</p>
                
            </div>
        </div>
    </article>    
    <div class="container-description">
        <p>Description du produit:</p>
        <?=strip_tags($product["description"])?>
    </div>