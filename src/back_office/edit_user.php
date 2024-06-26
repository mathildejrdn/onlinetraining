<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Profil Utilisateur</title>
  <link rel="stylesheet" href="../styles/output.css">
  <link rel="stylesheet" href="../styles/reset.css">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <form id="profile_form" class="max-w-md mx-auto bg-white p-6 rounded shadow-md w-full" method="post">
        <h1 class="text-2xl font-bold mb-4">Éditer le Profil</h1>
        <h2 class="text-xl font-semibold text-red-600 mb-4">Rôle: Utilisateur</h2>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="firstname" id="firstname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="firstname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prénom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="lastname" id="lastname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="lastname" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nom</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="date" name="birthdate" id="birthdate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="birthdate" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date de naissance</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="pass" id="pass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="pass" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mot de passe</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="pass2" id="pass2" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="pass2" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmer votre mot de passe</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="email" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="adress" id="adress" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="adress" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Adresse</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" name="phonenumber" id="phonenumber" pattern="[0-9]{10}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " required />
            <label for="phonenumber" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numéro de téléphone</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select name="genre" id="genre" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-red-600 peer" required>
                <option value="" disabled selected>Quel est votre genre ?</option>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
                <option value="autre">Autre</option>
            </select>
            <label for="genre" class="peer-focus:font-medium absolute text-sm text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-red-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Genre</label>
        </div>
        
        <!-- Section pour les rôles (visible uniquement pour le compte formateur) -->
        <div class="relative z-0 w-full mb-5 group">
            <fieldset>
                <legend class="text-sm text-gray-500">Rôles des utilisateurs (réservé aux formateurs)</legend>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center">
                        <input id="role1" name="roles" type="checkbox" value="role1" class="h-4 w-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <label for="role1" class="ml-2 block text-sm text-gray-900">Role 1</label>
                    </div>
                    <div class="flex items-center">
                        <input id="role2" name="roles" type="checkbox" value="role2" class="h-4 w-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <label for="role2" class="ml-2 block text-sm text-gray-900">Role 2</label>
                    </div>
                    <div class="flex items-center">
                        <input id="role3" name="roles" type="checkbox" value="role3" class="h-4 w-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <label for="role3" class="ml-2 block text-sm text-gray-900">Role 3</label>
                    </div>
                    <div class="flex items-center">
                        <input id="role4" name="roles" type="checkbox" value="role4" class="h-4 w-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <label for="role4" class="ml-2 block text-sm text-gray-900">Role 4</label>
                    </div>
                    <div class="flex items-center">
                        <input id="role5" name="roles" type="checkbox" value="role5" class="h-4 w-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                        <label for="role5" class="ml-2 block text-sm text-gray-900">Role 5</label>
                    </div>
                </div>
            </fieldset>
        </div>
        
        <div id="profile_btn">
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 mb-5">Mettre à jour</button>
        </div>
        <div id="profile_btn">
    <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 mt-5 flex items-center justify-center space-x-2">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
        </svg>
        <span>Supprimer l'utilisateur</span>
    </button>
</div>

    </form>
</body>
</html>
