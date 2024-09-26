<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タスクの編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- タスク編集フォーム -->
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                        @csrf
                        @method('PUT')  <!-- PUTメソッドでリクエストを送信 -->

                        <!-- 担当者 -->
                        <div class="mb-4">
                            <label for="assignee" class="block font-medium text-sm text-gray-700">担当者</label>
                            <input type="text" name="assignee" id="assignee" class="block mt-1 w-full" value="{{ $task->assignee }}" required>
                        </div>

                        <!-- タスクタイトル -->
                        <div class="mb-4">
                            <label for="title" class="block font-medium text-sm text-gray-700">タスクタイトル</label>
                            <input type="text" name="title" id="title" class="block mt-1 w-full" value="{{ $task->title }}" required>
                        </div>

                        <!-- カテゴリ選択 -->
                        <div class="mb-4">
                            <label for="category" class="block font-medium text-sm text-gray-700">カテゴリ</label>
                            <select name="category_id" id="category_id" class="block mt-1 w-full" required>
                                <!-- Seederで登録されたカテゴリを表示 -->
                                <option value="1" {{ $task->category_id == 1 ? 'selected' : '' }}>事務作業（赤）</option>
                                <option value="2" {{ $task->category_id == 2 ? 'selected' : '' }}>技術サポート（黄）</option>
                                <option value="3" {{ $task->category_id == 3 ? 'selected' : '' }}>営業活動（青）</option>
                                <option value="4" {{ $task->category_id == 4 ? 'selected' : '' }}>会議（黒）</option>
                                <option value="5" {{ $task->category_id == 5 ? 'selected' : '' }}>顧客対応（白）</option>
                                <option value="6" {{ $task->category_id == 6 ? 'selected' : '' }}>研修（緑）</option>
                                <option value="7" {{ $task->category_id == 7 ? 'selected' : '' }}>その他作業（茶）</option>
                            </select>
                        </div>

                        <!-- 期限 -->
                        <div class="mb-4">
                            <label for="deadline" class="block font-medium text-sm text-gray-700">期限</label>
                            <input type="date" name="deadline" id="deadline" class="block mt-1 w-full" value="{{ $task->deadline->format('Y-m-d') }}" required>
                        </div>

                        <!-- 優先度 -->
                        <div class="mb-4">
                            <label for="priority" class="block font-medium text-sm text-gray-700">優先度</label>
                            <select name="priority" id="priority" class="block mt-1 w-full" required>
                                <option value="高" {{ $task->priority == '高' ? 'selected' : '' }}>高</option>
                                <option value="中" {{ $task->priority == '中' ? 'selected' : '' }}>中</option>
                                <option value="低" {{ $task->priority == '低' ? 'selected' : '' }}>低</option>
                            </select>
                        </div>

                        <!-- 負荷レベル -->
                        <div class="mb-4">
                            <label for="load_level" class="block font-medium text-sm text-gray-700">負荷レベル</label>
                            <input type="number" name="load_level" id="load_level" class="block mt-1 w-full" value="{{ $task->load_level }}" min="1" max="10" required>
                        </div>

                        <!-- 詳細 -->
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">詳細</label>
                            <textarea name="description" id="description" class="block mt-1 w-full" required>{{ $task->description }}</textarea>
                        </div>

                        <!-- タスク編集完了ボタン -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                タスク編集完了
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
