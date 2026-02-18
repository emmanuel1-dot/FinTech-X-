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
    <h1 class="text-2xl font-semibold text-gray-800 text-center mb-6">
      Creer un compte
    </h1>

    <!-- Erreur globale -->
    <!-- <div class="mb-4 rounded-md bg-red-50 p-3 text-sm text-red-700">
      Mot de passe incorrect. Veuillez réessayer.
    </div> -->

    <form action="/register" class="space-y-5" method="POST">
        @csrf
      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Name
        </label>
        <input
          type="string"
          name="name"
          placeholder="votre nom"
          class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"

          />
          @error('name') 
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Adresse email
        </label>
        <input
          type="email"
            name="email"
          placeholder="exemple@entreprise.com"
          class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
          @error('email') 
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
      </div>

      <!-- Mot de passe -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Mot de passe
        </label>
        <input
          type="password"
          name="password"
          placeholder="********"
            class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
          class="w-full rounded-md border  px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        @error('password') 
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
      <div class="my-6">
        <label class="block text-sm font-medium text-gray-700 mb-1">
          Confirmer votre mot de passe
        </label>
        <input 
          type="password"
          placeholder="********"
          name="password_confirmation"
          class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
          class="w-full rounded-md border   px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
    
      </div>

      <!-- Options
      <div class="flex items-center justify-between">
        <label class="flex items-center gap-2 text-sm text-gray-700">
          <input
            type="checkbox"
            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
          />
          Se souvenir de moi
        </label>

        <a href="#" class="text-sm text-blue-600 hover:underline">
          Mot de passe oublié ?
        </a>
      </div> -->

      <!-- Bouton -->
      <button
        type="submit"
        class="w-full rounded-md bg-blue-600 py-2 text-white text-sm font-semibold hover:bg-blue-700 transition"
      >
        S'inscrire
      </button>

    </form>
    <span class="center">
        <p>Avez-vous deja un  compte?</p>
        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
          Se connecter
    </span>

    
  </div>

</body>
</html>
