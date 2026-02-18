@extends('layouts.main')

@section('title', 'ListProduct')
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

<!-- <div class="space-y-3 mb-6">
  <div class="p-4 rounded bg-green-100 text-green-800 shadow">Succès : l'utilisateur a été ajouté avec succès !</div>

</div> -->


<!-- Tableau Utilisateurs Avancé avec boutons -->
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between mb-3">

        <h2 class="text-xl font-bold mb-4">Products list</h2>
        <a href="{{ route('add-product') }}" class=" bg-blue-600 hover:bg-red-700 text-white py-2 px-3 rounded transition">Add product</a>
        
    </div>
  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="p-3 border-b">Title</th>
          <th class="p-3 border-b">Category</th>
          <th class="p-3 border-b">Price</th>
          <th class="p-3 border-b">Status</th>
          <th class="p-3 border-b">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product )
         <tr class="hover:bg-gray-100">
          <td class="p-3 border-b">{{ $product->title }}</td>
          <td class="p-3 border-b">{{ $product->category->name  }}</td>
          <td class="p-3 border-b">{{ $product->price }}</td>
          <td class="p-3 border-b">{{ $product->active }}</td>
          <td class="p-3 border-b flex space-x-2">
            <button class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition">Edit</button>
            <button class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600 transition">See</button>
            <a href="{{ route('delete-product', $product->id) }}"> 
            <button class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition">Delete</button>

            </a>
          </td>
        </tr>
        
        @endforeach
       
        <!-- <tr class="hover:bg-gray-100">
          <td class="p-3 border-b">Marie Dupont</td>
          <td class="p-3 border-b">marie@example.com</td>
          <td class="p-3 border-b">+257 987 654</td>
          <td class="p-3 border-b">Woman</td>
          <td class="p-3 border-b flex space-x-2">
            <button class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition">Edit</button>
            <button class="bg-green-500 text-white py-1 px-3 rounded hover:bg-green-600 transition">See</button>
            <button class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600 transition">Delete</button>
          </td>
        </tr> -->
      </tbody>
    </table>
  </div>
</div>
@endsection

 