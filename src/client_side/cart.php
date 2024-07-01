<!doctype html>
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
    
    <!-- Container des articles -->
    <div class="w-full">
      <div class="md:flex items-stretch py-8 md:py-10 lg:py-8 border-t border-gray-50">
        <div class="md:w-1/4 2xl:w-1/4 w-full">
          <img src="../images/polo.jpg" alt="Thé" class="h-48 w-40 object-center object-cover md:block hidden" />
        </div>
        <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
          <div class="flex flex-col items-start w-full">
            <h3>PRODUCT_NAME_HERE</h3>
            <select name="weight" id="size" class="size bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-2" data-product-id="PRODUCT_ID_HERE">
              <option value="xs">xs</option>
              <option value="s">s</option>
              <option value="m">m</option>
              <option value="l">l</option>
              <option value="xl">xl</option>
            </select>
            <div class="flex flex-col items-start w-full">
              <label for="counter-input-PRODUCT_ID_HERE" class="flex-shrink-0 mb-2"><span>Quantité :</span></label>
              <div class="relative flex items-center">
                <button type="button" id="decrement-button-PRODUCT_ID_HERE" data-input-counter-decrement="counter-input-PRODUCT_ID_HERE" class="decrement-button flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                  <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                  </svg>
                </button>
                <input type="text" name="quantity" id="counter-input-PRODUCT_ID_HERE" data-input-counter data-product-id="PRODUCT_ID_HERE" class="counter-input flex-shrink-0 text-gray-900 border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="" value="1" required />
                <button type="button" id="increment-button-PRODUCT_ID_HERE" data-input-counter-increment="counter-input-PRODUCT_ID_HERE" class="increment-button flex-shrink-0 bg-gray-100 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                  <svg class="w-2.5 h-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="flex items-center justify-between pt-5">
            <div class="flex items-center">
              <a href="#"><p class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Supprimer</p></a>
            </div>
            <p class="productTotal text-base font-black leading-none text-gray-800" data-product-id="PRODUCT_ID_HERE">PRIX €</p>
          </div>
        </div>
      </div>
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
          <span id="priceTotal">PRIX_TOTAL_HERE €</span>
          <input type="hidden" id="priceTotalHiddenInput" name="price" value="PRIX_TOTAL_HERE">
        </div>
        <button type="submit" class="flex-none rounded-md bg-gray-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-700 mt-4">Passer au paiement</button>
      </div>
    </div>
    
  </div>
</div>

</body>
</html>



<!-- <?php 

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
        $_SESSION['panier'][$id]['prix_unitaire'] += $prix =
        $_SESSION['panier'][$id]['prix_total'] += $prix * $quantite;
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
                ajouterAuPanier($_GET['id'], $_GET['nomProduit'], $_GET['quantite'], $_GET['quantite'], $_GET['prix']);
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

    <a href="panier.php?action=add&id=ID_DU_PRODUIT&nomProduit=NomDuProduit&quantite&prix=1">Retourner à la boutique</a>

</body>

</html> -->