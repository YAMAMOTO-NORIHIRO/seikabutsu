<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController; // TaskControllerの追加
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ログイン後の初期画面を/tasksに変更
Route::get('/dashboard', function () {
    return redirect()->route('tasks.index'); // tasks.index にリダイレクト
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile関連のルート
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Task関連のルート（個別定義に変更）
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // タスク一覧
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // タスク作成ページ
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // タスク保存
    Route::get('/tasks/show/{task}', [TaskController::class, 'show'])->name('tasks.show'); // タスク詳細
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // タスク編集ページ
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // タスク更新
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // タスク削除
    
    // カスタムメソッドのルート
    Route::get('/tasks/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.my_tasks'); // 自分のタスク
    Route::get('/tasks/all-tasks', [TaskController::class, 'allTasks'])->name('tasks.alltasks_show'); // 全員のタスク一覧
});

require __DIR__.'/auth.php';



