@extends('layouts.main')

@section('title', 'AddProduct')
@section('content')




  <!-- Formulaire Utilisateur Avancé -->
  <div class="bg-white p-6 rounded-lg shadow-lg mb-6 ">
    <h2 class="text-xl font-bold mb-4">Edit Product</h2>

    <form action="{{ route('update-product', $product->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
      @csrf

      <div class="col-span-2">
        <select name="category" class="p-3 border border-gray-300 rounded-lg w-full">
          <!-- <option>Choose Category</option> -->
          @foreach ( $categories as $category )
          <!-- // La condition pour sélectionner la catégorie actuelle du produit dans le dropdown -->
          <option @selected($product->category_id === $category->id) value="{{ $category->id }}">{{ $category->name }}</option> //
          @endforeach
        
        </select>
         @error('category')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>
      <div class="col-span-2">
        <!-- // Affiche la valeur actuelle du titre du produit dans le champ de saisie pour l'édition -->
        <input  type="text" name="title" value="{{ $product->title }}" placeholder="Title" class="p-3 border border-gray-300 rounded-lg w-full"> 
        @error('title')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>
      <div class="col-span-2">
        <!-- // Affiche la valeur actuelle du prix du produit dans le champ de saisie pour l'édition -->
        <input type="number" name="price" value="{{ $product->price }}" placeholder="Price" class="p-3 border border-gray-300 rounded-lg w-full">
        @error('price')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>
      <div class="col-span-2">
        <!-- // Affiche la valeur actuelle de la description du produit dans le champ de saisie pour l'édition -->
        <textarea placeholder="Description" name="description" class="p-3 border border-gray-300 rounded-lg w-full">{{ $product->description }}</textarea>
          @error('description')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror

          <div class="w-50% h-auto">
            <img src="{{ asset('storage/' . $product->image) }}" width="100" alt="image  product">

          </div>
      </div>
      <div class="col-span-2">
        <input type="file" name="image" accept="image/*" class="col-span-2 p-3 border border-gray-300 rounded-lg w-full">
        @error('image') 
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>

      <!--  <button class="bg-blue-600 text-white py-3 rounded-lg col-span-2 hover:bg-blue-700 transition">Add</button> -->

      <button class="bg-blue-600 text-white py-3 rounded-lg col-span-2 hover:bg-blue-700 transition">Update Product</button>
    </form>
  </div>

@endsection