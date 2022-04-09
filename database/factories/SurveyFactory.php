<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status_ids = Status::all()->pluck('id');

        return [
            'name' => $this->faker->unique()->word . ' survey',
            'description' => $this->faker->sentence(10),
            'status_id' => $this->faker->randomElement($status_ids),
        ];
    }
}
