@section('title', '{{ $summary->title }} Summary')

<x-app-layout>

  <div class="p-10">
    <div class="flex flex-col max-w-5xl gap-2 mx-auto sm:px-6 lg:px-8">

      <div class="container p-6 mx-auto">
        <h1 class="mb-4 text-2xl font-bold text-fg-primary dark:text-fg-primary-dark">{{ $summary->title }}</h1>

        <div class="p-4 rounded shadow bg-bg-secondary dark:bg-bg-active-dark">
          <h2 class="mb-2 text-lg font-semibold text-fg-secondry dark:text-fg-secondry-dark">Summary:</h2>
          <p>
            {{-- {!! Str::markdown($summary->content) !!} --}}

            <x-markdown class="text-fg-secondry dark:text-fg-secondry-dark">{{ $summary->content }}</x-markdown>
          </p>
        </div>

        <div class="flex items-center justify-between mt-4">
          <span class="text-sm text-gray-500">Created on: {{ $summary->created_at->format('M d, Y') }}</span>


          <a href="{{ route('folders.show', $summary->folder) }}"
            class="text-white btn">
            Back to folders
          </a>

        </div>
      </div>

    </div>
  </div>

</x-app-layout>
