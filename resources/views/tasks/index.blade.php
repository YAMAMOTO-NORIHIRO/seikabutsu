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
                    
                    <!-- タスク一覧へのリンクボタン -->
                    <div class="mb-4">
                        <a href="{{ route('tasks.my_tasks') }}" style="background-color: #1d4ed8; color: #ffffff; font-weight: bold; padding: 10px 20px; border-radius: 5px;">
                            タスク一覧を表示
                        </a>
                    </div>

                    <!-- 全員のタスク一覧へのリンクボタン -->
                    <div class="mb-4">
                        <a href="{{ route('tasks.alltasks_show') }}" class="inline-block bg-gray-500 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">
                            全員のタスク一覧を表示
                        </a>
                    </div>

                    <!-- 通知メッセージ -->
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded">
                        <h3 class="text-lg font-semibold">お知らせ通知</h3>
                        @if(count($notifications) > 0)
                            <ul class="list-disc pl-5">
                                @foreach($notifications as $notification)
                                    <li>{{ $notification }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>現在通知はありません。</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


