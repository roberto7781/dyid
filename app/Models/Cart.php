<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
        'productID',
        'quantity',
        'userID'
    ];

    // Cart item belong to one product
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'productID', 'id');
    }

    // Cart item belong to one user
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userID', 'id');
    }

    use HasFactory;
}
