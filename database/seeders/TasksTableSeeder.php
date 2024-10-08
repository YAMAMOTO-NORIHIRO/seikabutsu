<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'title' => 'testタスク1',
                'assignee' => 'test担当者A',  // 担当者
                'category_id' => 1,       // カテゴリID
                'deadline' => '2024-10-31', // 締切
                'priority' => '高',         // 優先度
                'load_level' => 2,         // 負荷レベル
                'description' => 'タスク1の説明',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'タスク2',
                'assignee' => '担当者B',  // 担当者
                'category_id' => 2,       // カテゴリID
                'deadline' => '2024-11-05', // 締切
                'priority' => '中',         // 優先度
                'load_level' => 1,         // 負荷レベル
                'description' => 'タスク2の説明',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}