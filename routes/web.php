<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController; // TaskControllerの追加
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile関連のルート
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Task関連のルート
    Route::get('/tasks/my-tasks', [TaskController::class, 'myTasks'])->name('tasks.myTasks'); // myTasksメソッドのルート追加
    Route::resource('tasks', TaskController::class); // 既存のタスク関連のルート
});

require __DIR__.'/auth.php';
