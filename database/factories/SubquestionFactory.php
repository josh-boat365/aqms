<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubquestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $questions = Question::where('option_type_id', 6)->pluck('id');

        return [
            'question' => $this->faker->unique()->word,
            'question_id' => $this->faker->randomElement($questions),
        ];
    }
}
