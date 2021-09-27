<?php

namespace Database\Seeders;

use App\Models\FrequentlyAskedQuestion;
use App\Models\Order;
use App\Models\OrderLine;
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
        User::factory(5)->create();
        ReservationType::factory(6)
            ->has(ReservationTypeLine::factory()->count(4))
            ->create();

        $reservationType = ReservationType::where('type', 'reservation')->first();

        User::all()->each(function ($user) use ($reservationType) {
            Order::factory(2)
                ->has(OrderLine::factory([
                    'reservation_type_id' => $reservationType->id
                ])->count(1))
                ->create([
                    'user_id' => $user->id,
                ]);
        });

        FrequentlyAskedQuestion::factory(15)->create();
    }
}
