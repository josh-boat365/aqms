<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AqmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Survey::factory()->create([
            'id' => 1,
            'name' => 'ATU Tracer',
            'description' => 'The Tracer Study seeks to learn about the extent to which the educational experience at Accra Technical University (ATU) has contributed to the career developments of its alumni.',
            'status_id'=> 1
        ]);

        \App\Models\Section::factory()->create([
            'survey_id' => 1,
            'title' => 'Section A',
            'description' => 'General Information'
        ]);  


    }
}
