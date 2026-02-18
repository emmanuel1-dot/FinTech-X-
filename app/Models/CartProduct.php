<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $table = "carts_products"; // Spécifie le nom de la table associée à ce modèle
    protected $fillable = [ // Spécifie les champs qui peuvent être massivement assignés
        'cart_id',
        'product_id',
        'quantity'
    ];
}
