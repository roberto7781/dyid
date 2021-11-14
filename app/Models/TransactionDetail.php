<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{

    protected $fillable = [
        'transactionID',
        'productID',
        'quantity',
        'price'
    ];

    
    public function transaction(){
        return $this->belongsTo('App\Models\Transaction');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product', 'productID', 'id');
    }

    use HasFactory;
}
