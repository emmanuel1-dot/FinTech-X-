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
          <th class="p-3 border-b">Images</th>
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
          <td class="p-3 border-b w-20 h-20">
            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover" alt="image  product">
          <td class="p-3 border-b">{{ $product->title }}</td>
          <td class="p-3 border-b">{{ $product->category->name  }}</td>
          <td class="p-3 border-b">{{ $product->price }}
          
          </td>
          <td class="p-3 border-b">
            @if ($product->active)
             <span class="bg-blue-300  py-2 px-2 text-[12px] rounded-md">Visible</span>
            @else
             <span class="bg-red-500  py-2 px-2 text-[12px] rounded-md">No Visible</span>
            
            @endif
            
          </td>
          <td class="p-3 border-b flex space-x-2">
            <a href="{{ route('edit-product', $product->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 transition">Edit</a>

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

 