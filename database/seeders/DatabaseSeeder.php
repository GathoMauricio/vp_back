<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ServiceTypeSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ClaseSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(TicketSeeder::class);
    }
}
