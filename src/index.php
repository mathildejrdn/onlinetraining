<?php 
require_once("connect.php");

$sql = "SELECT * FROM products";
$query = $db->prepare($sql);
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);

// Inclusion du header et du navbar
include('./includes/navbar.php');
include 'includes/header.php';
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="stylesheet" href="./styles/output.css">
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/font.css">
</head>
<body>

<!-- Affichage des images pour hommes et femmes -->
<div class="container">
  <img src="./images/femme.jpg" alt="femme">
  <!-- ajouter l'effet de hover avec mode femme et mode homme -->
  <img src="./images/homme.jpg" alt="homme">
  <img src="./images/beauty.jpg" alt="beaute">
  <!-- les produits de beauté arrivent bientôt comme texte en hover -->
</div>

<?php include 'includes/guaranties.php'; ?>

<!-- Affichage des produits récupérés depuis la base de données -->
<?php foreach($products as $product): ?>
  <section>
    <article><a href="product.php?id=<?= $product["id"] ?>">
      <?php
      $imagePath = $product["image"];
      // Assurez-vous que 'back_office/' est le chemin correct vers vos images
      $class = 'back_office/' . $imagePath;
      ?>
      <img src="<?= $class ?>" alt="">
      <div class="info-article">
        <div class="article-name">
          <span><?= $product["categorie"] ?></span>
        </div>
        <div class="article-price">
          <span><?= $product["prix"] ?>€</span>
        </div>
      </div></a>
    </article>
  </section>
<?php endforeach; ?>

<!-- Inclusion du formulaire de contact -->
<?php include 'client_side/contact.php'; ?>

<!-- Liens supplémentaires commentés -->
<!--
<a href="../back_office/add_category.php">Ajouter une catégorie (super amdin)</a>
<a href="../back_office/userlist.php">Liste des users (super admin)</a>
<a href="../back_office/inbox.php">Messagerie</a>
<a href="../back_office/orders.php">Commades</a>
<a href="../back_office/edit_orders.php">Editer une commade</a>
<a href="../back_office/products.php">Produits</a>
<a href="../back_office/add_product.php">Ajouter un produit</a>
<a href="../back_office/edit_product.php">Editer un produit</a>

<a href="../client_side/contact.php">Formulaire de contact</a>
<a href="../client_side/login.php">Formulaire de connection</a>
<a href="../client_side/signup.php">Formulaire d'inscription</a>
<a href="../client_side/panier.php">panier</a>
-->

</body>
</html>

  


