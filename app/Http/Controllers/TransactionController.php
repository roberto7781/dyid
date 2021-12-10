<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //

    public function getAllTransaction(){

        return Transaction::where('userID', Auth::id())->get();
    }

    public function getAllTransactionDetail($transactionID){

        return TransactionDetail::where(["transactionID" => $transactionID, 'userID' => Auth::id()])->get();
    }

    public function insertTransaction(){

        $cc = new CartController();

        $carts = $cc->getAllCart();

       $transaction =  Transaction::create([
            'userID' => Auth::id()
        ]);

        foreach($carts as $cart){
            $this->createTransactionDetail($cart, $transaction);
        }

        $cc->deleteAllCart();

        return redirect('transactionHistory');
    }


    public function createTransactionDetail($cart, $transaction){
        TransactionDetail::create([
            'productID' => $cart->product->id,
            'transactionID' => $transaction->id,
            'quantity' => $cart->quantity,
            'price' => $cart->product->productPrice
        ]);
    }

    public function showTransactionHistory(){

        $data = [
            'transactions' => $this->getAllTransaction()
        ];

        return view('transactionHistory',$data);
    }


}
