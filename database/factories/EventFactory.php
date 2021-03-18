<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'date' => $this->faker->date($format = 'Y-m-d'),
          'time' => $this->faker->time($format = 'H:i', $min = 'now'),
          'group_id' => $this->faker->numberBetween($min = 1, $max = 10)
        ];
    }
}