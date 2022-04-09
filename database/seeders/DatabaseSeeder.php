<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        \App\Models\User::factory()->create([
            'firstName' => "Admin",
            'lastName' => "Muhammed",
            'otherName' => "Code",
            'user_type' => 'Admin',
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("123"), // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory()->create([
            'firstName' => "User",
            'lastName' => "Muhammed",
            'otherName' => "Senpai",
            'user_type' => 'Alumnus',
            'email' => "user1@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("123"), // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Status::factory()->create([
            'id' => 1,
            'status' => 'Draft'
        ]);
        \App\Models\Status::factory()->create([
            'id' => 2,
            'status' => 'Deployed'
        ]);
        \App\Models\Status::factory()->create([
            'id' => 3,
            'status' => 'Archived'
        ]);

        \App\Models\OptionType::factory()->create([
            'id' => 1,
            'type' => 'Text (Single Line)'
        ]);
        \App\Models\OptionType::factory()->create([
            'id' => 2,
            'type' => 'Text (Multiple Line)'
        ]);
        \App\Models\OptionType::factory()->create([
            'id' => 3,
            'type' => 'Single Select (Radio Button)'
        ]);
        \App\Models\OptionType::factory()->create([
            'id' => 4,
            'type' => 'Single Select (Drop down)'
        ]);
        \App\Models\OptionType::factory()->create([
            'id' => 5,
            'type' => 'Multiple Select (Check Box)'
        ]);
        \App\Models\OptionType::factory()->create([
            'id' => 6,
            'type' => 'Grid'
        ]);
        
        

        \App\Models\NotificationType::factory()->create([
            'id' => 1,
            'type' => 'registration'
        ]);
        \App\Models\NotificationType::factory()->create([
            'id' => 2,
            'type' => 'submission'
        ]);
        \App\Models\NotificationType::factory()->create([
            'id' => 3,
            'type' => 'deployment']);

        
    }
}
