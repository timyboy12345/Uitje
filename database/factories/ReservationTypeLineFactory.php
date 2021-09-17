<?php

namespace Database\Factories;

use App\Models\ReservationTypeLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationTypeLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservationTypeLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'label' => $this->faker->text(20),
            'placeholder' => $this->faker->text(40),
            'description' => $this->faker->text(60),
            'type' => $this->faker->randomElement(ReservationTypeLine::$reservationTypeLineEnum)
        ];
    }
}
