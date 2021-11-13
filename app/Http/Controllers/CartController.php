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

    public function showCartView(){
        $data = [
            'carts' => $this->getAllCart()
       ];

        return view("myCart", $data);
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
            $selectedCart = Cart::where('productID', $request->id)->first();
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


    
    public function deleteCart(Request $request){
        $id = $request->id;

        $selectedCart = Cart::where('productID', $request->id)->first();

      
        $selectedCart->delete();

        return back();

    }

    
    public function editCartView(Request $request){

        $id = $request->id;

        $selectedCart = Cart::where('productID', $id)->first();

        $data = [
            'selectedCart' => $selectedCart
          ];

        return view('editCart', $data);

    }

    public function updateCart(Request $request){

        $request->validate([
            'updateQuantity' => 'required|min:0|not_in:0'

        ]);

        $id = $request->id;

        $data = $request->all();
        
        $selectedCart = Cart::where('productID', $id)->first();
        $selectedCart->update([
            'quantity' => $data['updateQuantity']
        ]);

    
        return redirect("viewCart");
    }

  
}
