<?php
session_start();

// Accés que pour les admins
require_once("../connect.php");
$sql = "SELECT * FROM `users`";

// Exécuter la requête
$query = $db->prepare($sql);
$query->execute();

// Récupérer les résultats
$users = $query->fetchAll(PDO::FETCH_ASSOC);
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
    <!-- Conteneur pour le contenu de la page -->
    <div class="flex-1 p-6">
        <div id="liste_produit" class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="text-center font-bold text-2xl mb-4">Liste des utilisateurs</h1>
            <a class="hover:text-white text-red-600 font-semibold mb-4 inline-block" href="adminList.php">Voir le tableau des administrateurs</a>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">Prénom</th>
                        <th scope="col" class="px-6 py-3">Nom</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Date de naissance</th>
                        <th scope="col" class="px-6 py-3">Adresse</th>
                        <th scope="col" class="px-6 py-3">N° de téléphone</th>
                        <th scope="col" class="px-6 py-3">Genre</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4"><?=$user["first_name"]?></td>
                        <td class="px-6 py-4"><?=$user["last_name"]?></td>
                        <td class="px-6 py-4"><?=$user["email"]?></td>
                        <td class="px-6 py-4"><?=$user["birth_date"]?></td>
                        <td class="px-6 py-4"><?=$user["adress"]?></td>
                        <td class="px-6 py-4"><?=$user["phone_number"]?></td>
                        <td class="px-6 py-4"><?=$user["genre"]?></td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="#" onclick="confirmAdminTransfer(<?= $user['id'] ?>)" class="text-blue-600 font-bold hover:underline">Basculer en ADMIN</a>
                            <a href="deleteUser.php?id=<?= $user['id']?>" class="text-red-600 font-bold hover:underline">SUPPRIMER</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function confirmAdminTransfer(id) {
        let confirmation = confirm(
            "Êtes-vous sûr de vouloir transférer cet utilisateur en tant qu'admin? Son passage dans la table des administrateurs entraînera la suppression du compte utilisateur."
        );
        if (confirmation) {
            window.location.href = "userToAdmin.php?id=" + id;
        } else {
            window.location.href = "userlist.php";
        }
    }
    </script>
</body>

</html>
