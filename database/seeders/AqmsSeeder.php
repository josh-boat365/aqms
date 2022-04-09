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
        \App\Models\Survey::factory(3)->create();

        \App\Models\Question::factory(15)->create();

        \App\Models\Option::factory(30)->create();

        \App\Models\Subquestion::factory(20)->create();

        \App\Models\Submission::factory(20)->create(); 

        // \App\Models\Notification::factory()->create([
        //     'notification' => 'new alumnus registered',
        //     'user_id' => 1,
        //     'notification_type_id' => 1,
        // ]);

        // \App\Models\Notification::factory()->create([
        //     'notification' => 'new survey submitted',
        //     'user_id' => 1,
        //     'survey_id' => 1,
        //     'notification_type_id' => 2,
        // ]);
    }
}
