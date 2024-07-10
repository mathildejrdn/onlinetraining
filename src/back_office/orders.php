<?php
session_start();

include('navback.php');

  require_once("../connect.php");

  $sql= "SELECT * FROM orders";

  $query = $db->prepare($sql);
  $query->execute();
  $orders= $query->fetchAll(PDO::FETCH_ASSOC);
 include('navback.php'); 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Online Training</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">
</head>

<body class="flex min-h-screen bg-gray-100">
    <!-- Navbar (sidebar) -->


    <!-- Conteneur pour le contenu de la page -->
    <div class="flex-1 p-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <form class="max-w-md mx-auto mb-5">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500"
                        placeholder="Recherchez ici..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">Rechercher</button>
                </div>
            </form>
            <form action="deleteOrders.php" method="post">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Numéro de commande</th>
                            <th scope="col" class="px-6 py-3">Statut de la commande</th>
                            <th scope="col" class="px-6 py-3">Apprenant(e)</th>
                            <th scope="col" class="px-6 py-3">Gestion</th>
                            <th scope="col" class="px-6 py-3">Archiver</th>
                            <th scope="col" class="px-6 py-3">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
               $displayedOrderIds = []; // Tableau pour garder la trace des order_id affichés
               foreach($orders as $order) {
                 $orderId = $order["order_id"];
                 $displayOrderId = 'CMD0' . $orderId;
           
                 if (!in_array($orderId, $displayedOrderIds)) {
                   // La condition if (!in_array($orderId, $displayedOrderIds)) vérifie si l'order_id de la commande actuelle n'est pas déjà présent dans le tableau $displayedOrderIds.
                  //  in_array est une fonction PHP qui vérifie si une valeur existe dans un tableau.
                  // L'order_id est alors ajouté au tableau $displayedOrderIds avec l'instruction $displayedOrderIds[] = $orderId;.
                   $displayedOrderIds[] = $orderId;
                   ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4"><?=$displayOrderId?></td>
                            <td class="px-6 py-4"><?=$order["statut"]?></td>
                            <td class="px-6 py-4"><?=$order["nom_admin"]?></td>
                            <td class="px-6 py-4">
                                <a href="edit_order.php?id=<?=$order["order_id"]?>"
                                    class="font-medium text-blue-600 hover:underline flex items-center space-x-1">
                                    <svg class="w-6 h-6 text-blue-600 hover:text-blue-800"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                    </svg>
                                    <span>Gestion</span>
                                </a>
                            </td>

                            <?php
              if($order["statut"] === "terminée"){
              ?>
                            <td class="px-6 py-4">
                                <a href="transferOrder.php?id=<?=$order["order_id"]?>"
                                    class="font-medium text-green-600 hover:underline flex items-center space-x-1">
                                    <svg class="w-6 h-6 text-green-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z" />
                                    </svg>
                                    <span>Archiver</span>
                                </a>
                            </td>
                            <?php
              }else{ ?>
                            <td class="px-6 py-4">
                                <class="font-medium text-green-600 hover:underline flex items-center space-x-1">

                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z" />
                                    </svg>
                                    <span>Terminez la commande pour l'archiver.</span>
                                    </a>
                            </td>
                            <?php
              }
              ?>

                            <td class="px-6 py-4">
                                <a href="deleteOrder.php"
                                    class="font-medium text-red-600 hover:underline flex items-center space-x-1">
                                    <svg class="w-6 h-6 text-red-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                    <span>Supprimer</span>
                                </a>
                            </td>
                        </tr>
                        <?php
            }}
            ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>

</html>