<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        \App\Models\Status::factory()->create(['status' => 'draft']);
        \App\Models\Status::factory()->create(['status' => 'deployed']);

        \App\Models\OptionType::factory()->create(['type' => 'Text Input']);
        \App\Models\OptionType::factory()->create(['type' => 'Single Select']);
        \App\Models\OptionType::factory()->create(['type' => 'Multiple Select']);
        \App\Models\OptionType::factory()->create(['type' => 'Checkbox']);
        \App\Models\OptionType::factory()->create(['type' => 'Radiobutton']);
        
        \App\Models\Survey::factory(3)->create();

        \App\Models\Question::factory(15)->create();

        \App\Models\Option::factory(30)->create();
    }
}
