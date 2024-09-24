<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                
                <!-- タスク一覧表示 -->
                <h1>{{ auth()->user()->name }}さんのタスク一覧</h1>

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

                            <!-- タスク詳細ボタン -->
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary">タスク詳細</a>

                            <!-- タスク編集ボタン -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary">タスク編集</a>
                        </div>
                    @endforeach
                @endif

                <!-- タスクの新規作成ボタン -->
                <a href="{{ route('tasks.create') }}" class="btn btn-success mt-4">新しいタスクを登録</a>

            </div>
        </div>
    </div>
</div>

