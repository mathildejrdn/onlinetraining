<?php
session_start();
include("../connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: connexion.php");
    exit();
}

$myId = $_SESSION['id'];

$newMessagesCount = 0;  // Initialiser la variable
$newMessages = [];

// Compter les messages non lus
$countNewMessages = $db->prepare("SELECT COUNT(*) as new_messages FROM message WHERE id_to = ? AND `read` = 0");
$countNewMessages->execute(array($myId));
$newMessagesResult = $countNewMessages->fetch();
$newMessagesCount = $newMessagesResult['new_messages'];

// Vérifier si l'utilisateur a cliqué pour afficher les messages
$showMessages = isset($_GET['show_messages']) ? true : false;

if ($showMessages && $newMessagesCount > 0) {
    // Récupérer les messages non lus avec le nom de id_from   join
    $getNewMessages = $db->prepare("SELECT message.id, message.message, message.date_message, message.file, administrateurs.first_name, administrateurs.last_name 
        FROM message 
        JOIN administrateurs ON message.id_from = administrateurs.id 
        WHERE message.id_to = ? AND message.`read` = 0");
    $getNewMessages->execute(array($myId));
    $newMessages = $getNewMessages->fetchAll();

    // Mettre à jour les messages comme lus après les avoir récupérés
    $updateMessages = $db->prepare("UPDATE message SET `read` = 1 WHERE id_to = ? AND `read` = 0");
    $updateMessages->execute(array($myId));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/output.css">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/font.css">
    <title>Les admines</title>
    
</head>
<body>

<body class="flex">
<?php include('navback.php'); ?>
    

    <!-- Affichage de l'icône de message avec le nombre de nouveaux messages -->
    <div class="message-icon">
        <span class="icon"><a href="?show_messages=1">📧</a></span>
        <span class="badge"><?php echo $newMessagesCount; ?></span>
    </div>
    

    <!-- Affichage de la liste des nouveaux messages si l'utilisateur a cliqué pour les afficher -->
    <?php if ($showMessages && $newMessagesCount > 0): ?>
        <div class="messages-list">
            <?php foreach ($newMessages as $message): ?>
                <div class="message-item">
                    <?php echo 'Expéditeur : ' . htmlspecialchars($message['first_name']) . ' ' . htmlspecialchars($message['last_name']) . '<br>'; ?>
                    <?php echo 'La date: ' . htmlspecialchars($message['date_message']) . '<br>'; ?>
                    <?php echo htmlspecialchars($message['message']); ?>
                    <!-- Vérification et affichage des pièces jointes -->
                    <?php if (!empty($message['file'])): ?>
                        <div class="file">
                            <a href="<?php echo htmlspecialchars($message['file']); ?>" target="_blank" download><img src="../images/pj.png" alt="Fichier"></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        
    <?php endif; ?>

    <!-- ici le bouton de supression -->

    
    <a href="#" class="w-16 p-4 border text-gray-700 rounded-2xl mb-24">
       
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                    <!-- bloc des messages à gauche -->
                    <?php 
    $recupUser = $db->prepare("SELECT * FROM administrateurs WHERE id != :myId");
    $recupUser->bindValue(':myId', $myId, PDO::PARAM_INT);
    $recupUser->execute();
    
    // AFFICHER UN BOUCLE POUR MONTRER LES ADMIN
    while ($administrateur = $recupUser->fetch()){
        ?>
        <div class="flex-1 flex-col p-6">
            
        
              <section class="flex flex-col pt-3  bg-gray-50 h-full">
                <!-- bloc des messages à gauche -->
                 <div class="flex flex-col">
                <ul class="mt-6" id="message-list">
                    <li class="py-5 border-b px-3 transition hover:bg-indigo-100" >
                        <!-- message 1 -->
                        <a href="message.php?id=<?php echo $administrateur['id']?>" class="flex ">
                            <h3 class="text-lg font-semibold"><?php echo $administrateur["last_name"]; ?> <?php echo $administrateur["first_name"]; ?></h3>
        
                        </a>
                        
                        <!-- titre du message -->
                    </li>
                    <!-- fin du li -->
                   
                </ul>
                </div>
            </section>
        
    </div>

            <?php
    }
    ?>
</body>
</html>

