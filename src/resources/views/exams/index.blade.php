<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('テスト一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        @foreach ($exam_years as $exam_year)
                            <a
                                href="{{ route('exam.show', ['exam_year' => $exam_year->id]) }}"
                                class="text-gray-800 text-base"
                            >
                                <li class="w-40 my-2 p-2 border-l-8 border-solid border-blue-500 bg-blue-200
                                            hover:translate-x-[-2px] hover:translate-y-[-2px] hover:drop-shadow-md">
                                        {{ $exam_year->year }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
