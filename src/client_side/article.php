<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formation en ligne</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">

    <div class="p-4 lg:max-w-6xl max-w-2xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-lg:gap-16">
            <!-- Colonne 1: Image -->
            <div class="lg:min-h-82 lg:min-w-48">
                <img src="../images/tshirt.jpg" alt="Produit"
                    class="w-full h-full object-cover rounded-md lg:h-82 lg:min-w-72" />
            </div>

            <!-- Colonne 2: Contenu -->
            <div class="lg:sticky top-0 lg:text-left lg:overflow-y-auto">
                <div class="lg:pl-4">
                    <div class="flex flex-wrap items-start gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Nom du produit</h2>
                        </div>
                    </div>

                    <p class="text-sm text-gray-600 mt-4">Rehaussez votre style décontracté avec notre t-shirt
                        premium pour hommes. Conçu pour le confort et avec une coupe moderne, ce t-shirt polyvalent est
                        un ajout essentiel à votre garde-robe. Le tissu doux et respirant assure un confort toute la
                        journée, en le rendant parfait pour un usage quotidien. Son col rond classique et ses manches
                        courtes offrent un look intemporel.</p>

                    <div class="flex items-center gap-4 mt-4">
                        <button type="button"
                            class="px-4 py-2 border border-gray-800 bg-transparent text-gray-800 rounded-md hover:bg-gray-50">Ajouter au panier</button>
                    </div>

                    <hr class="my-8" />

                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Choisir une taille</h3>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <button type="button"
                                class="w-12 h-12 border hover:border-gray-800 font-semibold text-sm rounded-md flex items-center justify-center">SM</button>
                            <button type="button"
                                class="w-12 h-12 border hover:border-gray-800 border-gray-800 font-semibold text-sm rounded-md flex items-center justify-center">MD</button>
                            <button type="button"
                                class="w-12 h-12 border hover:border-gray-800 font-semibold text-sm rounded-md flex items-center justify-center">LG</button>
                            <button type="button"
                                class="w-12 h-12 border hover:border-gray-800 font-semibold text-sm rounded-md flex items-center justify-center">XL</button>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-gray-800">Choisir une couleur</h3>
                        <div class="mt-2">
                            <select
                                class="block w-36 px-4 py-2 border border-gray-300 rounded-md bg-white text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-200 focus:border-transparent">
                                <option value="black">Noir</option>
                                <option value="gray">Gris</option>
                                <option value="orange">Orange</option>
                                <option value="red">Rouge</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

