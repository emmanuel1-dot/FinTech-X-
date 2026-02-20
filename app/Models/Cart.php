<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'user_id'

    ];

    
    //ceci montre ume relation entre la table carts et la table users via la classe 'user'
    // ce qui montre qu'un  cart appartient a un user
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products(): BelongsToMany{ 
        //ceci montre une relation entre la table carts et la table products via la classe 'product'
        return $this->belongsToMany(Product::class,'carts_products','cart_id','product_id') // la table pivot est 'carts_products' et les clés étrangères sont 'product_id' et 'cart_id'
                  ->withPivot('quantity');  // on ajoute la colonne 'quantity' de la table pivot aux résultats de la relation  
    }


}
