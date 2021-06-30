<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;


class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $style = new Style();
        $style->name = 'Men';
        $style->save();

        $style = new Style();
        $style->name = 'Women';
        $style->save();
    }
}
