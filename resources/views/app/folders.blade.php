@section('title', 'Folders')

<x-app-layout>
  <div class="py-12">
    <div class="flex flex-col max-w-5xl gap-4 mx-auto sm:px-6 lg:px-8">
      @foreach ($summaries as $summary)
        <a href="{{ route('summaries.show', $summary->id) }}">
          <div
            class="flex items-center justify-between px-4 py-3 border rounded-lg border-border-primary bg-bg-active dark:border-border-primary-dark dark:bg-bg-active-dark">
            <div class="flex items-center gap-10">
              <div class="h-5 w-5 rounded-[4px]" style="background-color: {{ $folder->color }};"></div>
              <span class="text-base font-semibold text-fg-secondry dark:text-fg-secondry-dark">{{ $summary->title }}</span>
            </div>

            <div>
                
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</x-app-layout>
