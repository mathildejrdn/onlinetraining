
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

<?php
if(!empty($_POST))
{
    if(isset($_POST["ref"], $_POST["marque"], $_POST["type"], $_POST["couleur"], $_POST["matiere"], $_POST["motif"], $_POST["taille"], $_POST["genre"], $_POST["stock"], $_POST["prix"]) && !empty($_POST["ref"]) && !empty($_POST["marque"]) && !empty($_POST["type"]) && !empty($_POST["couleur"]) && !empty($_POST["matiere"]) && !empty($_POST["motif"]) && !empty($_POST["taille"]) && !empty($_POST["genre"])&& !empty($_POST["stock"]) && !empty($_POST["prix"]))

    $ref= strip_tags($_POST["ref"]);
    $marque= strip_tags($_POST["marque"]);
    $type= strip_tags($_POST["stock"]);
    $couleur= strip_tags($_POST["couleur"]);
    $matiere= strip_tags($_POST["matiere"]);
    $motif= strip_tags($_POST["motif"]);
    $taille= strip_tags($_POST["taille"]);
    $genre= strip_tags($_POST["genre"]);
    $stock= strip_tags($_POST["stock"]);
    $prix= strip_tags($_POST["prix"]);

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) 
        {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $imageType = $_FILES['image']['type'];
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $allowed = [
                "jpg" => "image/jpeg",
                "jpeg" => "image/jpeg",
                "png" => "image/png"
            ];

            if(!array_key_exists($imageExtension, $allowed) || !in_array($imageType, $allowed))
            {
            die("Type de fichier non autorisé. Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
            } else {
            // on génère un nom unique : 
            // uniqid est un TIMESTAMP et md5 permet de le chiffré histoire d'avoir un string aléatoire
            $newname=md5(uniqid());
            // on génère le chemin complet vers le fichier:
            $newfilename = "uploads/$newname.$imageExtension";
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
                die("l'upload a échoué");
            }
            // Se connecter à la base de données
            require_once("../connect.php");

             // Écrire la requête
             $sql = "INSERT INTO `products`(`reference_produit`, `marque`, `image`, `type`, `couleur`, `matiere`, `stock`, `motif`,`taille`,`genre`,`prix`) VALUES (:reference_produit, :marque, :image, :type, :couleur, :matiere, :stock, :motif, :taille, :genre, :prix)";
             $query = $db->prepare($sql);
             $query->bindValue(":reference_produit", $ref, PDO::PARAM_INT);
             $query->bindValue(":marque", $marque, PDO::PARAM_STR);
             $query->bindValue(":image", $newfilename, PDO::PARAM_STR);
             $query->bindValue(":type", $type, PDO::PARAM_STR);
             $query->bindValue(":couleur", $couleur, PDO::PARAM_STR);
             $query->bindValue(":matiere", $matiere, PDO::PARAM_STR);
             $query->bindValue(":stock", $stock, PDO::PARAM_INT);
             $query->bindValue(":motif", $motif, PDO::PARAM_STR);
             $query->bindValue(":taille", $taille, PDO::PARAM_STR);
             $query->bindValue(":genre", $genre, PDO::PARAM_STR);
             $query->bindValue(":prix", $prix, PDO::PARAM_STR);

             $query->execute();
            header("Location: tableauProduits.php");
            exit();
            }
        } else {
            die("Le formulaire est incomplet.");
        }  
}


?>
<h1>Ajouter un produit</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="ref">Référence produit</label>
        <input type="text" name="ref">
    </div>
    <div>
        <label for="marque">Marque du produit</label>
        <input type="text" name="marque">
    </div>
    <div>
        <label for="type">Type du produit</label>
        <input type="text" name="type">
    </div>
    <div>
        <label for="image">Image du produit</label>
        <input type="file" name="image" required>
    </div>
    <div>
        <label for="couleur">couleur du produit</label>
        <input type="text" name="couleur" required>
    </div>
    <div>
        <label for="matiere">Matière du produit</label>
        <input type="text" name="matiere" required>
    </div>
    <div>
        <label for="motif">Motif du produit</label>
        <input type="text" name="motif" required>
    </div>
    <div>
        <label for="taille">Taille du produit</label>
        <input type="text" name="taille" required>
    </div>
    <div>
        <label for="genre">Genre</label>
        <select name="genre">
            <option value="genre">genre</option>
            <option value="homme">homme</option>
            <option value="femme">femme</option>
        </select>
    </div>
    <div>
        <label for="stock">Stock du produit</label>
        <input type="number" name="stock" id="stock" min="0" required>
    </div>
    <div>
        <label for="prix">Prix du produit</label>
        <input type="text" name="prix" required>
    </div>
    <div id="btn">
    <button type="submit" class="btn">Envoyer</button>
    </div>
</form>

</body>
</html>