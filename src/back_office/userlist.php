<?php
session_start();

require_once("../connect.php");
$sql = "SELECT * FROM `users`";

// Exécuter la requête
$query = $db->prepare($sql);
$query->execute();

// Récupérer les résultats
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// Fermer la connexion à la base de données
//require_once('close_bdd.php');
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
<body>

<div id="liste_produit" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <h1>Liste des utilisateurs</h1>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
            <tr>
                <th scope="col" class="px-2 py-3">
                    id
                </th>
                <th scope="col" class="px-2 py-3">
                    Prénom
                </th>
                <th scope="col" class="px-2 py-3">
                    Nom
                </th>
                <th scope="col" class="px-2 py-3">
                    Email
                </th>
                <th scope="col" class="px-2 py-3">
                    Date de naissance
                </th>
                <th scope="col" class="px-2 py-3">
                    Adresse
                </th>
                <th scope="col" class="px-2 py-3">
                    N° de téléphone
                </th>
                <th scope="col" class="px-2 py-3">
                    Genre
                </th>
                <th scope="col" class="px-2 py-3">
                    Action
                </th>
        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user){
            ?>
            <tr>
                <td><?=$user["id"]?></td>
                <td><?=$user["first_name"]?></td>
                <td><?=$user["last_name"]?></td>
                <td><?=$user["email"]?></td>
                <td><?=$user["birth_date"]?></td>
                <td><?=$user["adress"]?></td>
                <td><?=$user["phone_number"]?></td>
                <td><?=$user["genre"]?></td>
                <td>
                    <a href="userToAdmin.php?id=<?= $user['id']?>" >Basculer en ADMIN</a>
                    <a href="deleteUser.php?id=<?= $user['id']?>">SUPPRIMER</a>
                </td>
            </tr>
            <?php
        }
        ?>    
        </tbody>
    </table>
</div>
       
</body>
</html>
<!--             
        //     echo '<tr class="odd:bg-white  even:bg-gray-50 border-b">';
        //         echo '<th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
        //             echo $user['first_name'];
        //         echo '</th>';
        //         echo '<td class="px-2 py-4">';
        //         echo $users['last_name'];
        //         echo '</td>';
        //         echo '<th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
        //             echo $users['email'];
        //         echo '</th>';
        //         echo '<td class="px-2 py-4">';
        //         echo $users_roles['role_id'];
        //         echo '</td>';
               
        //         echo '<td class="px-2 py-4">';
        //         if ($users_roles['role_id'] === "self"){
        //         echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-orange-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=" class="font-medium ">- Droits</a></button>';
        //         echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-green-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=full" class="font-medium ">+ Droits</a></button>';
                
        //         echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
        //         echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
        //         }
        //         elseif ($users_roles['role_id'] === "full"){
        //             echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-orange-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=self" class="font-medium ">- Droits</a></button>';
        //             echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
        //         echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
        //             }
        //             elseif (empty($users_roles['role_id'])){
        //                 echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-green-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=self" class="font-medium ">+ Droits</a></button>';
        //                 echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
        //         echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
        //             }
                
        //         echo '</td>';
        //         echo '</tr>';}
        // } -->
    
