<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // タスク一覧を表示するメソッド
    public function index()
    {
        // ログインユーザーのタスクを取得
        $tasks = Task::where('user_id', auth()->id())->get();
        // 全員のタスクを取得（user情報を含める）
        $allTasks = Task::with('user')->get();

        // メニュー一覧ページを表示する場合
        return view('tasks.index', compact('tasks', 'allTasks'));
    }

    // タスク一覧ページ（my_tasks.blade.php）を表示するメソッド
    public function myTasks()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return view('tasks.my_tasks', compact('tasks'));
    }
    
    // 全員のタスク一覧を表示するメソッド
    public function allTasks()
    {
        $tasks = Task::with('category')->get();  // 全タスクを取得
        return view('tasks.alltasks_show', compact('tasks'));
    }
    
    // タスク詳細ページ（mytasks_show.blade.php）を表示するメソッド
    public function show(Task $task)
    {
        // タスク詳細ビューを表示し、タスクデータを渡す
        return view('tasks.mytasks_show', compact('task'));
    }
    
    // タスク作成ページを表示するメソッド
    public function create()
    {
        return view('tasks.create'); // タスク作成ビューを表示
    }

    // タスクを保存するメソッド
    public function store(Request $request)
    {
        // フォームからの入力をバリデート
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'assignee' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deadline' => 'required|date',
            'priority' => 'required|string',
            'load_level' => 'required|integer|min:1|max:10',
            'description' => 'required|string',
        ]);

        // 新しいタスクを作成
        $task = new Task();
        $task->title = $validated['title'];
        $task->assignee = $validated['assignee'];
        $task->category_id = $validated['category_id'];
        $task->deadline = $validated['deadline'];
        $task->priority = $validated['priority'];
        $task->load_level = $validated['load_level'];
        $task->description = $validated['description'];
        $task->user_id = auth()->id(); // ログインユーザーのIDを取得
        $task->save();

        // タスク一覧ページにリダイレクト
        return redirect()->route('tasks.index')->with('success', 'タスクが作成されました！');
    }
    
    // タスク編集ページを表示するメソッド
    public function edit(Task $task)
    {
        // edit.blade.php ビューを表示し、タスクデータを渡す
        return view('tasks.edit', compact('task'));
    }

    // タスク更新を保存するメソッド
    public function update(Request $request, Task $task)
    {
        // フォームからの入力をバリデート
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'assignee' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'deadline' => 'required|date',
            'priority' => 'required|string',
            'load_level' => 'required|integer|min:1|max:10',
            'description' => 'required|string',
        ]);

        // タスクを更新
        $task->update($validated);

        // タスク一覧ページにリダイレクト
        return redirect()->route('tasks.index')->with('success', 'タスクが更新されました！');
    }
    
    // タスク削除メソッドの追加
    public function destroy(Task $task)
    {
        // タスクを削除
        $task->delete();

        // 削除後、タスク一覧画面にリダイレクトし、メッセージを表示
        return redirect()->route('tasks.my_tasks')->with('status', 'タスクを削除しました');
    }
}
