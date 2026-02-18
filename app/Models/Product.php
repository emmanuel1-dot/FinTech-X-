<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        'category_id',
        'title',
        'price',
        'image',
        'description'
    ];

    // cette fonction permet de montrer la  relation entre la tble products et la table categories
    // ce qui permet de nous justifier qu'un product appartient a une category
    public function category(): BelongsTo { 
     // cette fonction montre une relation entre la table products et la table categories via la classe 'category'
        return $this->belongsTo(Category::class, 'category_id');  // la clé étrangère est 'category_id' et la clé locale est 'id' par défaut
    }
   public function carts(): BelongsToMany  
   // cette fonction montre une relation entre la table products et la table carts via la classe 'cart'
   {
    return $this->belongsToMany(Product::class,'carts_products b ','product_id',''); // la table pivot est 'carts_products' et les clés étrangères sont 'product_id' et 'cart_id'
   }

}
