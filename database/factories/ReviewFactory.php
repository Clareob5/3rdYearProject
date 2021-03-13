<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'review'=> $this->faker->realText($maxNbChars = 100, $indexSize = 2),
          'rating' => $this->faker->randomFloat($nbMaxDecimals = 4, $min = 1, $max = 5),
          'user_id' => $this->faker->numberBetween($min = 3, $max = 11),
          'movie_id' => $this->faker->numberBetween($min = 1, $max = 20),
          'created_at' => $this->faker->date($format = 'Y-m-d', $max = 'today'),

        ];
    }
}
