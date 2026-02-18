@extends('layouts.main')

@section('title', 'Dashboard client')
@section('content')

<!-- Grid -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- Card Produit -->
             @foreach ($products as $product )
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden group">
                
                <!-- Image -->
                <div class="relative overflow-hidden">
                    <img src="{{ asset('storage/'.$product->image) }}"
                         alt="Nom du produit"
                         class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">

                    <!-- Badge catégorie -->
                    <span class="absolute top-3 left-3 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full">
                        {{ $product->category->name }}
                    </span>
                </div>

                <!-- Contenu -->
                <div class="p-5 flex flex-col justify-between h-[250px]">

                    <div>
                        <!-- Nom -->
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            {{ $product->title }}
                        </h3>

                        <!-- Description -->
                        <p class="text-gray-500 text-sm line-clamp-3">
                           {{ $product->description }}
                    </div>

                    <!-- Prix + Boutons -->
                    <div class="mt-5">
                        
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xl font-bold text-indigo-600">
                                {{ $product->price }}
                            </span>
                        </div>

                        <div class="flex gap-2">
                            <!-- Bouton détails -->
                            <button class="w-1/2 border border-indigo-600 text-indigo-600 py-2 rounded-lg text-sm font-medium hover:bg-indigo-50 transition">
                                Voir détails
                            </button>

                            <!-- Bouton Add to cart -->
                            <button class="w-1/2 bg-indigo-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                                Add to cart
                            </button>
                        </div>

                    </div>

                </div>
            </div>
             @endforeach
            
            <!-- Fin Card -->

        </div>

@endsection

 