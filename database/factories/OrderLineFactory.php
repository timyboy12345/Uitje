<?php

namespace Database\Factories;

use App\Models\OrderLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'date' => $this->faker->dateTimeThisYear,
            'participants' => $this->faker->numberBetween(4, 130),
            'accompanists' => $this->faker->numberBetween(1, 25)
        ];
    }
}
