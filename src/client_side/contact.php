<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $entrepot = $_POST['entrepot'];
    $message_content = $_POST['message'];

    // Récupérer les informations des secrétaires
    $sql = "SELECT id, email FROM users WHERE role='secretaire'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Insérer les messages dans la table `message` et envoyer des e-mails
        while($row = $result->fetch_assoc()) {
            $id_to = $row['id'];
            $secretary_email = $row['email'];

            // Insérer le message dans la base de données
            $sql_insert = "INSERT INTO message (id_from, id_to, message, date_message, read) VALUES (NULL, ?, ?, NOW(), 0)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("is", $id_to, $message_content);
            $stmt->execute();

            // Envoyer un e-mail
            $subject = "Nouveau message client"; //entête de l'email
            $body = "Prénom: $first_name\nNom: $last_name\nEmail: $email\nTéléphone: $phone_number\nMagasin: $entrepot\n\nMessage:\n$message_content"; //contenu de l'email
            $id_from = "$email"; //expéditeur

            if (mail($secretary_email, $subject, $body, $id_from)) {
                echo "Email envoyé avec succès à $secretary_email<br>";
            } else {
                echo "Échec de l'envoi de l'e-mail à $secretary_email<br>";
            }
        }
    } else {
        echo "Aucun(e) secrétaire trouvé(e).";
    }
}
?>
    <div class="flex items-center justify-center min-h-screen">

    <div class="flex items-center justify-center min-h-screen">
    <form class="max-w-md bg-white p-6 rounded shadow-md w-full" method="post" action="chemin vers l'envoi du message">
        <h1 class="text-2xl font-bold mb-4">Contactez nous</h1>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="first_name" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="last_name" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="email" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="phone_number" name="phone_number" id="phone_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">N° de téléphone</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="entrepot" id="entrepot" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="entrepot" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Magasin</label>
        </div>
       
        <div class="relative z-0 w-full mb-5 group">
            <textarea name="message" id="message" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required></textarea>
            <label for="message" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Message</label>
        </div>
        <div id="bouton">
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 flex items-center justify-center space-x-2">
                <svg class="w-6 h-6 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                </svg>
                <span>Envoyer</span>
            </button>
        </div>
    </form>
   <img src='../images/contact.jpg' alt="femme sur son ordinateur" class="hidden md:block w-1/4 h-1/6 bg-cover bg-no-repeat bg-right">
</img>
    </div>

