<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => '事務作業', 'color' => '赤'],
            ['id' => 2, 'name' => '技術サポート', 'color' => '黄'],
            ['id' => 3, 'name' => '営業活動', 'color' => '青'],
            ['id' => 4, 'name' => '会議', 'color' => '黒'],
            ['id' => 5, 'name' => '顧客対応', 'color' => '白'],
            ['id' => 6, 'name' => '研修', 'color' => '緑'],
            ['id' => 7, 'name' => 'その他作業', 'color' => '茶'],
        ]);
    }
}