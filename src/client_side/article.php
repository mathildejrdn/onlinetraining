<?php
include('navbar.php');

// Vérifie si l'ID du produit est passé dans l'URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Query pour récupérer les détails du produit basé sur l'ID
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $product_id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Récupérer les détails du produit
        $nom_produit = $product['nom']; // Exemple de champ de la base de données
        $description = $product['description']; // Exemple de champ de la base de données
        $prix = $product['prix']; // Exemple de champ de la base de données
        $image = '../back_office/' . $product['image']; // Chemin de l'image du produit
        $taille= $product["taille"];
        $couleur= $product["couleur"];
    } else {
        // Gérer le cas où le produit avec cet ID n'existe pas
        echo "Produit non trouvé.";
    }
} else {
    // Gérer le cas où l'ID du produit n'est pas passé dans l'URL
    echo "ID de produit non spécifié.";
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Online training</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/font.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="font-sans bg-gray-100">

    <div class="p-4 lg:max-w-6xl max-w-2xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-lg:gap-16">
            <!-- Colonne 1: Image -->
            <div class="lg:min-h-82 lg:min-w-48">
                <img src="<?php echo $image; ?>" alt="Produit"
                    class="w-full h-full object-cover rounded-md lg:h-82 lg:min-w-72" />
            </div>

            <!-- Colonne 2: Contenu -->
            <div class="lg:sticky top-0 lg:text-left lg:overflow-y-auto">
                <div class="lg:pl-4">
                    <div class="flex flex-wrap items-start gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800"><?php echo $nom_produit; ?></h2>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mt-4"><?php echo $description; ?></p>

                    <form method="POST" action="./panierG.php">
                        <input type="hidden" name="product_id" value="<?= $product['id']?>">
                        <input type="hidden" name="product_img" value="<?= $product['image']?>">
                        <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['nom']) ?>">
                        <input type="hidden" name="product_price" value="<?= htmlspecialchars($product['prix']) ?>">
                        <button class="px-4 py-2 border border-gray-800 bg-transparent text-gray-800 rounded-md hover:bg-red-600 hover:text-white" type="submit" name="add_to_cart">Ajouter au panier</button>
                </form>

                    <hr class="my-8" />

                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Prix</h3>
                        <p class="text-lg font-semibold text-gray-800"><?php echo $prix; ?> €</p>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-gray-800">Taille</h3>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <button type="button"
                                class="w-12 h-12 border hover:border-gray-800 font-semibold text-sm rounded-md flex items-center justify-center"><?=$product["taille"]?></button>

                        </div>
                    </div>

                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-gray-800">Couleur</h3>
                        <div class="mt-2">
                        <button type="button"
                        class="w-55 h-12 border hover:border-gray-800 font-semibold text-sm rounded-md flex items-center justify-center"><?=$product["couleur"]?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../includes/guaranties.php'); ?>
    <!-- Inclusion du footer -->
<?php include '../includes/footer.php'; ?>


</body>

</html>
