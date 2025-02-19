@section('title', '{{ $summary->title }} Summary')

<x-app-layout>

  <div class="p-10">
    <div class="mx-auto flex max-w-5xl flex-col gap-2 sm:px-6 lg:px-8">

      <div class="container mx-auto p-6">
        <h1 class="mb-4 text-2xl font-bold text-fg-primary dark:text-fg-primary-dark">{{ $summary->title }}</h1>

        <div class="bg-bg-secondary rounded p-4 shadow dark:bg-bg-active-dark">
          <h2 class="mb-2 text-lg font-semibold text-fg-secondry dark:text-fg-secondry-dark">Summary:</h2>
          <p>
            {{-- {!! Str::markdown($summary->content) !!} --}}
            {{-- @include('app.export.summary-pdf') --}}
            <x-markdown class="text-fg-secondry dark:text-fg-secondry-dark">{{ $summary->content }}</x-markdown>
          </p>
        </div>

        <div class="mt-4 flex items-center justify-between">
          <span class="text-sm text-gray-500">Created on: {{ $summary->created_at->format('M d, Y') }}</span>

          <div>
            @if (session('quiz'))
              <a href="{{ route('summaries.showQuiz', $summary->id) }}" class="btn text-white">
                Show Quiz
              </a>
            @endif

            <a href="{{ route('folders.show', $summary->folder) }}" class="btn text-white">
              Back to folders
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>

</x-app-layout>
