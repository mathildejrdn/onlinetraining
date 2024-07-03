<?php
session_start();
require_once("../connect.php");

if (isset($_POST['add_to_cart'])) {
    $product_id = strip_tags($_POST["product_id"]);
    $product_name = strip_tags($_POST["product_name"]);
    $product_price = strip_tags($_POST['product_price']);
    $product_img = strip_tags($_POST['product_img']);
    $product_quantity = 1;


    if (isset($_SESSION['user']['id'])) {
        $user_id = $_SESSION['user']['id'];
        $user_name = $_SESSION['user']["firstname"];
        
        // Vérifier si le produit est déjà dans le panier
        $sql = "SELECT * FROM panier WHERE user_name = :user_name AND user_id = :user_id AND product_name = :product_name";
        $query = $db->prepare($sql);
        $query->bindValue(":user_name", $user_name, PDO::PARAM_STR);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->bindValue(":product_name", $product_name, PDO::PARAM_STR);
        $query->execute();
        $panier = $query->fetch();


        if ($panier) {
            // Mettre à jour la quantité si le produit est déjà dans le panier
            $sql = "UPDATE panier SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id";
            $query = $db->prepare($sql);
            $query->bindValue(":quantity", $product_quantity, PDO::PARAM_INT);
            $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $query->bindValue(":product_id", $product_id, PDO::PARAM_INT);
        } else {
            // Insérer un nouvel enregistrement si le produit n'est pas dans le panier
            $sql = "INSERT INTO panier (user_id, user_name, product_name, quantity, product_img, product_id) VALUES (:user_id, :user_name, :product_name, :quantity, :product_img, :product_id)";
            $query = $db->prepare($sql);
            $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $query->bindValue(":user_name", $user_name, PDO::PARAM_STR);
            $query->bindValue(":product_name", $product_name, PDO::PARAM_STR);
            $query->bindValue(":quantity", $product_quantity, PDO::PARAM_INT);
            $query->bindValue(":product_img", $product_img, PDO::PARAM_STR);
            $query->bindValue(":product_id", $product_id, PDO::PARAM_INT);
        }
        // Exécuter la requête
        $query->execute();

    } else {
        die("Vous n'êtes pas connecté.");
    }
  }
  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Online Training</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-5xl bg-white p-8 rounded-lg shadow-lg flex">
        
        <!-- Conteneur des articles -->
        <div class="w-full">
          
            <?php 
            if(isset($_SESSION['user']['id'])) {
              $total = 0;
              $user_id = $_SESSION['user']['id'];
              $user_name = $_SESSION['user']['firstname'];
                $sql = "SELECT p.nom, p.prix, pan.quantity, p.id, p.image, pan.id AS panier_id
                FROM products p 
                JOIN panier pan ON p.nom = pan.product_name
                WHERE pan.user_id = :user_id AND pan.user_name = :user_name";
              
              $query = $db->prepare($sql);
              $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
              $query->bindValue(":user_name", $user_name, PDO::PARAM_STR);
              $query->execute();
              $panier = $query->fetchAll();
              }
            foreach ($panier as $item) {
                $item_total = $item['prix'] * $item['quantity'];
                $total += $item_total;

                $imagePath = $item["image"];
                $class = '../back_office/' . $imagePath;
            ?>
            <div class="md:flex items-stretch py-8 md:py-10 lg:py-8 border-t border-gray-50">
                <div class="md:w-1/4 2xl:w-1/4 w-full">
                <a href="../product.php?id=<?=$item['id']?>"><img src="<?=$class?>" alt="" class="h-48 w-40 object-center object-cover md:block hidden" /></a>
                </div>
                <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                    <div class="flex flex-col items-start w-full">
                        <h3><?=$item["nom"]?></h3>
                        <div class="flex flex-col items-start w-full">
                            <label for="counter-input-<?=$item['id']?>" class="flex-shrink-0 mb-2"><span>Quantité :</span></label>
                            <div class="relative flex items-center">
                                <button type="button" id="decrement-button-<?=$item['id']?>" data-input-counter-decrement="counter-input-<?=$item['id']?>" class="decrement-button flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                    <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <input type="text" name="quantity" id="counter-input-<?=$item['id']?>" data-input-counter data-product-id="<?=$item['id']?>" class="counter-input flex-shrink-0 text-gray-900 border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="" value="<?=$item['quantity']?>" required />
                                <button type="button" id="increment-button-<?=$item['id']?>" data-input-counter-increment="counter-input-<?=$item['id']?>" class="increment-button flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                    <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-5">
                        <div class="flex items-center">
                            <a href="deleteItemCart.php?id=<?=$item['panier_id']?>"><p class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Supprimer</p></a>
                        </div>
                        <p class="productTotal text-base font-black leading-none text-gray-800" data-product-id="<?=$item['id']?>"><?=$item_total?>€</p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <input type="hidden" value="PRODUCT_ID_HERE" name="product_id">
            <input type="hidden" value="PRODUCT_NAME_HERE" name="product_name">

            <a href="../index.php" class="flex font-semibold text-red-600 text-sm mt-10">
                <svg class="fill-current mr-2 text-red-600 w-4" viewBox="0 0 448 512">
                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
                </svg>
                Continuez vos achats
            </a>
        </div>

        <!-- Résumé de la commande -->
        <div id="summary" class="w-full sm:w-1/4 md:w-1/2 px-8 py-10 bg-white">
            <h3>Résumé de votre commande</h3>
            <div>
                <label class="font-medium inline-block mb-3 text-sm">
                    <span>Livraison</span>
                </label>
                <select class="block p-2 text-gray-600 w-full text-sm">
                    <option>Livraison à domicile</option>
                    <option>Livraison en point relai</option>
                </select>
            </div>
            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Total</span>
                    <span id="priceTotal"><?=$total?>€</span>
                    <input type="hidden" id="priceTotalHiddenInput" name="price" value="<?=$total?>">
                </div>
                <button type="submit" class="flex-none rounded-md bg-gray-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-700 mt-4">Passer au paiement</button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const decrementButtons = document.querySelectorAll(".decrement-button");
    const incrementButtons = document.querySelectorAll(".increment-button");

    decrementButtons.forEach(button => {
        button.addEventListener("click", function() {
            const inputId = this.getAttribute("data-input-counter-decrement");
            updateQuantity(inputId, -1);
        });
    });

    incrementButtons.forEach(button => {
        button.addEventListener("click", function() {
            const inputId = this.getAttribute("data-input-counter-increment");
            updateQuantity(inputId, 1);
        });
    });

    function updateQuantity(inputId, change) {
        const input = document.getElementById(inputId);
        const currentQuantity = parseInt(input.value);
        const newQuantity = currentQuantity + change;
        const productId = input.getAttribute("data-product-id");

        if (newQuantity >= 1) {
            // AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "updateQunatity_cart.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        input.value = newQuantity;
                        const productTotalElement = document.querySelector(`.productTotal[data-product-id='${productId}']`);
                        const productPrice = parseFloat(productTotalElement.getAttribute("data-product-price"));
                        const newProductTotal = newQuantity * productPrice;
                        productTotalElement.textContent = `${newProductTotal}€`;
                        updateTotal();
                    } else {
                        alert(response.message);
                    }
                }
            };
            xhr.send(`product_id=${productId}&quantity=${newQuantity}`);
        }
    }

    function updateTotal() {
        let total = 0;
        const productTotals = document.querySelectorAll(".productTotal");
        productTotals.forEach(element => {
            total += parseFloat(element.textContent.replace("€", ""));
        });
        document.getElementById("priceTotal").textContent = `${total}€`;
        document.getElementById("priceTotalHiddenInput").value = total;
    }
});
</script>
</body>
</html>