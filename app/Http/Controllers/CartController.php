<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function getAllCart(){
        $allCart = Cart::all();

        return $allCart;
    }

    public function addToCart(Request $request){
        $request->validate([
            'inputQuantity' => 'required|min:0|not_in:0'

        ]);

        $flag = false;
        $allCart = $this->getAllCart();

        foreach($allCart as $cart){
            if($cart->productID == $request->id){
                $currentQty = $cart->quantity;
                $flag = true;
                break;
            }
        }
    
        $data = $request->all();
        
        if($flag == true){
            $selectedCart = CaRT::where('productID', $request->id)->first();
            $selectedCart->update([
                'quantity' => $data['inputQuantity'] + $currentQty
            ]);
        }
        else{
            Cart::create([
                'productID' => $request->id,
                'quantity' => $data['inputQuantity']
            ]);
        }

      
        return back();
    }
}
