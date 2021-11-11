<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
        'productID',
        'quantity'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'productID', 'id');
    }

    use HasFactory;
}
