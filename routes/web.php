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

    // Task関連のルート
    Route::get('/tasks/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.myTasks'); // myTasksメソッドのルート追加
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); // タスク詳細のルートを追加
    Route::resource('tasks', TaskController::class); // 既存のタスク関連のルート
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');//タスク削除のルートを定義
});

require __DIR__.'/auth.php';

