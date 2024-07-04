<?php
ob_start();
include('../includes/navbar.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Online Training</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/output.css">
    <link rel="stylesheet" href="./styles/reset.css">
    <link rel="stylesheet" href="./styles/font.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <div class="mx-auto container px-6 xl:px-0 py-12">
        <div class="flex flex-col">
            <!-- filtrer par catégorie -->
            <div class="flex justify-center mb-8 space-x-4">
                <button id="polos" class="bg-red-500 text-white py-2 px-4 rounded-lg">Polos</button>
                <button id="pantalons" class="bg-red-500 text-white py-2 px-4 rounded-lg">Pantalons</button>
                <button id="jeans" class="bg-red-500 text-white py-2 px-4 rounded-lg">Jeans</button>
                <button id="chemises" class="bg-red-500 text-white py-2 px-4 rounded-lg">Chemises</button>
            </div>

            <div class="mt-10 grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-x-8 gap-y-8 items-center">
                <a href="article.php" class="relative bg-gray-100 sm:p-4 py-4 px-4 flex flex-col items-center shadow-md rounded-lg max-w-sm mx-auto hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                    <img src="../images/polo.jpg" alt="polo" class="w-full h-auto mt-2">
                    <div class="mt-2 text-center flex justify-between items-center w-full">
                        <div>
                            <p class="text-xl leading-5 text-gray-600">Nom de l'article</p>
                            <p class="text-xl font-semibold leading-5 text-gray-800">prix €</p>
                        </div>
                        <svg class="w-6 h-6 text-gray-800 ml-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>

</html>
<?php
ob_end_flush();
?>
