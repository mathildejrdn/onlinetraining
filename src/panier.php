<?php 

session_start();

require_once("connect.php");

/* Gestion du panier */

 if(!isset($_SESSION['panier'])){
     $_SESSION['panier'] = array();
 }

/* Ajouter au panier */

function ajouterAuPanier($id, $nomProduit, $quantite) {
    $nomProduit = htmlspecialchars($nomProduit);
    $quantite = (int)$quantite;
    
    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id]['quantite'] += $quantite;
    } else {
        $_SESSION['panier'][$id] = array(
            'nomProduit' => $nomProduit,
            'quantite' => $quantite
        );
    }
}

/* Afficher le panier */

function afficherPanier() {
    if (empty($_SESSION['panier'])) {
        echo "Votre panier est vide.";
    } else {
        echo "<table border='1'>";
            echo "<th>Nom du produit</th>
                <th>Quantité</th>
                <th>Action</th></tr>";
        foreach ($_SESSION['panier'] as $id => $produit) {
            echo "<td>{$produit['nomProduit']}</td>";
            echo "<td>{$produit['quantite']}</td>";
            echo "<td><a href='?action=update&id=$id'>Modifier</a></td>",
                 "<td><a href='?action=remove&id=$id'>Supprimer</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

/* Modifier la quantité d'un produit */

function modifierQuantite($id, $quantite) {
    $id = htmlspecialchars($id);
    $quantite = (int)$quantite;

    if(isset($_SESSION['panier'][$id])){
        $_SESSION['panier'][$id]['quantite'] = $quantite;
        if($_SESSION['panier'][$id]['quantite'] <= 0) {
            unset($_SESSION['panier']['$id']);
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

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if (isset($_GET['id']) && isset($_GET['nomProduit']) && isset($_GET['quantite'])) {
                ajouterAuPanier($_GET['id'], $_GET['nomProduit'], $_GET['quantite']);
            }
            break;
        case 'update':
            if (isset($_GET['id']) && isset($_GET['quantite'])) {
                modifierQuantite($_GET['id'], $_GET['quantite']);
            }
            break;
        case 'remove':
            if (isset($_GET['id'])) {
                supprimerDuPanier($_GET['id']);
            }
            break;
    }
}

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

    <a href="panier.php?action=add&id=?ID_DU_PRODUIT&nomProduit=NomDuProduit&quantite=1">Ajouter un produit</a>

</body>

</html>