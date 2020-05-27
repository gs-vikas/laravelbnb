<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductDetail;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 10)->create()->each(function ($product) {
            $product->product_details()->save(factory(App\ProductDetail::class)->make());
        });
    }
}
