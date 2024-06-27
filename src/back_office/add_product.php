
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="bg-gray-100"><div class="flex items-center justify-center min-h-screen">
    <form class="max-w-md bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Ajouter un produit</h1>
        
        <!-- Référence produit -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="product_reference" id="product_reference" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="product_reference" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Référence produit</label>
        </div>
        
        <!-- Marque -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="brand" id="brand" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="brand" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Marque</label>
        </div>
        
        <!-- Type de produits -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="product_type" id="product_type" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="product_type" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type de produits</label>
        </div>
        
        <!-- Couleur -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="color" id="color" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="color" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Couleur</label>
        </div>
        
        <!-- Matière -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="material" id="material" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="material" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Matière</label>
        </div>
        
        <!-- Motif -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="pattern" id="pattern" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="pattern" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Motif</label>
        </div>
        
        <!-- Taille -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="size" id="size" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="size" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Taille</label>
        </div>
        
        <!-- Sexe -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="gender" id="gender" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="gender" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sexe</label>
        </div>
        
        <!-- Quantité en stock -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="stock_quantity" id="stock_quantity" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="stock_quantity" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quantité en stock</label>
        </div>
        
        <!-- Prix HT -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" step="0.01" name="price_ht" id="price_ht" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="price_ht" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prix HT</label>
        </div>
        
        <!-- Image -->
        <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="image" id="image" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="image" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Image</label>
        </div>
        
        <!-- Bouton Envoyer -->
 


        <div id="bouton">
        <div id="previsualiser" class="mt-4 text-center">
    <a href="signup.php" class="text-red-700 hover:underline inline-flex items-center space-x-2">
       <span>Prévisualisez l'article</span>
    </a>

            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 flex items-center justify-center space-x-2">
                <span>Ajouter le produit</span>
            </button>  
           
        </div>
    </form>
</div>
</body>
</html>
