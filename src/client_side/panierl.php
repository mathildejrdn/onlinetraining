<?php

session_start();

require_once("../connect.php");

include 'cart.php';

/* Php pour gérer le lien avec le stock de la quantité */

/* Récupération des données a vérifié */

if (isset($_POST['stock_product'])) {
    $stock_product = $_POST['stock_product'];
}

$sql = "SELECT stock_product FROM products where id = :stock_product";
$stmt = $db->prepare($sql);
$stmt->bindParam(":stock_product", $stock_product, PDO::PARAM_INT);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$response = array();

try {

    $response = [];

    if (isset($row) && is_array($row)) {

    if(array_key_exists('stock_product', $row)) {
        $response['stock_product'] = $row['stock_product'];
    } else {
    $response['error'] = "Produit non trouvé pour l'ID : " . $stock_product;
       }
    } else {
    $response['error'] = "Produit non trouvé pour l'ID : " . $stock_product;
    }

    if (!isset($stock_product)) {
        $response['error'] = "Id du produit non fourni";
    }

    echo json_encode($response);

} catch(PDOException $e) {
    echo json_encode(['error'=> "Erreur de connexion :" . $e->getMessage()]);
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

<body>

    <script>
    /* Gestion du prix total */

    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('counter-input-PRODUCT_ID_HERE');
        const priceTotalElement = document.getElementById('priceTotalHiddenInput');

        priceTotalElement.textContent = priceTotal;

        quantityInput.addEventListener('input', function() {
            const quantity = parseInt(this.value);
            if (quantity >= 1) {
                const totalPrice = quantity;
                priceTotalElement.textContent = totalPrice;
            }
        })
    });

    /* Gestion des tailles de vêtements */

    document.addEventListener('DOMContentLoaded', function() {
        const tailleSelect = document.getElementById('size');
        tailleSelect.addEventListener('change', function() {
            const selectedTaille = this.value;
            console.log('Taille sélectionnée:', selectedTaille);
        });

        /* Gestion quantite dans la base de donnée */
        const incrementButtons = document.querySelectorAll('.increment-button');
        const decrementButtons = document.querySelectorAll('.decrement-button');
        const counterInputs = document.querySelectorAll('.counter-input');

        incrementButtons.forEach(button => {
            button.addEventListener('click', function() {
                const inputId = this.getAttribute('data-input-counter-increment');
                const inputElement = document.getElementById(inputId);
                const currentValue = parseInt(inputElement.value);
                const productId = inputElement.getAttribute('data-product-id');

                checkStock(productId, currentValue + 1, (isAvailable) => {
                    if (isAvailable) {
                        inputElement.value = currentValue + 1;
                    } else {
                        alert("Quantité maximale atteinte pour ce produit !");
                    }
                });
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

        function checkStock(stock_product, desiredQuantity, callback) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'panierl.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        console.log("Réponse du serveur :", xhr.responseText);

                        if (response.stock_product >= desiredQuantity) {
                            callback(true);
                        } else {
                            callback(false);
                        }
                    } else {
                        console.error('Erreur de requête AJAX :', xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.send('stock_product=' + encodeURIComponent(stock_product));
        }
    });

    /* Gestion quantite */

    document.addEventListener("DOMContentLoaded", function() {
        const decrementButtons = document.querySelectorAll(
            "[data-input-counter-decrement]"
        );
        const incrementButtons = document.querySelectorAll(
            "[data-input-counter-increment]"
        );

        decrementButtons.forEach((button) => {
            button.addEventListener("click", function() {
                const inputId = this.getAttribute("data-input-counter-decrement");
                const inputElement = document.getElementById(inputId);
                let currentValue = parseInt(inputElement.value);
                if (currentValue > 1) {
                    inputElement.value = currentValue - 1;
                }
            });
        });

        incrementButtons.forEach((button) => {
            button.addEventListener("click", function() {
                const inputId = this.getAttribute("data-input-counter-increment");
                const inputElement = document.getElementById(inputId);
                let currentValue = parseInt(inputElement.value);
                inputElement.value = currentValue + 1;
            });
        });
    });
    </script>

</body>

</html>