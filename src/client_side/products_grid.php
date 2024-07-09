<?php
include('../includes/navbar.php');

$connectionFilePath = '../connect.php';
if (file_exists($connectionFilePath)) {
    include($connectionFilePath);
} else {
    die('Database connection file not found.');
}

if (isset($db)) {
    try {
        $query = "SELECT * FROM products ";
        $params = array();

        // Vérifier si le genre est spécifié
        if (isset($_GET['genre'])) {
            $genre = $_GET['genre'];
            $query .= " WHERE genre = :genre";
            $params[':genre'] = $genre;
        }

        // Vérification si la catégorie est spécifiée
        if (isset($_GET['categorie'])) {
            $categorie = $_GET['categorie'];
            // Si le genre n'est pas spécifié ou est différent de 'femme', filtrer par catégorie normalement
            if (!isset($genre) || $genre !== 'femme') {
                $query .= " WHERE categorie = :categorie";
            } else {
                // Si le genre est 'femme', filtrer sur les catégories 'robe' et 'jupe'
                $query .= " WHERE (categorie = 'robe' OR categorie = 'jupe')";
            }
            $params[':categorie'] = $categorie;
        }

        $prdct = $db->prepare($query);
        $prdct->execute($params); 
        $products = $prdct->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
} else {
    die('Database connection not established.');
}
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
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

    <div class="mx-auto container px-6 xl:px-0 py-12">
        <div class="flex flex-col">
            <!-- Filtrer par catégorie -->
            <div class="flex justify-center mb-8 space-x-4">
                <?php
                // Query pour récupérer les catégories distinctes
                $query_categories = "SELECT DISTINCT nom_categorie FROM categories";
                $type_categories = $db->query($query_categories);
                $categories = $type_categories->fetchAll(PDO::FETCH_COLUMN);
                
                // Afficher les boutons de filtre par catégorie
                foreach ($categories as $category) {
                    echo '<a href="products_grid.php?categorie=' . urlencode($category) . '" class="bg-red-500 text-white py-2 px-4 rounded-lg">' . $category . '</a>';
                }
                ?>
            </div>

            <div class="mt-10 grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-x-8 gap-y-8 items-center">
                <?php
                foreach ($products as $row) {
                    echo '
                    <a href="article.php?id=' . $row['id'] . '" class="relative bg-gray-100 sm:p-4 py-4 px-4 flex flex-col items-center shadow-md rounded-lg max-w-sm mx-auto hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                        <img src="../back_office/' . $row['image'] . '" alt="' . $row['nom'] . '" class="w-full h-auto mt-2 object-cover" style="width: 300px; height: 300px;">
                        <div class="mt-2 text-center w-full">
                            <p class="text-xl leading-5 text-gray-600">' . $row['nom'] . '</p>
                            <p class="text-xl font-semibold leading-5 text-gray-800">' . $row['prix'] . ' €</p>
                        </div>
                        <svg class="w-6 h-6 text-gray-800 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                        </svg>
                    </a>
                    ';
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>

