<?php

namespace Database\Factories;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FrequentlyAskedQuestionFactory extends Factory
{
    use HasFactory;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FrequentlyAskedQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'title' => $this->faker->text(30),
            'content' => $this->faker->text(500),
            'subject' => $this->faker->randomElement(['general', 'kinderfeestjes', 'schoolreisjes'])
        ];
    }
}
