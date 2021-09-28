<?php

namespace Database\Factories;

use App\Models\ReservationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReservationType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(20);
        return [
            'id' => $this->faker->uuid,
            'title' => $title,
            'description' => $this->faker->text(200),
            'slug' => strtolower(preg_replace('/[^0-9a-zA-Z]/', '', $title)),
            'type' => $this->faker->randomElement(ReservationType::$reservationTypesEnum),
            'date_type' => $this->faker->randomElement([null, 'date', 'datetime']),
            'has_participants' => $this->faker->boolean,
            'has_accompanists' => $this->faker->boolean,
            'price' => $this->faker->randomFloat(2, 0, 45)
        ];
    }
}
