<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new Brand();
        $brand->image = "";
        $brand->name = 'Adidas';
        $brand->save();

        $brand = new Brand();
        $brand->image = "";
        $brand->name = 'Converse';
        $brand->save();

        $brand = new Brand();
        $brand->image = "";
        $brand->name = 'Nike';
        $brand->save();

        $brand = new Brand();
        $brand->image = "";
        $brand->name = 'DC';
        $brand->save();

        $brand = new Brand();
        $brand->image = "";
        $brand->name = 'Puma';
        $brand->save();

        $brand = new Brand();
        $brand->image = "";
        $brand->name = 'Balenciaga';
        $brand->save();
    }
}
