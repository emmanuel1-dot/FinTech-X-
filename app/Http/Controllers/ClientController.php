<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index'); // Affiche la vue "index" située dans le dossier "client"

         // Affiche la vue "index" située dans le dossier "clients"
    }

    public function getProducts()
    {
        $products = Product::where('active', '=', 1)->get(); // Récupère tous les produits de la base de données avec le statut "active"
        return view('clients.product.listProduct', compact('products')); // Affiche la vue "dashboard" située dans le dossier "client"
    }

    
}
