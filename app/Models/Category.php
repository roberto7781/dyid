<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryName'

    ];

    // One category can be used by many product
    public function product() {
        return $this->hasMany('App\Models\Product');
    }

}
