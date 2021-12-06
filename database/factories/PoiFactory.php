<?php

namespace Database\Factories;

use App\Models\Poi;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Poi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->words(3, true),
            'shortname' => $this->faker->word,
            'description' => $this->faker->text,
            'content' => $this->faker->realText(1000),
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'is_enabled' => $this->faker->boolean(90)
        ];
    }
}
