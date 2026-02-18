<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()// Affiche la liste des produits
    {
        $products = Product::all();
        return view('admin.product.listProduct', compact('products')); // Affiche la vue "listProduct" située dans le dossier "admin/product"
    }

    public function addProduct()// Affiche le formulaire pour ajouter un nouveau produit
    {
        $categories = Category::all();
        return view('admin.product.addProduct', compact('categories')); // Affiche la vue "addProduct" située dans le dossier "admin/product"
    }
  
   public function storeProduct(Request $request) {
    $request->validate([
        'category'=>['required','numeric'],
        'title'=> ['required','string', 'min:3'],
        'price'=>['required','numeric'],
        'image'=>['required','image', 'mimes:png,jpeg,jpg', 'max:2048'],
        'description'=>['required'],
    ]);
    $imagePath= $request->file('image')->store('products','public');

    Product::create([
        'category_id'=> $request->category,
        'title'=> $request->title,
        'price'=> $request->price,
        'image'=> $imagePath,
        'description'=> $request->description,
        'active'=>1,
    ]);
    return redirect()->route('get-products')->with('status','Product added successful');
   }

       public function deleteProduct($id)
    {
        $product = Product::find($id);// rrecupérer le product à supprimer
        $product->delete();// supprimer le product de la base de données
        return redirect()->route('get-products')->with('status', 'Product deleted successfully');// redirection vers la liste des produits avec un message de succès
    }

    public function editProduct($id)
    {
        
        $product = Product::find($id); // Récupérer le produit à éditer
        $categories = Category::all(); // Récupérer toutes les catégories pour le dropdown
        return view('admin.product.editProduct', compact('product', 'categories')); // Afficher la vue d'édition du produit avec les données du produit et les catégories
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'category'=>['required','numeric'],
            'title'=> ['required','string', 'min:3'],
            'price'=>['required','numeric'],
            'description'=>['required'],
        ]);

        $product = Product::find($id); // Récupérer le produit à mettre à jour
        $imagePath = $product->image; // Conserver le chemin de l'image actuelle

        // Si une nouvelle image est téléchargée, la stocker et mettre à jour le chemin de l'image
        if ($request->hasFile('image')) {
            $request->validate([
                'image'=>['image', 'mimes:png,jpeg,jpg', 'max:2048'],
            ]);
            $imagePath = $request->file('image')->store('products', 'public');
           
        }

        // Mettre à jour les champs du produit
        $product->category_id = $request->category;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;


        $product->save(); // Enregistrer les modifications dans la base de données

        return redirect()->route('get-products')->with('status', 'Product updated successfully'); // Redirection vers la liste des produits avec un message de succès
    }

}
