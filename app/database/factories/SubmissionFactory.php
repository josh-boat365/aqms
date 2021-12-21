<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_ids = User::all()->pluck('id');
        $survey_ids = Survey::all()->pluck('id');
        return [
            'user_id' => $this->faker->randomElement($user_ids),
            'survey_id' => $this->faker->randomElement($survey_ids),
            'state' => 'submitted'
            // survey id
        ];
    }
}
