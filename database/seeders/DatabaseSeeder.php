<?php

namespace Database\Seeders;

use App\Models\FrequentlyAskedQuestion;
use App\Models\ReservationType;
use App\Models\ReservationTypeLine;
use App\Models\User;
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
         User::factory(10)->create();
         FrequentlyAskedQuestion::factory(15)->create();
         ReservationType::factory(4)
             ->has(ReservationTypeLine::factory()->count(8))
             ->create();
    }
}
