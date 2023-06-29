<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::create([
            'categoria' => 'CONSULTORÍA Y SOPORTE TI',
            'sigla' => 'T',
        ]);
        Category::create([
            'categoria' => 'CÁMARAS Y VIGILANCIA',
            'sigla' => 'T',
        ]);
        Category::create([
            'categoria' => 'PROYECTOS Y REDES',
            'sigla' => 'P',
        ]);
    }
}
