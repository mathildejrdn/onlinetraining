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
  <script src="script.js"></script>
</head>
<body>
    <div class="bg-gray-100">
  <div id="relative" class="carousel-container ">
    <header>
      <div id="indicators-carousel" class="relative" data-carousel="static">
        <div class="overflow-hidden relative h-screen">
          <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20" data-carousel-item="active">
            <img src="./images/c.jpg" class="bg-center w-full h-screen object-cover" alt="Fast & Easy Booking">
            <div class="absolute bottom-5 lg:left-1/3 left-1/4 text-white font-bold md:text-4xl sm:text-2xl text-center">Fast & Easy Booking</div>
          </div>
          <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10" data-carousel-item="">
            <img src="./images/b.jpg" class="bg-center block absolute w-full h-screen object-cover" alt="Many Pickup Locations">
            <div class="absolute bottom-5 lg:left-1/3 left-1/4 text-white font-bold md:text-4xl sm:text-2xl text-center">Many Pickup Locations</div>
          </div>
          <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform" data-carousel-item="">
            <img src="./images/d.jpg" class="bg-center block absolute w-full h-screen object-cover" alt="Satisfied Customers">
            <div class="absolute bottom-5 lg:left-1/3 left-1/4 text-white font-bold md:text-4xl sm:text-2xl text-center">Satisfied Customers</div>
          </div>
          <div class="hidden duration-700 ease-in-out absolute inset-0 transition-all transform" data-carousel-item="">
            <img src="./images/e.jpg" class="bg-center block absolute w-full h-screen object-cover" alt="Advanced Engine Services">
            <div class="absolute bottom-5 lg:left-1/3 left-1/4 text-white font-bold md:text-4xl sm:text-2xl text-center">Advanced Engine Services</div>
          </div>
          <div class="duration-700 ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="">
            <img src="./images/f.jpg" class="bg-center block absolute w-full h-screen object-cover" alt="Professional Car Wash">
            <div class="absolute bottom-5 lg:left-1/3 left-1/4 text-white font-bold md:text-4xl sm:text-2xl text-center">Professional Car Wash</div>
          </div>
        </div>
        <!-- Slider controls -->
        <div class="flex absolute bottom-5 left-1/2 z-30 -translate-x-1/2 space-x-3">
          <button type="button" class="w-3 h-3 rounded-full bg-white " aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
          <button type="button" class="w-3 h-3 rounded-full bg-white/50  hover:bg-white " aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
          <button type="button" class="w-3 h-3 rounded-full bg-white/50  hover:bg-white " aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
          <button type="button" class="w-3 h-3 rounded-full bg-white/50  hover:bg-white " aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
          <button type="button" class="w-3 h-3 rounded-full bg-white/50  hover:bg-white " aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev="">
          <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="hidden">Previous</span>
          </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next="">
          <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30  group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="hidden">Next</span>
          </span>
        </button>
      </div>
    </header>
  </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />

<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

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
  }
  include 'client_side/contact.php';

  ?> 

  
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
