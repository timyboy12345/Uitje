<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'help@rezer.nl',
            'name' => 'Tim Arendsen',
            'role' => 'admin'
        ]);

        Organization::factory()->create([
            'subdomain' => 'test'
        ]);
    }
}
