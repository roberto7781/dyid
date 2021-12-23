<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function getAllTransaction()
    {
        // To get all the transaction where the userID is similar with the curent logged in user from the database
        return Transaction::where('userID', Auth::id())->get();
    }

    public function getAllTransactionDetail($transactionID)
    {
        // To get all the cart where the userID is similar with the curent logged in user from the database
        return TransactionDetail::where(["transactionID" => $transactionID, 'userID' => Auth::id()])->get();
    }

    public function insertTransaction()
    {
        // Creating a cart controller
        $cc = new CartController();

        // Get all cart items
        $carts = $cc->getAllCart();

        // Creating a new Transaction (Inserting it into database)
        $transaction =  Transaction::create([
            'userID' => Auth::id()
        ]);

        // Looping through the cart items
        foreach ($carts as $cart) {

            // Calling a function to create transaction detail
            $this->createTransactionDetail($cart, $transaction);
        }

        // Delete all teh cart items
        $cc->deleteAllCart();

        return redirect('transactionHistory');
    }


    public function createTransactionDetail($cart, $transaction)
    {

        // Creating a new Transaction Detail (Inserting it into database)
        TransactionDetail::create([
            'productID' => $cart->product->id,
            'transactionID' => $transaction->id,
            'quantity' => $cart->quantity,
            'price' => $cart->product->productPrice
        ]);
    }

    // Transaction History View
    public function showTransactionHistory()
    {

        $data = [
            'transactions' => $this->getAllTransaction()
        ];

        return view('transactionHistory', $data);
    }
}
