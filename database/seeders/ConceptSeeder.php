<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concept;

class ConceptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Concept::truncate();
        Concept::create(['concepto' => 'COMBI']);
        Concept::create(['concepto' => 'METRO']);
        Concept::create(['concepto' => 'M. BUS']);
        Concept::create(['concepto' => 'MX. BUS']);
        Concept::create(['concepto' => 'CB. BUS']);
        Concept::create(['concepto' => 'PRODUCTO']);
        Concept::create(['concepto' => 'ALIMENTO']);
    }
}
