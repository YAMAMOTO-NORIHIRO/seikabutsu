<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration // クラス名を変更
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            // 外部キー制約を削除
            // $table->foreignId('category_id')->constrained()->onDelete('cascade'); // カテゴリID
            $table->integer('category_id')->nullable(); // カテゴリID
            $table->date('deadline')->nullable(); // 締切日
            $table->string('priority')->nullable(); // 優先度
            $table->integer('load_level')->nullable(); // 負荷レベル
        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            if (Schema::hasColumn('tasks', 'category_id')) {
                $table->dropColumn('category_id');
            }
            if (Schema::hasColumn('tasks', 'deadline')) {
                $table->dropColumn('deadline');
            }
            if (Schema::hasColumn('tasks', 'priority')) {
                $table->dropColumn('priority');
            }
            if (Schema::hasColumn('tasks', 'load_level')) {
                $table->dropColumn('load_level');
            }
        });
    }
}

