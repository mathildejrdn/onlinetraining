<?php
session_start();

require_once("../connect.php");

$sql= "SELECT * FROM categories";
$query = $db->prepare($sql);
$query->execute();

$categories =$query->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="../styles/output.css">
  <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="flex min-h-screen bg-gray-100">
  <!-- Navbar (sidebar) -->
  <?php include('navback.php'); ?>
  <button><a href="add_category.php">Ajouter une catégorie</a></button>
  <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
          <tr>
            <th scope="col" class="px-2 py-3">Nom</th>
            <th scope="col" class="px-2 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($categories as $category): ?>
            <tr>
              <td><?=$category["nom_categorie"]?></td>
              <td><a href="deleteCategory.php?id=<?=$category["id"]?>">Supprimer</a></td>
          </tr>
        <?php endforeach;?>
          </tbody>
    </table>
</body>