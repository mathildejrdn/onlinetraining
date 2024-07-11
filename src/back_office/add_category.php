<?php
session_start();
if(!empty($_POST)){
    if(isset($_POST["categorie"]) && !empty($_POST["categorie"]) && isset($_POST["categorie_genre"]) && !empty($_POST["categorie_genre"])){

        require_once("../connect.php");

        $sql= "INSERT INTO categories (nom_categorie, categorie_genre) VALUES (:nom_categorie, :categorie_genre)";
        
        $query=$db->prepare($sql);
        $query->bindValue(":nom_categorie", $_POST["categorie"], PDO::PARAM_STR);
        $query->bindValue(":categorie_genre", $_POST["categorie_genre"], PDO::PARAM_STR);
        $query->execute();

        header("Location: products.php");
        exit();

    } else {
        die("Le formulaire est incomplet");
    }
}

// Accés que pour les admins

function isAdmin() {
    if (isset($_SESSION['admin'])) {
        return true;
    }
    return false;
}

if (!isAdmin()) {
    header("Location: ../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Ajouter une catégorie</h1>

        <form action="" method="post" class="space-y-4">
            <div>
                <label for="categorie" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
                <input type="text" name="categorie" id="categorie"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-red-600 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                    required>
            </div>

            <div>
                <label for="categorie_genre" class="block text-sm font-medium text-gray-700">Genre de la
                    catégorie</label>
                <select name="categorie_genre" id="categorie_genre"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-red-600 focus:ring focus:ring-red-200 focus:ring-opacity-50"
                    required>
                    <option value="" disabled selected>Choisir le genre</option>
                    <option value="homme">homme</option>
                    <option value="femme">femme</option>
                </select>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Ajouter</button>
            </div>
        </form>
    </div>
</body>

</html>