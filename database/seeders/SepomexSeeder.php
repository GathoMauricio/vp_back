<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Controllers\DataMigrater;
use App\Models\Sepomex;

class SepomexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ini_set('memory_limit', 0);
        $data = DataMigrater::ExcelArray('sepomex.xlsx', 'app/db');
        $this->command->getOutput()->writeln("Extrayendo datos:");
        $this->command->getOutput()->progressStart(count($data));
        foreach ($data as $row) {
            Sepomex::create([
                'id' => $row['id'],
                'idEstado' => $row['idEstado'],
                'estado' => $row['estado'],
                'idMunicipio' => $row['idMunicipio'],
                'municipio' => $row['municipio'],
                'ciudad' => $row['ciudad'],
                'zona' => $row['zona'],
                'cp' => $row['cp'],
                'asentamiento' => $row['asentamiento'],
                'tipo' => $row['tipo'],
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
