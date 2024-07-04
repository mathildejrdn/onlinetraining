<?php

session_start();

require_once("../connect.php");

include 'cart.php';

/* Php pour gérer le lien avec le stock de la quantité */

/* Récupération des données a vérifié */

if (isset($_POST['stock_product'], $_POST['quantity'])) {
    $stock_product = $_POST['stock_product'];
    $quantity = $_POST['quantity'];

    $sql = "SELECT * FROM products WHERE id = :stock_product";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":stock_product", $stock_product, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product && $product['stock_product'] >= $quantity) {
        if (!isset($_SESSION['orders'])) {
            $_SESSION['orders'] = array();
        }

        // Génère un numéro de commande aléatoire //
             
        $order_number = 'CMD' . sprintf('%03d', count($_SESSION['orders']) + 1);

        $_SESSION['orders'][$order_number] = array(
            'product_id' => $stock_product,
            'quantity' => $quantity,
            'total_price' => $quantity * $product['price']
        );

        header("Location: orders.php");
        exit;
    } else {
        echo json_encode(array('error' => 'Stock insuffisant pour ce produit.'));
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

<body>

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
    });
    </script>

</body>

</html>