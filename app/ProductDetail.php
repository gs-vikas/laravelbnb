<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = ['stock', 'type', 'size', 'product_id'];
    // protected $attributes = [
    //     'product_id' => null,
    // ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
