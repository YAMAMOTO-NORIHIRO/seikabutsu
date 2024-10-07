<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration // クラス名はそのままに
{
    public function up()
    {
        // 既存のtasksテーブルにカラムを変更する
        Schema::table('tasks', function (Blueprint $table) {
            // カラムが存在するかを確認し、必要に応じて変更
            if (!Schema::hasColumn('tasks', 'category_id')) {
                $table->integer('category_id')->nullable()->after('is_completed');
            }
            if (!Schema::hasColumn('tasks', 'deadline')) {
                $table->date('deadline')->nullable()->after('category_id');
            }
            if (!Schema::hasColumn('tasks', 'priority')) {
                $table->string('priority')->nullable()->after('deadline');
            }
            if (!Schema::hasColumn('tasks', 'load_level')) {
                $table->integer('load_level')->nullable()->after('priority');
            }
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // 追加したカラムを削除する
            $table->dropColumn(['category_id', 'deadline', 'priority', 'load_level']);
        });
    }
}

