<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $question_ids = Question::all()->pluck('id');

        return [
            'option' => $this->faker->unique()->word,
            'question_id' => $this->faker->randomElement($question_ids),
        ];
    }
}
