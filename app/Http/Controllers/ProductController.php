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

}
