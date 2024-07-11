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
            <h1>Liste des utilisateurs</h1>
            <a href="adminList.php">Voir le tableau des administrateurs</a>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-2 py-3">Prénom</th>
                        <th scope="col" class="px-2 py-3">Nom</th>
                        <th scope="col" class="px-2 py-3">Email</th>
                        <th scope="col" class="px-2 py-3">Date de naissance</th>
                        <th scope="col" class="px-2 py-3">Adresse</th>
                        <th scope="col" class="px-2 py-3">N° de téléphone</th>
                        <th scope="col" class="px-2 py-3">Genre</th>
                        <th scope="col" class="px-2 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?=$user["first_name"]?></td>
                        <td><?=$user["last_name"]?></td>
                        <td><?=$user["email"]?></td>
                        <td><?=$user["birth_date"]?></td>
                        <td><?=$user["adress"]?></td>
                        <td><?=$user["phone_number"]?></td>
                        <td><?=$user["genre"]?></td>
                        <td>
                            <a href="#" onclick="confirmAdminTransfer(<?= $user['id'] ?>)">Basculer en ADMIN</a>
                            <a href="deleteUser.php?id=<?= $user['id']?>">SUPPRIMER</a>
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