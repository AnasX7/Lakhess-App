@section('title', 'Folders')

<x-app-layout>
    Folder: {{ $folder->id }}
    {{-- TESTING PURPOSES!! CHANGE LATER!! --}}
    <div class="justify-end p-4">
        <form action="{{ route('folders.destroy', $folder->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-primary">Delete Folder</button>
        </form>
    </div>
    <div class="p-4">
        <div class="flex flex-wrap gap-4">
            @foreach ($folder->summaries as $summary)
                @include('app.shared.summary-card')
            @endforeach
        </div>
    </div>
</x-app-layout>
