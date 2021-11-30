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
        
        \App\Models\Status::factory()->create(['status' => 'Draft']);
        \App\Models\Status::factory()->create(['status' => 'Deployed']);
        \App\Models\Status::factory()->create(['status' => 'Archived']);

        \App\Models\OptionType::factory()->create(['type' => 'Text (Single Line)']);
        \App\Models\OptionType::factory()->create(['type' => 'Text (Multiple Line)']);
        \App\Models\OptionType::factory()->create(['type' => 'Single Select (Radio Button)']);
        \App\Models\OptionType::factory()->create(['type' => 'Multiple Select (Check Box)']);
        \App\Models\OptionType::factory()->create(['type' => 'Grid']);
        
        \App\Models\Survey::factory(3)->create();

        \App\Models\Question::factory(15)->create();

        \App\Models\Option::factory(30)->create();
    }
}
