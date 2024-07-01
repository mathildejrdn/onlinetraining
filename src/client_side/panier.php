<?php 

session_start();

require_once("../connect.php");

/* Gestion du panier */

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

/* Ajouter au panier */

function ajouterAuPanier($id, $nomProduit, $quantite, $prix) {
    $nomProduit = htmlspecialchars($nomProduit);
    $quantite = (int)$quantite;
    $prix = (float)$prix;

    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id]['quantite'] += $quantite;
        $_SESSION['panier'][$id]['prix_total'] = $_SESSION['panier'][$id]['prix_unitaire'] * $_SESSION['panier'][$id]['quantite'];
    } else {
        $_SESSION['panier'][$id] = array(
            'nomProduit' => $nomProduit,
            'quantite' => $quantite,
            'prix_unitaire' => $prix,
            'prix_total' => $prix * $quantite
        );
    }
}

/* Afficher le panier */

function afficherPanier() {
    if (empty($_SESSION['panier'])) {
        echo "Votre panier est vide.";
    } else {
        echo "<table border='1'>";
        echo "<tr><th>Nom du produit</th><th>Quantité</th><th>Prix unitaire</th><th>Prix total</th><th>Action</th></tr>";
        foreach ($_SESSION['panier'] as $id => $produit) {
            echo "<tr>";
            echo "<td>{$produit['nomProduit']}</td>";
            echo "<td>{$produit['quantite']}</td>";
            echo "<td>{$produit['prix_unitaire']} €</td>";
            echo "<td>{$produit['prix_total']} €</td>";
            echo "<td><a href='panier.php?action=update&id=$id&newQuantite=" . ($produit['quantite'] + 1) . "'>+1</a> | ";
            echo "<a href='panier.php?action=update&id=$id&newQuantite=" . ($produit['quantite'] - 1) . "'>-1</a> | ";
            echo "<a href='panier.php?action=remove&id=$id'>Supprimer</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

/* Modifier la quantité d'un produit */

function modifierQuantite($id, $quantite) {
    $id = htmlspecialchars($id);
    $quantite = (int)$quantite;

    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id]['quantite'] = $quantite;
        $_SESSION['panier'][$id]['prix_total'] = $_SESSION['panier'][$id]['prix_unitaire'] * $quantite;
        if ($_SESSION['panier'][$id]['quantite'] <= 0) {
            unset($_SESSION['panier'][$id]);
        }
    }
}

/* Supprimer un produit du panier */

function supprimerDuPanier($id) {
    $id = htmlspecialchars($id);

    if (isset($_SESSION['panier'][$id])) {
        unset($_SESSION['panier'][$id]);
    }
}

/* Traitement des actions */

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if (isset($_GET['id']) && isset($_GET['nomProduit']) && isset($_GET['quantite']) && isset($_GET['prix'])) {
                ajouterAuPanier($_GET['id'], $_GET['nomProduit'], $_GET['quantite'], $_GET['prix']);
            }
            break;
        case 'update':
            if (isset($_GET['id']) && isset($_GET['newQuantite'])) {
                modifierQuantite($_GET['id'], $_GET['newQuantite']);
            }
            break;
        case 'remove':
            if (isset($_GET['id'])) {
                supprimerDuPanier($_GET['id']);
            }
            break;
        case 'validate':
            echo "Commande validée !";
            $_SESSION['panier'] = array();
            break;
    }
}

/* Affichage du panier */

afficherPanier();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>

<body>

    <h1>Panier de la commande</h1>

    <form action="panier.php" method="GET">
        <input type="hidden" name="action" value="add">
        <label for="id">Numéro du produit</label>
        <input type="text" name="id" id="id" required>
        <label for="nomProduit">Nom du produit</label>
        <input type="text" name="nomProduit" id="nomProduit" required>
        <label for="quantite">Quantité</label>
        <input type="number" name="quantite" id="quantite" required>
        <label for="prix">Prix unitaire :</label>
        <input type="number" name="prix" id="prix" required>
        <input type="submit" value="Ajouter au panier">
    </form>

    <a href="#">Retourner à la boutique</a>

</body>

</html>