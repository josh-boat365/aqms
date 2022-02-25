<?php

namespace Database\Factories;

use App\Models\OptionType;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $survey_ids = Survey::all()->pluck('id');
        $option_type_ids = OptionType::all()->pluck('id');

        return [
            'question' => $this->faker->unique()->sentence(),
            'survey_id' => $this->faker->randomElement($survey_ids),
            
            'option_type_id' => $this->faker->randomElement($option_type_ids),
        ];
    }
}
