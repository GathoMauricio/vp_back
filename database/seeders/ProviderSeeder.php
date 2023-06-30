<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::truncate();
        Provider::create(['proveedor' => 'Microsoft']);
        Provider::create(['proveedor' => 'DELL']);
        Provider::create(['proveedor' => 'HP']);
    }
}
