<?php
include('navbar.php');

// $connectionFilePath ='../connect.php';
// if (file_exists($connectionFilePath)) {
//     include($connectionFilePath);
// } else {
//     die('Fichier de connexion à la BDD non trouvé');
// }

if (isset($db)) {
    try {
        $query = "SELECT * FROM products";
        $params = array();
        $conditions = array();

         // Vérifier si le genre est spécifié
         if (isset($_GET['genre']) && isset($_GET['categorie'])) {
            $genre = $_GET['genre'];
            $categorie = $_GET['categorie'];
            $conditions[] = "genre = :genre";
            $conditions[] .= "categorie = :categorie";
            $params[':genre'] = $genre;
            $params[':categorie'] = $categorie;
        }

        // Vérifier si le genre est spécifié
        elseif (isset($_GET['genre'])) {
            $genre = $_GET['genre'];
            $conditions[] = "genre = :genre";
            $params[':genre'] = $genre;
        }

        // Vérifier si la catégorie est spécifiée
        elseif (isset($_GET['categorie'])) {
            
            $categorie = $_GET['categorie'];
            $conditions[] = "categorie = :categorie";
            $params[':categorie'] = $categorie;
        }

        // Ajouter les conditions à la requête
        if (count($conditions) > 0) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }

        $prdct = $db->prepare($query);
        $prdct->execute($params);
        $products = $prdct->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
} else {
    die('Pas de connexion à la BDD.');
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
                // Vérifier si le genre est spécifié pour filtrer les catégories en fonction
                $query_categories = "SELECT DISTINCT nom_categorie FROM categories";
                $cat_params = array();
                if (isset($genre)) {
                    $query_categories .= " WHERE categorie_genre = :genre";
                    $cat_params[':genre'] = $genre;
                }

                $cat_stmt = $db->prepare($query_categories);
                $cat_stmt->execute($cat_params);
                $categories = $cat_stmt->fetchAll(PDO::FETCH_COLUMN);
                // echo '<pre>';
                // print_r($_GET['genre']);
                // print_r($categories);
                // echo '</pre>';
                // Afficher les boutons de filtre par catégorie
                foreach ($categories as $category) {
                    echo '<a href="products_grid.php?categorie=' . urlencode($category) . (isset($genre) ? '&genre=' . urlencode($genre) : '') . '" class="bg-red-500 text-white py-2 px-4 rounded-lg">' . $category . '</a>';
                }
                ?>
            </div>

            <div class="mt-10 grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-x-8 gap-y-8 items-center">
                <?php
                if (empty($products)) {
                    echo '<p class="text-center text-gray-600">Aucun produit trouvé.</p>';
                } else {
                    foreach ($products as $row) {
                        echo '
                        <a href="article.php?id=' . $row['id'] . '" class="relative bg-gray-100 sm:p-4 py-4 px-4 flex flex-col items-center shadow-md rounded-lg max-w-sm mx-auto hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            <img src="../back_office/' . $row['image'] . '" alt="' . $row['nom'] . '" class="w-full h-auto mt-2 object-cover" style="width: 300px; height: 300px;">
                            <div class="mt-2 text-center w-full">
                                <p class="text-xl leading-5 text-gray-600">' . $row['nom'] . '</p>
                                <p class="text-xl font-semibold leading-5 text-gray-800">' . $row['prix'] . ' €</p>
                            </div>
                           
                        </a>
                        ';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

