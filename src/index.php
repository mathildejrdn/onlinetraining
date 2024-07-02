<?php 

require_once("connect.php");

$sql = "SELECT * FROM products";

$query=$db->prepare($sql);
$query->execute();

$products= $query->fetchAll(PDO::FETCH_ASSOC);
include('./includes/navbar.php'); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="./styles/output.css">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="font.css">
</head>
<body>
<?php 
    include 'includes/header.php';
  ?> 
  <?php 
    include 'client_side/contact.php';
  ?> 

  <br>
<a href="../back_office/add_category.php">Ajouter une catégorie (super amdin)</a>
  <a href="../back_office/userlist.php">Liste des users (super admin)</a> <br>
  <a href="../back_office/inbox.php">Messagerie</a>
  <a href="../back_office/orders.php">Commades</a>
  <a href="../back_office/edit_orders.php">Editer une commade</a>
  <a href="../back_office/products.php">Produits</a>
  <a href="../back_office/add_product.php">Ajouter un produit</a>
  <a href="../back_office/add_category.php">Editer un produit</a>
  <br>
  <a href="../client_side/contact.php">Formulaire de contact</a>
  <a href="../client_side/login.php">Formulaire de connection</a>
  <a href="../client_side/signup.php">Formulaire d'inscription</a>
  <a href="../client_side/panier.php">panier</a>

  <?php
  foreach($products as $product){?>
  <section>
    <article><a href="product.php?id=<?=$product["id"]?>">
    <?php
            $imagePath=$product["image"];
            $class = 'back_office/' . $imagePath; 
            ?>
      <img src="<?=$class?>" alt="">
      <div class="info-article">
        <div class="article-name">
          <span><?=$product["type_de_produits"]?></span>
        </div>
        <div class="article-price">
        <span><?=$product["prix"]?>€</span>
        </div>
      </div></a>
      
    </article>
  </section>
  <?php
  }?>



  
<!-- <a href="../back_office/add_category.php">Ajouter une catégorie (super amdin)</a>
  <a href="../back_office/userlist.php">Liste des users (super admin)</a> <br>
  <a href="../back_office/inbox.php">Messagerie</a>
  <a href="../back_office/orders.php">Commades</a>
  <a href="../back_office/edit_orders.php">Editer une commade</a>
  <a href="../back_office/products.php">Produits</a>
  <a href="../back_office/add_product.php">Ajouter un produit</a>
  <a href="../back_office/add_category.php">Editer un produit</a>
  <br>
  <a href="../client_side/contact.php">Formulaire de contact</a>
  <a href="../client_side/login.php">Formulaire de connection</a>
  <a href="../client_side/signup.php">Formulaire d'inscription</a>
  <a href="../client_side/panier.php">panier</a>

  

</body>
</html>
