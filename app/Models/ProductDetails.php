<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $guarded = [];

     public function ProductList(){
        return $this->belongsTo(ProductList::class);
    }
}
