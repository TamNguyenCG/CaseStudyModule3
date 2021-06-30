<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Sports Shoes';
        $category->save();

        $category = new Category();
        $category->name = 'Ultra Boost Shoes';
        $category->save();

        $category = new Category();
        $category->name = 'Vans Shoes';
        $category->save();

        $category = new Category();
        $category->name = 'Converse Shoes';
        $category->save();

        $category = new Category();
        $category->name = 'High-Top Shoes';
        $category->save();

        $category = new Category();
        $category->name = 'Big Ball Chunky Shoes';
        $category->save();
    }
}
