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
  <?php include('navback.php'); ?>
  
  <!-- Conteneur pour le contenu de la page -->
  <div class="flex-1 p-6">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <form class="max-w-md mx-auto mb-5">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
          </div>
          <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500" placeholder="Recherchez ici..." required />
          <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-red-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">Rechercher</button>
        </div>
      </form>
      <form action="deleteOrders.php" method="post">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Référence de l'article</th>
              <th scope="col" class="px-6 py-3">Raison de la suppression</th>
              <th scope="col" class="px-6 py-3">Apprenant(e)</th>
              <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-b hover:bg-gray-50">
              <td class="px-6 py-4">CMD001</td>
              <td class="px-6 py-4">Produit endommagé</td>
              <td class="px-6 py-4">John Doe</td>
              <td class="flex items-center px-6 py-4 space-x-2">
                <a href="order_details.php?id=1" class="font-medium text-blue-600 hover:underline flex items-center space-x-1">
                  <svg class="w-6 h-6 text-blue-600 hover:text-blue-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                  </svg>
                  <span>Détails</span>
                </a>
                <a href="delete_order.php?id=1" class="font-medium text-red-600 hover:underline flex items-center space-x-1">
                  <svg class="w-6 h-6 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                  </svg>
                  <span>Supprimer</span>
                </a>
              </td>
            </tr>
            <tr class="bg-white border-b hover:bg-gray-50">
              <td class="px-6 py-4">CMD002</td>
              <td class="px-6 py-4">Taille non correspondante</td>
              <td class="px-6 py-4">Jane Smith</td>
              <td class="flex items-center px-6 py-4 space-x-2">
                <a href="order_details.php?id=2" class="font-medium text-blue-600 hover:underline flex items-center space-x-1">
                  <svg class="w-6 h-6 text-blue-600 hover:text-blue-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                  </svg>
                  <span>Détails</span>
                </a>
                <a href="delete_order.php?id=2" class="font-medium text-red-600 hover:underline flex items-center space-x-1">
                  <svg class="w-6 h-6 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                  </svg>
                  <span>Supprimer</span>
                </a>
              </td>
            </tr>
          </tbody>
          <tfoot class="bg-gray-50">
            <tr>
              <td colspan="6" class="px-6 py-3 text-right">
                <a href="add_order.php">
                  <button type="button" class="text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                    Ajouter une commande
                  </button>
                </a>
              </td>
            </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
</body>
</html>
S