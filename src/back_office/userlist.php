<?php
// Démarrer la session
session_start();

// Vérifier si la session utilisateur est définie
if (!isset($_SESSION['users_id'])) {
    die('Vous devez être connecté pour accéder à cette page.');
}

// Vérifier si l'utilisateur est un administrateur
if ($_SESSION['formateur'] !== "full") {
    die('Vous n\'avez pas les permissions nécessaires pour accéder à cette page.');
}

// Inclure le fichier de connexion à la base de données
require_once('connect.php');

// Préparer la requête SQL pour sélectionner les utilisateurs et leurs rôles
$sql = "SELECT users.id, users.first_name, users.last_name, users.email, user_roles.role
        FROM users
        LEFT JOIN user_roles ON users.id = user_roles.user_id";

// Exécuter la requête
$query = $db->prepare($sql);
$query->execute();

// Récupérer les résultats
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// Fermer la connexion à la base de données
require_once('close_bdd.php');
?>

<div id="liste_produit" class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
            <tr>
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
                    Droits
                </th>
                <th scope="col" class="px-2 py-3">
                    Actions
                </th>
        
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user){
                if($user['email'] !== "formateur@online.com"){
            
            echo '<tr class="odd:bg-white  even:bg-gray-50 border-b">';
                echo '<th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
                    echo $users['first_name'];
                echo '</th>';
                echo '<td class="px-2 py-4">';
                echo $users['last_name'];
                echo '</td>';
                echo '<th scope="row" class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap ">';
                    echo $users['email'];
                echo '</th>';
                echo '<td class="px-2 py-4">';
                echo $users_roles['role_id'];
                echo '</td>';
               
                echo '<td class="px-2 py-4">';
                if ($users_roles['role_id'] === "self"){
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-orange-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=" class="font-medium ">- Droits</a></button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-green-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=full" class="font-medium ">+ Droits</a></button>';
                
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
                }
                elseif ($users_roles['role_id'] === "full"){
                    echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-orange-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=self" class="font-medium ">- Droits</a></button>';
                    echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
                    }
                    elseif (empty($users_roles['role_id'])){
                        echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-green-600 hover:bg-purple-800 my-2"><a href="pages/change_rights.php?id=' . $user['id'] . '&rights=self" class="font-medium ">+ Droits</a></button>';
                        echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-red-700  hover:bg-red-600 my-2 deleteButton" onclick="displayDeleteButton">Supprimer</button>';
                echo '<button class="text-white font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-neutral-950  hover:bg-neutral-500 my-2 deleteConfirmationButton"><a href="pages/delete_user_back.php?id=' . $user['id'] . '" class="font-medium">Confirmer</a></button>';
                    }
                
                echo '</td>';
                echo '</tr>';}
        }?>
            
        </tbody>
    </table>
</div>

</body>
</html>
