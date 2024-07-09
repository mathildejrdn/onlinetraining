<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<nav class="bg-white border-gray-200 w-full">
    <div class="max-w-screen-xl mx-auto p-4 flex items-center justify-between">
        <a href="../index.php" class="flex items-left">
            <img src="../images/logo.png" class="h-8" alt="Online training Logo" />
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="../index.php"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0">Accueil</a>
                </li>
                <li class="relative">
                    <button id="dropdownWomen" data-dropdown-toggle="womenDropdown"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 md:w-auto">
                        Mode Femme<svg class="w-2.5 h-2.5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu - Femmes -->
                    <div id="womenDropdown"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow absolute left-0 mt-2 w-44">
                        <ul class="py-2 text-sm text-gray-700">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Vêtements</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Chaussures</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Accessoires</a></li>
                        </ul>
                    </div>
                </li>
                <li class="relative">
                    <button id="dropdownMen" data-dropdown-toggle="menDropdown"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 md:w-auto">
                        Mode Homme<svg class="w-2.5 h-2.5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu - Hommes -->
                    <div id="menDropdown"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow absolute left-0 mt-2 w-44">
                        <ul class="py-2 text-sm text-gray-700">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Vêtements</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Chaussures</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Accessoires</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0">Beauté</a>
                </li>
        <?php if(isset($_SESSION["admin"]) || isset($_SESSION["user"])): ?>
                <li>
                <a href="../client_side/logout.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0">Déconnexion</a>
                </li>
                <?php else : ?>
                <li>
                <a href="../client_side/login.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0">Connexion</a>
                </li>
                <?php endif; ?>
        <?php if(isset($_SESSION["user"])): ?>
        <li>
          <a href="../client_side/panierG.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0">Panier</a>
        </li>
        <?php elseif(isset($_SESSION["admin"])): ?>
        <li>
        <a href="../back_office/inbox.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0">Administration</a>
        </li>
        <?php endif; ?>
            </ul>
    </div>
</nav>

<script>
// JavaScript pour gérer l'ouverture/fermeture des dropdowns et du menu
document.addEventListener('DOMContentLoaded', function() {
    function handleDropdownToggle(event) {
        const target = event.currentTarget;
        const dropdownId = target.getAttribute('data-dropdown-toggle');
        const dropdown = document.getElementById(dropdownId);

        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            dropdown.classList.add('block');
            target.setAttribute('aria-expanded', 'true');
        } else {
            dropdown.classList.remove('block');
            dropdown.classList.add('hidden');
            target.setAttribute('aria-expanded', 'false');
        }
    }

    const dropdownToggles = document.querySelectorAll('[data-dropdown-toggle]');
    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', handleDropdownToggle);
    });

    document.addEventListener('click', function(event) {
        const isClickInsideNavbar = event.target.closest('.max-w-screen-xl') !== null;
        if (!isClickInsideNavbar) {
            dropdownToggles.forEach(function(toggle) {
                const dropdownId = toggle.getAttribute('data-dropdown-toggle');
                const dropdown = document.getElementById(dropdownId);
                dropdown.classList.remove('block');
                dropdown.classList.add('hidden');
                toggle.setAttribute('aria-expanded', 'false');
            });
        }
    });

    const menuToggle = document.querySelector('[data-collapse-toggle="navbar-dropdown"]');
    const navbarDropdown = document.getElementById('navbar-dropdown');

    if (menuToggle && navbarDropdown) {
        menuToggle.addEventListener('click', function() {
            navbarDropdown.classList.toggle('hidden');
            navbarDropdown.classList.toggle('block');
            const isOpen = navbarDropdown.classList.contains('block');
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        document.addEventListener('click', function(event) {
            const isClickInsideNavbar = event.target.closest('.max-w-screen-xl') !== null;
            if (!isClickInsideNavbar && navbarDropdown.classList.contains('block')) {
                navbarDropdown.classList.remove('block');
                navbarDropdown.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }
});
</script>