<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        // tasksテーブルを作成する
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // IDカラム
            $table->string('title'); // タスクタイトル
            $table->string('assignee'); // 担当者
            $table->integer('category_id')->nullable(); // カテゴリID
            $table->date('deadline')->nullable(); // 締切
            $table->string('priority')->nullable(); // 優先度
            $table->integer('load_level')->nullable(); // 負荷レベル
            $table->text('description')->nullable(); // 詳細
            $table->timestamps(); // created_at と updated_at カラム
        });
    }

    public function down()
    {
        // tasksテーブルを削除する
        Schema::dropIfExists('tasks');
    }
}

