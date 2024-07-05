<?php

session_start();

require_once("../connect.php");

/* Php pour gérer le lien avec le stock de la quantité */

/* Récupération des données a vérifié */

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql = "SELECT * FROM products WHERE id = :product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":product_id", $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product && $product['stock'] >= $quantity) {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }

        // Génère un numéro de commande aléatoire //
             
        $order_number = 'CMD' . sprintf('%03d', count($_SESSION['panier']) + 1);

        $_SESSION['panier'][$order_number] = array(
            'product_id' => $product_id,
            'quantity' => $quantity,
            'total_price' => $quantity * $product['price']
        );

            header('Content-Type: application/json');
        echo json_encode(array('success' => true));
        exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Stock insuffisant pour ce produit.'));
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Panier L</title>
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">

</head>

<body class="bg-gray-100">

    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-5xl bg-white p-8 rounded-lg shadow-lg flex">

            <!-- Container des articles -->
            <div class="w-full">
                <div class="md:flex items-stretch py-8 md:py-10 lg:py-8 border-t border-gray-50">
                    <div class="md:w-1/4 2xl:w-1/4 w-full">
                        <img src="../images/polo.jpg" alt="Thé"
                            class="h-48 w-40 object-center object-cover md:block hidden" />
                    </div>
                    <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                        <div class="flex flex-col items-start w-full">
                            <h3>PRODUCT_NAME_HERE</h3>
                            <select name="weight" id="size"
                                class="size bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2"
                                data-product-id="PRODUCT_ID_HERE">
                                <option value="xs">xs</option>
                                <option value="s">s</option>
                                <option value="m">m</option>
                                <option value="l">l</option>
                                <option value="xl">xl</option>
                            </select>
                            <div class="flex flex-col items-start w-full">
                                <label for="counter-input-PRODUCT_ID_HERE" class="flex-shrink-0 mb-2"><span>Quantité
                                        :</span></label>
                                <div class="relative flex items-center">
                                    <button type="button" id="decrement-button-PRODUCT_ID_HERE"
                                        data-input-counter-decrement="counter-input-PRODUCT_ID_HERE"
                                        class="decrement-button flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>
                                    <input type="text" name="quantity" id="counter-input-PRODUCT_ID_HERE"
                                        data-input-counter data-product-id="PRODUCT_ID_HERE"
                                        class="counter-input flex-shrink-0 text-gray-900 border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                        placeholder="" value="1" required />
                                    <button type="button" id="increment-button-PRODUCT_ID_HERE"
                                        data-input-counter-increment="counter-input-PRODUCT_ID_HERE"
                                        class="increment-button flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                        <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-5">
                            <div class="flex items-center">
                                <a href="#">
                                    <p class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Supprimer
                                    </p>
                                </a>
                            </div>
                            <p class="productTotal text-base font-black leading-none text-gray-800"
                                data-product-id="PRODUCT_ID_HERE">PRIX €</p>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="PRODUCT_ID_HERE" name="product_id">
                <input type="hidden" value="PRODUCT_NAME_HERE" name="product_name">

                <a href="../index.php" class="flex font-semibold text-red-600 text-sm mt-10">
                    <svg class="fill-current mr-2 text-red-600 w-4" viewBox="0 0 448 512">
                        <path
                            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
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
                        <span id="priceTotal">PRIX_TOTAL_HERE €</span>
                        <input type="hidden" id="priceTotalHiddenInput" name="price" value="PRIX_TOTAL_HERE">
                    </div>
                    <button type="submit"
                        class="flex-none rounded-md bg-gray-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-700 mt-4">Valider
                        la commande</button>
                </div>
            </div>

        </div>
    </div>

    <script>
    /* Gestion des tailles de vêtements */

    document.addEventListener('DOMContentLoaded', function() {
        const tailleSelect = document.getElementById('size');
        tailleSelect.addEventListener('change', function() {
            const selectedTaille = this.value;
            console.log('Taille sélectionnée:', selectedTaille);
        });

        const incrementButtons = document.querySelectorAll('.increment-button');
        const decrementButtons = document.querySelectorAll('.decrement-button');

        function checkStock(product_id, desiredQuantity, callback) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'panierl.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            console.log("Réponse du serveur :", response);

                            if (response.error) {
                                alert(response.error);
                                callback(false);
                            } else {
                                callback(true, response.orde_number);
                            }
                        } catch (e) {
                            console.error('Erreur lors du parsing JSON :', e);
                            console.error('Réponse reçue (non-JSON) :', xhr.responseText);
                        }
                    } else {
                        console.error('Erreur de requête AJAX :', xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.send('product_id=' + encodeURIComponent(product_id) + '&quantity=' + encodeURIComponent(
                desiredQuantity));
        }

        incrementButtons.forEach(button => {
            button.addEventListener('click', function() {
                const inputId = this.getAttribute('data-input-counter-increment');
                const inputElement = document.getElementById(inputId);
                const currentValue = parseInt(inputElement.value);
                const productId = inputElement.getAttribute('data-product-id');

                if (productId) {
                    checkStock(productId, currentValue + 1, (isAvailable) => {
                        if (isAvailable) {
                            inputElement.value = currentValue + 1;
                        } else {
                            alert("Quantité maximale atteinte pour ce produit !");
                        }
                    });
                } else {
                    console.error("Le product_id n'est pas défini sur l'élément d'entrée.");
                }
            });
        });

        decrementButtons.forEach(button => {
            button.addEventListener('click', function() {
                const inputId = this.getAttribute('data-input-counter-decrement');
                const inputElement = document.getElementById(inputId);
                const currentValue = parseInt(inputElement.value);
                if (currentValue > 1) {
                    inputElement.value = currentValue - 1;
                }
            });
        });
    });
    </script>

</body>

</html>