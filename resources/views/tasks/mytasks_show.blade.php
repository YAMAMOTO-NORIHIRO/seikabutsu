<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タスク詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- タスク詳細 -->
                    <h3>タスクタイトル: {{ $task->title }}</h3>
                    <p>担当者: {{ $task->assignee }}</p>
                    <p>カテゴリ: {{ $task->category ? $task->category->name : '未設定' }}</p>
                    <p>締切: {{ $task->deadline->format('Y/m/d') }}</p>
                    <p>優先度: {{ $task->priority }}</p>
                    <p>負荷レベル: {{ $task->load_level }}</p>
                    <p>詳細: {{ $task->description }}</p>

                    <!-- 戻るボタン -->
                    <div class="mt-4">
                        <a href="{{ route('tasks.my_tasks') }}" class="btn btn-secondary">
                            タスク一覧に戻る
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
