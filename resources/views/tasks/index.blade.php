<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->name }}さんのタスク一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- タスク一覧へのリンク -->
                     <a href="{{ route('tasks.myTasks') }}" class="btn btn-primary">
                        タスク一覧を表示
                    </a>

                    <!-- 全員のタスク一覧 -->
                    <h2>全員のタスク一覧</h2>
                    <ul>
                        @foreach ($allTasks as $task)
                            <li>{{ $task->title }} ({{ $task->user->name }})</li>
                        @endforeach
                    </ul>

                    <!-- 通知画面へのリンク -->
                    <div>
                        <a href="#">通知画面</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

