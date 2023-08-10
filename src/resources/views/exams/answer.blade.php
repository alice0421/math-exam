<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $exam_year->year }}年度
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($results as $result)
                        <div class="pb-10" x-data="{ open: false }">
                            <div class="text-lg font-semibold">
                                @if(!is_null($result->exam->question_sub_number))
                                    <span>({{ $result->exam->question_number }}.{{ $result->exam->question_sub_number }})</span>
                                @else
                                    <span>({{ $result->exam->question_number }})</span>
                                @endif

                                <span class="pl-2 pb-1">{{ $result->exam->question_text }}</span>
                            </div>

                            @if(!is_null($result->exam->question_img))
                                <img src="{{ $result->$exam->question_img }}" alt="問題画像"/>
                            @endif

                            <p>
                                <span>回答: </span>
                                @if($result->is_correct)
                                    <span class="text-blue-600">{{ $result->input }}</span>
                                    <span class="text-lg font-semibold text-blue-600">O</span>
                                @else
                                    <span class="text-red-600">{{ $result->input }}</span>
                                    <span class="text-lg font-semibold text-red-600">X</span>
                                @endif
                            </p>
                            <p>
                                <span>解答: </span>
                                {{ $result->exam->answer }}
                            </p>

                            <template x-if="!open">
                                <p @click="open = !open" class="cursor-pointer pt-2">▶ 解説</p>
                            </template>
                            <template x-if="open">
                                <p @click="open = !open" class="cursor-pointer pt-2">▼ 解説</p>
                            </template>
                            <template x-if="open">
                                <div class="mt-1 p-2 w-1/3 border-l-8 border-solid border-blue-500 bg-blue-200
                                        hover:translate-x-[-2px] hover:translate-y-[-2px] hover:drop-shadow-md">
                                    {{ $result->exam->explanation_text }}
                                    @if(!is_null($result->exam->explanation_img))
                                        {{ $result->exam->explanation_img }}
                                    @endif
                                </div>
                            </template>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
