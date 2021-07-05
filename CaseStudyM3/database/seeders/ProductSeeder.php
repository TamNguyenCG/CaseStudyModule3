<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = 'Old School';
        $product->description = 'New Arrival';
        $product->color = 'Whitle/Black';
        $product->price = 150;
        $product->stocks = 50;
        $product->image = "converse4.jpg";
        $product->category_id = 1;
        $product->brand_id = 2;
        $product->style_id = 1;
        $product->save();

        $product = new Product();
        $product->name = 'Fancy Bling';
        $product->description = 'New Arrival';
        $product->color = 'Red/Black';
        $product->price = 250;
        $product->stocks = 70;
        $product->image = "nikeair5.jpg";
        $product->category_id = 2;
        $product->brand_id = 1;
        $product->style_id = 1;
        $product->save();

        $product = new Product();
        $product->name = 'Luxury Style';
        $product->description = 'New Arrival';
        $product->color = 'Pink';
        $product->price = 180;
        $product->stocks = 30;
        $product->image = "4.jpg";
        $product->category_id = 3;
        $product->brand_id = 3;
        $product->style_id = 2;
        $product->save();

    }
}
