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

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categoryID', 'id');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function getAuthImage()
    {
        return $this->productImage;
    }

    use HasFactory;
}
