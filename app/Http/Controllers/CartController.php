<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getAllCart(){
        // To get all the cart where the userID is similar with the curent logged in user from the database
        $allCart = Cart::where('userID', Auth::id())->get();

        return $allCart;
    }

    // Getting cart view 
    public function showCartView(){
        $data = [
            'carts' => $this->getAllCart()
        ];

        return view("myCart", $data);
    }

    public function addToCart(Request $request){
        // Quantity Validation
        $request->validate([
            'inputQuantity' => 'required|integer|min:1'

        ]);

        $flag = false;

        // Get all cart items
        $allCart = $this->getAllCart();

        // To check whether a product has been added in a cart before or not
        foreach ($allCart as $cart) {
            if ($cart->productID == $request->id) {
                $currentQty = $cart->quantity;
                $flag = true;
                break;
            }
        }

        // To get the data Inputted by the user
        $data = $request->all();

        // Updating quantity to cart
        if ($flag == true) {
            $selectedCart = Cart::where('productID', $request->id)->first();
            $selectedCart->update([
                'quantity' => $data['inputQuantity'] + $currentQty
            ]);
        }

        // Creating a new cart item (Inserting it into database)
        else {
            Cart::create([
                'productID' => $request->id,
                'quantity' => $data['inputQuantity'],
                'userID' => Auth::id()
            ]);
        }

        return back();
    }



    public function deleteCart(Request $request)
    {
        // Get the cart item id that want to be deleted

        $id = $request->id;

        // Select the cart item from database
        $selectedCart = Cart::where(['productID' => $request->id, 'userID' => Auth::id()])->first();

        // Delete the cart item from database
        $selectedCart->delete();

        return back();
    }


    public function editCartView(Request $request){
        // Get the cart item id that want to be updated
        $id = $request->id;

        // Select the cart item from database
        $selectedCart = Cart::where(['productID' => $request->id, 'userID' => Auth::id()])->first();

        // Put the cart item information to an array
        $data = [
            'selectedCart' => $selectedCart
        ];

        return view('editCart', $data);
    }

    public function updateCart(Request $request){

        // Quantity Validation
        $request->validate([
            'updateQuantity' => 'required|integer|min:1'

        ]);

        // Get the cart item id that want to be updated
        $id = $request->id;

        // To get the data Inputted by the user
        $data = $request->all();

        // Select the cart item from database
        $selectedCart = Cart::where(['productID' => $request->id, 'userID' => Auth::id()])->first();

        // Updating the cart item in database
        $selectedCart->update([
            'quantity' => $data['updateQuantity']
        ]);


        return redirect("viewCart");
    }


    public function deleteAllCart(){
        // Delete all cart items from database
        Cart::where('userID', Auth::id())->delete();
    }
}
