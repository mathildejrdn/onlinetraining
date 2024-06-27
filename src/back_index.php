<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Online Training</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="./styles/output.css">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="font.css">
</head>
<body>
  <div class="flex h-screen">
    <!-- Conteneur des onglets -->
    <div class="bg-gray-200 max-w-1/4">
      <nav class="flex flex-col">
      <?php
// Vérifiez si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    // Préparez une requête SQL pour récupérer les informations de l'utilisateur
    $sql = "SELECT first_name, last_name FROM utilisateurs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifiez si l'utilisateur existe
    if ($result->num_rows > 0) {
        // Récupérez les informations de l'utilisateur
        $row = $result->fetch_assoc();
        $first_name = htmlspecialchars($row['prenom']);
        $last_name = htmlspecialchars($row['nom']);
        echo "<h3>Bienvenue $prenom $nom</h3>";
    } else {
        echo "<h3>Utilisateur non trouvé</h3>";
    }

    $stmt->close();
} else {
    echo "<h3>ID d'utilisateur non fourni</h3>";
}
?>
        <!-- Onglets -->
        <a href="#tab1" class="tab py-2 px-4 bg-white border-b border-gray-300">Messagerie</a>
        <a href="#tab2" class="tab py-2 px-4 bg-white border-b border-gray-300">Gestion commerciale</a>
        <a href="#tab3" class="tab py-2 px-4 bg-white border-b border-gray-300">Logistique</a>
        <a href="#tab4" class="tab py-2 px-4 bg-white border-b border-gray-300">Comptabilité</a>
        <a href="#tab5" class="tab py-2 px-4 bg-white border-b border-gray-300">Gestion des utilisateurs</a>
        <a href="#tab6" class="tab py-2 px-4 bg-white border-b border-gray-300">Gestion des apprenant(e)s</a>
        <button type="submit" class="mt-4 w-3/6 bg-red-500 text-white py-2 rounded hover:bg-red-600 flex items-center justify-center m-auto">
                <span>Déconnexion</span>
            </button>  
      </nav>
    </div>

    <!-- Contenu de l'onglet sélectionné -->
    <div class="flex-1  max-w-full p-2 ">
      <!-- Contenu des onglets -->
      <div id="tab1" class="tab-content  min-w-full">
      <?php include 'back_office/inbox.php'; ?>
      </div>
      <div id="tab2" class="tab-content hidden">
      <?php include 'back_office/products.php'; ?>
      </div>
      <div id="tab3" class="tab-content hidden">
        Logistique
      </div>
      <div id="tab4" class="tab-content hidden">
     Comptabilité
      </div>
      <div id="tab5" class="tab-content hidden">
      <?php include 'back_office/userlist.php'; ?>
      </div>
      <div id="tab6" class="tab-content hidden">
      Gestion des utilisateurs spéciaux
      </div>

    </div>
  </div>

  <script>
    // Ajouter un gestionnaire d'événements de clic pour les onglets
    document.querySelectorAll('.tab').forEach(tab => {
      tab.addEventListener('click', function(event) {
        event.preventDefault();

        // Masquer tous les contenus d'onglets
        document.querySelectorAll('.tab-content').forEach(content => {
          content.classList.add('hidden');
        });

        // Afficher le contenu de l'onglet correspondant
        const tabId = this.getAttribute('href').substring(1);
        document.getElementById(tabId).classList.remove('hidden');
      });
    });
  </script>
</body>
</html>
