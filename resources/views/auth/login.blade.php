<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Connexion</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
    
    <!-- Titre -->
    <h1 class="text-2xl font-semibold text-blue-800 text-center mb-6">
      Connexion à votre compte
    </h1>

    <!-- Erreur globale -->
    <!-- Afficher seulement en cas d'erreur serveur -->
    <!-- <div class="mb-4 rounded-md bg-red-50 p-3 text-sm text-red-700">
      Identifiants incorrects. Veuillez réessayer.
    </div> -->

    <form action="/login" method="POST" class="space-y-5 g-9" >
      @csrf
      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Adresse email
        </label>
        <input 
          name="email"
          type="email"
          placeholder="exemple@entreprise.com"
          class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <!-- Message d'erreur
        <!-- <p class="mt-1 text-sm text-red-600">
          Veuillez saisir une adresse email valide.
        </p> -->
      </div> 

      <!-- Mot de passe -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Mot de passe
        </label>
        <input  
         name="password" 
         type="password"        
          class="w-full rounded-md border border-black px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <!-- Message d'erreur -->
        <!-- <p class="mt-1 text-sm text-red-600">
          Le mot de passe est requis.
        </p> -->
      </div> 
      <div class="flex justify-between ">
        
        <label >
          <input type="checkbox" >
          <span class="text-gray-800 italic ">Remember me</span>
        </label>
          <a href="#" class="text-red-700 italic text-sm">Password forgotten</a>

      </div>

      <!-- Bouton -->
      <button  
        type="submit"
        class="w-full rounded-md bg-blue-600 py-2 text-white text-sm font-semibold hover:bg-blue-700 transition"
      >
        Login
      </button>
      
      <div class="flex justify-between text-blue-400">
        <span>Have you an account?</span> 
        <a href="register">Create an account</a>
      </div>


    </form>

    <!-- Footer -->
    <p class="mt-6 text-center text-sm text-gray-500">
      © 2026 Entreprise. Tous droits réservés.
    </p>
  </div>

</body>
</html>
