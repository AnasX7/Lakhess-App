@section('title', 'Folders')

<x-app-layout>
    Folder: {{ $folder->id }}
    {{-- TESTING PURPOSES!! CHANGE LATER!! --}}
    <div class="p-4">
        <div class="flex flex-wrap gap-4">
            @foreach ($folder->summaries as $summary)
                @include('app.shared.summary-card')
                {{-- TODO: add quizes here --}}
            @endforeach

        </div>
    </div>
</x-app-layout>
