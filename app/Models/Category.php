<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model

{
    protected $table = 'categories';
    protected $fillable=[
        'name'
    ];

    
    // cette fonction permet de montrer la  relation entre la tble categories et la table  products
    // ce qui permet de nous justifier qu'un une category peut avoir plusieurs products  
    public function products(): HasMany
     // cette fonction montre une relation entre la table categories et la table products via la classe 'product'
    {
        return $this->hasMany(Product::class, 'category_id', 'id'); // la clé étrangère est 'category_id' et la clé locale est 'id'
    }
}
