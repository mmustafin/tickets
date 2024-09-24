<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Theater;
use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
        ]);

        User::factory()
            // Adding ->count(5) will create 5 tasks per user
            ->has(Theater::factory())
            ->count(10)
            ->create();

        Event::factory()->count(10)->create();

        Ticket::factory()->count(1000)->create();




    }
}
