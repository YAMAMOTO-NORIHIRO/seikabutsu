<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration // クラス名はそのままに
{
    public function up()
    {
        // tasksテーブルを作成する
        Schema::create('tasks', function (Blueprint $table) {
            //$table->id();
            $table->integer('category_id')->nullable();
            $table->date('deadline')->nullable();
            $table->string('priority')->nullable();
            $table->integer('load_level')->nullable();
            //$table->timestamps(); // created_at と updated_at カラムを追加
        });
    }

    public function down()
    {
        // tasksテーブルを削除する
        Schema::dropIfExists('tasks');
    }
}

