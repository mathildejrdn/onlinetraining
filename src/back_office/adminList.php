<?php
session_start();

include('navback.php');

require_once("../connect.php");

$sql= "SELECT * FROM administrateurs";
$query=$db->prepare($sql);
$query->execute();

// Récupérer les résultats
$admins= $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Online Training</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/font.css">
</head>

<body class="flex min-h-screen bg-gray-100">
    <!-- Navbar (sidebar) -->

    <!-- Conteneur pour le contenu de la page -->
    <div class="flex-1 p-6">
        <div id="liste_produit" class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="text-center font-bold">Liste des Administrateurs</h1>
            <a class="hover:text-white" href="userlist.php">Voir le tableau des utilisateurs</a>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th scope="col" class="px-2 py-3">Prénom</th>
                        <th scope="col" class="px-2 py-3">Nom</th>
                        <th scope="col" class="px-2 py-3">Email</th>
                        <th scope="col" class="px-2 py-3">Date de naissance</th>
                        <th scope="col" class="px-2 py-3">N° de téléphone</th>
                        <th scope="col" class="px-2 py-3">Genre</th>
                        <th scope="col" class="px-2 py-3">Rôles</th>
                        <th scope="col" class="px-2 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td><?=$admin["first_name"]?></td>
                        <td><?=$admin["last_name"]?></td>
                        <td><?=$admin["email"]?></td>
                        <td><?=$admin["birth_date"]?></td>
                        <td><?=$admin["phone_number"]?></td>
                        <td><?=$admin["genre"]?></td>
                        <td><?=$admin["role"]?></td>
                        <td>
                            <a href="#" onclick="confirmAdminTransfer(<?= $admin['id'] ?>)" 
                                class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded hover:bg-blue-600">
                                Basculer en utilisateur
                            </a>
                            <a href="deleteAdmin.php?id=<?= $admin['id']?>" 
                                class="inline-block px-4 py-2 bg-red-500 text-white font-semibold text-sm rounded hover:bg-red-600">
                                SUPPRIMER
                            </a>
                            <a href="edit_user.php?id=<?= $admin['id']?>" 
                                class="inline-block px-4 py-2 bg-green-500 text-white font-semibold text-sm rounded hover:bg-green-600">
                                Ajouter un rôle
                            </a>
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
            "Êtes-vous sûr de vouloir transférer cet administrateur en tant qu'utilisateur? Son passage dans la table des administrateurs entraînera la suppression du compte utilisateur."
        );
        if (confirmation) {
            window.location.href = "adminToUser.php?id=" + id;
        } else {
            window.location.href = "adminList.php";
        }
    }
    </script>
</body>

</html>