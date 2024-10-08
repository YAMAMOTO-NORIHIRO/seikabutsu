<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Userのシーディング
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // TasksTableSeederを呼び出す
        $this->call(TasksTableSeeder::class);
    }
}
