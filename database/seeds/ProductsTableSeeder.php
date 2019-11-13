<?php

use App\Manufacturers;
use App\Products;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Products::class, 20)->create();
        factory(Manufacturers::class, 20)->create();

        Products::each(function (Products $product) {
            $product->update(['manufacturer_id' => Manufacturers::inRandomOrder()->first()->id]);
        });
    }
}
