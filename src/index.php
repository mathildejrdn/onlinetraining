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
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="./styles/output.css">
  <link rel="stylesheet" href="./styles/reset.css">
  <link rel="stylesheet" href="./styles/font.css">
</head>
<body>

<!-- Affichage des images pour hommes et femmes -->
<div class="container">

  <figure class="effect">
	  <img src="./images/femme.jpg" height="750px" width="500px" alt="">
	  <figcaption>
		  <div class="RTP"> <span>MODE FEMME</span> </div>
		    <p>ELEGANCE</p>
		    <a href="/client_side/products_grid.php?genre=femme"><button class="btn_effect">Découvrez</button></a>
	  </figcaption>
  </figure>
    
    <figure class="effect">
			<img src="./images/homme.jpg"  alt="">
			<figcaption>
			  <div class="RTP"> <span>MODE FEMME</span> </div>
			  <p>ELEGANCE</p>
			  <a href="/client_side/products_grid.php?genre=homme"><button class="btn_effect">Découvrez</button></a>
			</figcaption>
		</figure>
</div>

<?php include 'includes/guaranties.php'; ?> 

<!-- Inclusion du formulaire de contact -->
<?php include 'client_side/contact.php'; ?>

<!-- Inclusion du formulaire de contact -->
<?php include 'includes/footer.php'; ?>

<!-- Liens supplémentaires commentés -->

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


</body>
</html>

  


