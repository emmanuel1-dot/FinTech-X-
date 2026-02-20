<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VisitorController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

// //Route::get('/', function () {
//     return view('welcome');
// });


Route ::get('/', [VisitorController::class,'home']);  // Route pour afficher la page d'accueil aux visiteurs
Route ::get('/about', [VisitorController::class,'about']); // Route pour afficher la page "About" aux visiteurs
Route ::get('/products', [VisitorController::class,'products']); // Route pour afficher les produits aux visiteurs

route::middleware('auth')->group(function (){
    // Route pour admins
    
    Route::prefix('admin')->middleware('role:admin')->group(function (){   // Route pour les admins avec le préfixe "admin" et le middleware "role:admin"
        route::get('/dashboard',[DashboardController::class, 'index']); // Route pour le dashboard de l'admin
        Route::get('/categories',[CategoryController::class,'getCategories'])->name('list-categories'); // Route pour afficher la liste des catégories
        Route::post('/add/categories',[CategoryController::class,'addCategory'])->name('add-category'); // Route pour ajouter une catégorie
        Route::get('/add/categories/{id}',[CategoryController::class,'deleteCategory'])->name('delete-category'); // Route pour supprimer une catégorie
        Route::get('/product', [ProductController::class,'getProducts'])->name('get-products'); // Route pour afficher les produits
        Route::get('/add-product', [ProductController::class,'addProduct'])->name('add-product'); // Route pour ajouter un produit
        Route::post('/store-product', [ProductController::class,'storeProduct'])->name('store-product'); // Route pour stocker un  produit ds la base de donnees 
        Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct'])->name('delete-product'); // Route pour supprimer un product
        Route::get('/edit-product/{id}',[ProductController::class,'editProduct'])->name('edit-product'); // Route pour éditer un product
        Route::post('/update-product/{id}',[ProductController::class,'updateProduct'])->name('update-product'); // Route pour éditer un product

        });
    // Route pour clients
    Route::prefix('clients')->middleware('role:client')->group(function () {
        route::get('/index', [ClientController::class,'index']); // Route pour afficher la page d'accueil du client
        route::get('/products', [ClientController::class,'getProducts'])->name('client-get-product'); // Route pour afficher les produits aux clients

       Route::post('/add-cart', [CartController::class, 'addCart']); // Route pour ajouter le produit au  panier du clients
    });
 });
    