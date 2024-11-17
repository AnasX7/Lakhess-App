@section('title', 'Folders')

<x-app-layout>
    {{-- TESTING PURPOSES!! CHANGE LATER!! --}}
    <div class="p-4">
        <div class="flex flex-wrap gap-4">
            @switch($category)
                @case('')
                    {{-- We do both --}}
                    @if (empty($summaries) && empty($quizzes))
                        <p class="justify-center text-xl">Nothing here...</p>
                    @else
                        @foreach ($summaries as $summary)
                            @include('app.shared.summary-card')
                        @endforeach

                        @foreach ($quizzes as $quiz)
                            @include('app.shared.quiz-card')
                        @endforeach
                    @endif
                @break

                @case('summary')
                    {{-- Show summaries only --}}
                    @if (empty($summaries))
                        <p class="justify-center text-xl">Nothing here...</p>
                    @else
                        @foreach ($summaries as $summary)
                            @include('app.shared.summary-card')
                        @endforeach
                    @endif
                @break

                @case('quiz')
                    {{-- Show quizzes only --}}

                    @if (empty($quizzes))
                        <p class="justify-center text-xl">Nothing here...</p>
                    @else
                        @foreach ($quizzes as $quiz)
                            @include('app.shared.quiz-card')
                        @endforeach
                    @endif
                @break

                @default
                    <p class="justify-center text-xl">Nothing here...</p>
                @break

            @endswitch

        </div>
    </div>
</x-app-layout>
