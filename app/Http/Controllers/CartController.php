<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart(Request $request){
        $request->validate([
            'inputQuantity' => 'required|min:0|not_in:0'

        ]);

        $data = $request->all();

        Cart::create([
            'productID' => $data['id'],
            'quantity' => $data['inputQuantity']
        ]);
        return '<script type="text/javascript">alert("Product has been added!");</script>';
    }
}
