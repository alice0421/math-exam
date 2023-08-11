<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $exam_year->year }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('exam.store', ['exam_year' => $exam_year->id]) }}" method=POST>
                        <p>※ 全て<span class="font-semibold">半角英数字</span>で入力してください。</p>
                        <p class="pb-5">全角で入力しますと、正誤判定がうまくいかない可能性があります。</p>

                        @csrf
                        @foreach ($exams as $exam)
                            <div class="pb-10">
                                <div class="text-lg font-semibold">
                                    @if(!is_null($exam->question_sub_number))
                                        <span>({{ $exam->question_number }}.{{ $exam->question_sub_number }})</span>
                                    @else
                                        <span>({{ $exam->question_number }})</span>
                                    @endif

                                    <span class="pl-2 pb-1">{{ $exam->question_text }}</span>
                                </div>

                                @if(!is_null($exam->question_img))
                                    <img src="{{ $exam->question_img }}" alt="問題画像"/>
                                @endif

                                <x-input-label for="input_{{ $exam->id }}" class="block pt-1">回答欄</x-input-label>
                                <x-text-input
                                    id="input_{{ $exam->id }}"
                                    type="text"
                                    name="inputs[{{ $exam->id }}]"
                                    class="block mt-1"
                                    value="{{ old('inputs.'. (string) $exam->id) }}" 
                                />
                            </div>
                        @endforeach
                        
                        <x-primary-button type="submit">回答</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
