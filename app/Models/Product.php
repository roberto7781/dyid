<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productName',
        'productDescription',
        'productPrice',
        'categoryID',
        'productImage'
    ];

    // Product belong to one category
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categoryID', 'id');
    }

    // product can be used by many cart 
    public function cart()
    {
        return $this->hasMany('App\Models\Product');
    }


    // product can be used by many transaction detail
    public function transaction_details(){
        return $this->hasMany('App\Models\TransactionDetail');
    }

    // For image authentication (Because the attribute name we used isn't the default Laravel name)
    public function getAuthImage()
    {
        return $this->productImage;
    }

    use HasFactory;
}
