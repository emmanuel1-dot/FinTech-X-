@extends('layouts.main')

@section('title', 'AddProduct')
@section('content')




  <!-- Formulaire Utilisateur Avancé -->
  <div class="bg-white p-6 rounded-lg shadow-lg mb-6 ">
    <h2 class="text-xl font-bold mb-4">Add Product</h2>

    <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
      @csrf

      <div class="col-span-2">
        <select name="category" class="p-3 border border-gray-300 rounded-lg w-full">
          <option>Choose Category</option>
          @foreach ( $categories as $category )
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        
        </select>
         @error('category')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>
      <div class="col-span-2">
        <input  type="text" name="title" placeholder="Title" class="p-3 border border-gray-300 rounded-lg w-full">
        @error('title')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>
      <div class="col-span-2">
        <input type="number" name="price" placeholder="Price" class="p-3 border border-gray-300 rounded-lg w-full">
        @error('price')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>
      <div class="col-span-2">
        <textarea placeholder="Description" name="description"
          class="p-3 border border-gray-300 rounded-lg w-full"></textarea>
          @error('description')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>
      <div class="col-span-2">
        <input type="file" name="image" accept="image/*" class="col-span-2 p-3 border border-gray-300 rounded-lg w-full">
        @error('image')
            <!-- // Affiche le message d'erreur de validation pour le champ "name" si une erreur existe -->
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
      </div>

      <button class="bg-blue-600 text-white py-3 rounded-lg col-span-2 hover:bg-blue-700 transition">Add</button>
    </form>
  </div>

@endsection