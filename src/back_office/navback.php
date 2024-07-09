<?php

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

<nav class="bg-gray-200 max-w-1/4 p-4 flex flex-col">
    <!-- Liens de la navbar -->
    <ul class="flex flex-col gap-2 mt-4">
        <li>
            <a href="inbox.php"
                class="block py-2 px-4 bg-white border-b border-gray-300 hover:bg-gray-100">Messagerie</a>
        </li>
        <li>
            <a href="products.php" class="block py-2 px-4 bg-white border-b border-gray-300 hover:bg-gray-100">Gestion
                commerciale</a>
        </li>
        <li class="relative">
            <a href="javascript:void(0)"
                class="flex items-center justify-between block py-2 px-4 bg-white border-b border-gray-300 hover:bg-gray-100"
                onclick="toggleDropdown('logistique-dropdown', this)">
                <span>Logistique</span>
                <svg class="w-4 h-4 transition-transform duration-200" id="dropdown-arrow"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
            <ul id="logistique-dropdown" class="hidden flex-col bg-white border border-gray-300 w-full z-10 mt-1">
                <li><a href="orders.php" class="block py-2 px-4 hover:bg-gray-100">Bons de commandes</a></li>
                <li><a href="stock_discard.php" class="block py-2 px-4 hover:bg-gray-100">Retours & pertes</a></li>
                <li><a href="orders_finished.php" class="block py-2 px-4 hover:bg-gray-100">Commandes terminées</a></li>
            </ul>
        </li>
        <li>
            <a href="sales.php"
                class="block py-2 px-4 bg-white border-b border-gray-300 hover:bg-gray-100">Comptabilité</a>
        </li>
        <li>
            <a href="userlist.php" class="block py-2 px-4 bg-white border-b border-gray-300 hover:bg-gray-100">Gestion
                des utilisateurs</a>
        </li>
        <li>
            <a href="adminList.php" class="block py-2 px-4 bg-white border-b border-gray-300 hover:bg-gray-100">Gestion
                des apprenant(e)s</a>
        </li>
    </ul>

    <!-- Bouton de déconnexion -->
    <div class="flex justify-center">
        <button type="submit"
            class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 w-full max-w-xs mx-auto mt-4"><a
                href="../client_side/logout.php">
                Déconnexion
            </a></button>
    </div>
</nav>

<script>
function toggleDropdown(id, element) {
    const dropdown = document.getElementById(id);
    const arrow = element.querySelector('svg');
    dropdown.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
}
</script>