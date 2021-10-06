<?php

namespace Database\Seeders;

use App\Models\FrequentlyAskedQuestion;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Organization;
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
        if (User::count() === 0) {
            User::factory()->create([
                'email' => 'help@rezer.nl',
                'role' => 'admin'
            ]);
        }

        Organization::factory()->create()->each(function ($organization) {
            ReservationType::factory(6)
                ->has(ReservationTypeLine::factory()->count(4))
                ->create([
                    'organization_id' => $organization->id
                ]);

            User::factory(5)->create([
                'organization_id' => $organization->id
            ]);

            User::all()->each(function ($user) use ($organization) {
                Order::factory(rand(0, 3))
                    ->create([
                        'user_id' => $user->id,
                        'organization_id' => $organization->id
                    ])
                    ->each(function ($order) {
                        $reservationType = ReservationType::where('type', 'reservation')->get()->random();
                        $rand = rand(1, 4);

                        OrderLine::factory(1)->create([
                            'reservation_type_id' => $reservationType->id,
                            'order_id' => $order->id
                        ]);

                        if ($rand > 1) {
                            $extraReservationType = ReservationType::where('type', 'extra')->get()->random();

                            OrderLine::factory($rand - 1)->create([
                                'reservation_type_id' => $extraReservationType->id,
                                'order_id' => $order->id
                            ]);
                        }
                    });
            });

            FrequentlyAskedQuestion::factory(15)->create([
                'organization_id' => $organization->id
            ]);
        });
    }
}
