@section('title', 'Summaries')

<x-app-layout>

  <div class="p-12">
    <div class="flex flex-col max-w-5xl gap-2 mx-auto sm:px-6 lg:px-8">
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
