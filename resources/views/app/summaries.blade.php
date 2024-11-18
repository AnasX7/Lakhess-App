@section('title', 'Summaries')

<x-app-layout>
    <div class="p-4">
        <div class="flex flex-wrap gap-4">
            @if (empty($summaries))
                <p class="justify-center text-xl">Nothing here...</p>
            @else
                @foreach ($summaries as $summary)
                    @include('app.shared.summary-card')
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
