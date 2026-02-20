<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request)
    { 
        $cart = Cart::create([
            'user_id'=> $request->userId // Récupère l'ID de l'utilisateur à partir de la requête et crée un nouveau panier pour cet utilisateur
            
        ]);

        $cartProducts = [];   
        foreach($request->products as $product) {
            $cartProducts[$product['id']] = [
                'quantity'=> $product['quantity']
            ];
        }
            
        $cart->products()->sync($cartProducts);
        return [
            'message'=> "Panier bien enregistre",
            "success"=>true,
            "products" => $cartProducts

        ];
    }
}
