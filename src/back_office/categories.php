<?php
session_start();

require_once("../connect.php");

$sql = "SELECT * FROM categories ORDER BY categorie_genre";
$query = $db->prepare($sql);
$query->execute();

$categories = $query->fetchAll(PDO::FETCH_ASSOC);
include('navback.php'); 
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

    <div class="flex-1 p-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nom</th>
                        <th scope="col" class="px-6 py-3">Genre</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4"><?=$category["nom_categorie"]?></td>
                        <td class="px-6 py-4"><?=$category["categorie_genre"]?></td>
                        <td class="px-6 py-4">
                            <a href="deleteCategory.php?id=<?=$category["id"]?>" class="text-red-600 font-bold hover:underline flex items-center space-x-1">
                                <svg class="w-5 h-5 text-red-600 hover:text-red-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                                <span>Supprimer</span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center">
                            <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <a href="add_category.php">Ajouter une catégorie</a>
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>
