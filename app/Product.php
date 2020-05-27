<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'status'];
    protected $attributes = [
        'is_deleted' => 0,
    ];
    public function product_details()
    {
        return $this->hasOne(ProductDetail::class);
    }
}
