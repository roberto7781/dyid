<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart(Request $request){
        $request->validate([
            'inputQuantity' => 'required|min:0|not_in:0'

        ]);

        $data = $request->all();
    }
}
