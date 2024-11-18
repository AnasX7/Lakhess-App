@section('title', 'Folders')

<x-app-layout>

    <div class="py-12">
        <div class="flex flex-col max-w-5xl gap-4 mx-auto sm:px-6 lg:px-8">
            @if (empty($folder->summaries))
                <p class="justify-center text-xl">Nothing here...</p>
            @else
                @foreach ($folder->summaries as $summary)
                    <a href="{{ route('summaries.show', $summary->id) }}">
                        <div
                            class="flex items-center justify-between px-4 py-3 border rounded-lg border-border-primary bg-bg-active dark:border-border-primary-dark dark:bg-bg-active-dark">
                            <div class="flex items-center gap-10">
                                <div class="h-5 w-5 rounded-[4px]" style="background-color: {{ $folder->color }};"></div>
                                <span
                                    class="text-base font-semibold text-fg-secondry dark:text-fg-secondry-dark">{{ $summary->title }}</span>
                            </div>

                            <div>

                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
    <div class="justify-end p-4">
        <form action="{{ route('folders.destroy', $folder->id) }}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-primary">Delete Folder</button>
        </form>
    </div>

</x-app-layout>
