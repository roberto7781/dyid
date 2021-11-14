<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'userID'
    ];
    public function transaction_details(){
        return $this->hasMany('App\Models\TransactionDetail', 'transactionID', 'id');
    }
    use HasFactory;
}
