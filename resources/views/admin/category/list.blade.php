@extends('layouts.main')

@section('title', 'Dashboard') 
@section('content') 

    <!-- Alert Boxes -->

    @if(session('status')) 
         <!-- // Affiche une boîte d'alerte verte si une session "status" existe, avec le message de la session -->
        <div class="space-y-3 mb-6">

            <div class="p-4 rounded bg-green-100 text-green-800 shadow">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <!-- Formulaire Utilisateur Avancé -->
    <div class=" w-full grid justify-between">
        <!-- Tableau Utilisateurs Avancé avec boutons -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold mb-4">Categories list</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="p-3 border-b">Name</th>
                            <th class="p-3 border-b">Date</th>
                            <th class="p-3 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <!-- // Parcourt la liste des catégories et affiche chaque catégorie dans une ligne du tableau -->
                        @foreach ($categories as $category) 
                            <tr class="hover:bg-gray-100">
                                <!-- //Affiche le nom de la catégorie -->
                                <td class="p-3 border-b">{{ $category->name }}</td> 
                            <!-- // Affiche la date de création de la catégorie --> 
                                <td class="p-3 border-b">{{ $category->created_at }}</td>
                                <td class="p-3 border-b flex space-x-2">
                                    <button

                                        class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition">Edit
                                    </button>
                       
                                        <!-- // Lien pour supprimer la catégorie avec un bouton rouge -->
                                    <a href="{{ route('delete-category', $category->id) }}"  class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
            <h2 class="text-xl font-bold mb-4">Add category</h2>

             <!-- // Formulaire pour ajouter une catégorie avec la méthode POST et l'action vers la route "add-category" -->
            <form action="{{ route('add-category') }}" method="POST" class="grid   gap-4">

                <!-- // token de sécurité pour les formulaires Laravel -->
                @csrf 
                <input type="text" name="name" placeholder="add category" class="p-3 border border-gray-300 rounded-lg">

                 <!-- Affiche le message d'erreur de validation pour le champ "name" -->
                @error('name')
                 <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- // Bouton pour soumettre le formulaire avec un style bleu -->
                <button class="bg-blue-600 text-white py-3 rounded-lg col-span-2 hover:bg-blue-700 transition">Add</button>  
            </form>
        </div>

    </div>

@endsection