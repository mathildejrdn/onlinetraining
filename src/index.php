<?php 
include('./includes/navbar2.php');


// Inclusion du header et du navbar

include 'includes/header.php';
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="../styles/styles.css">
  <link rel="stylesheet" href="../styles/output.css">
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
		    <p>Chic quotidien</p>
		    <a href="/client_side/products_grid.php?genre=femme"><button class="btn_effect">Découvrez</button></a>
	  </figcaption>
  </figure>
    
    <figure class="effect">
			<img src="./images/homme.jpg"  alt="">
			<figcaption>
			  <div class="RTP"> <span>MODE HOMME</span> </div>
			  <p>Style et confort</p>
			  <a href="/client_side/products_grid.php?genre=homme"><button class="btn_effect">Découvrez</button></a>
			</figcaption>
		</figure>
</div>

<?php include 'includes/guaranties.php'; ?> 

<!-- Inclusion du formulaire de contact -->
<?php include 'client_side/contact.php'; ?>

<!-- Inclusion du footer -->
<?php include './includes/footer.php'; ?>
</body>
</html>

  


