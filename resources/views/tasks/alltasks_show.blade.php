<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            全員のタスク一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- タスク一覧表示 -->
                    <h1>全ユーザーのタスク一覧</h1>

                    <!-- タスクが存在しない場合のメッセージ -->
                    @if ($tasks->isEmpty())
                        <p>現在、登録されたタスクはありません。</p>
                    @else
                        <!-- タスクが存在する場合の一覧表示 -->
                        @foreach ($tasks as $task)
                            <div class="mb-4">
                                <h3>タスクタイトル: {{ $task->title }}</h3>
                                <p>担当者: {{ $task->assignee }}</p>
                                <p>カテゴリ: {{ $task->category ? $task->category->name : '未設定' }}</p>
                                <p>締切: {{ $task->deadline->format('Y/m/d') }}</p>
                                <p>優先度: {{ $task->priority }}</p>
                                <p>負荷レベル: {{ $task->load_level }}</p>
                                <p>詳細: {{ $task->description }}</p>
                            </div>
                        @endforeach
                    @endif

                    <!-- メニュー一覧画面に戻るボタン -->
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-4">メニュー一覧画面に戻る</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
