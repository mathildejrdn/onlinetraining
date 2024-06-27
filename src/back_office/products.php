
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<form class="max-w-md mx-auto mb-5">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500" placeholder="Recherchez ici..." required />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">Rechercher</button>
    </div>
</form>

    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">Référence produit</th>
                <th scope="col" class="px-6 py-3">Image</th>
                <th scope="col" class="px-6 py-3">Marque</th>
                <th scope="col" class="px-6 py-3">Type de produit</th>
                <th scope="col" class="px-6 py-3">Couleur</th>
                <th scope="col" class="px-6 py-3">Matière</th>
                <th scope="col" class="px-6 py-3">Motif</th>
                <th scope="col" class="px-6 py-3">Taille</th>
                <th scope="col" class="px-6 py-3">Genre</th>
                <th scope="col" class="px-6 py-3">Quantité en stock</th>
                <th scope="col" class="px-6 py-3">Prix hors taxe</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        <input type="hidden" value="1" class="product-id">
                    </div>
                </td>
                <td class="px-6 py-4">Apple MacBook Pro 17"</td>
                <td class="px-6 py-4">
                    <img src="path_to_image" alt="Product Image" class="w-8 h-8">
                </td>
                <td class="px-6 py-4">Apple</td>
                <td class="px-6 py-4">Laptop</td>
                <td class="px-6 py-4">Silver</td>
                <td class="px-6 py-4">Aluminium</td>
                <td class="px-6 py-4">Uni</td>
                <td class="px-6 py-4">17"</td>
                <td class="px-6 py-4">Unisexe</td>
                <td class="px-6 py-4">5</td>
                <td class="px-6 py-4">$2999</td>
                <td class="flex items-center px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 hover:underline flex items-center space-x-1">
                        <svg class="w-6 h-6 text-blue-600 hover:text-blue-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
                        </svg>
                        <span>Editer</span>
                    </a>
                    <a href="#" class="font-medium text-red-600 hover:underline flex items-center space-x-1 ms-4">
                        <svg class="w-6 h-6 text-red-600 hover:text-red-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                        <span>Supprimer</span>
                    </a>
                </td>
            </tr>
            <!-- Répétez ce bloc <tr> pour chaque ligne de votre tableau -->
        </tbody>
        <tfoot class="bg-gray-50">
            <tr>
                <td colspan="13" class="px-6 py-3 text-right">
                    <button type="button" class="text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                        Supprimer les produits sélectionnés
                    </button>
                    <button type="button" class="text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                        Ajouter un produit
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
