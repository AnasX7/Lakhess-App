@section('title', 'Folders')

<x-app-layout>

  <div class="py-12">
    <div class="flex flex-col max-w-5xl gap-2 mx-auto sm:px-6 lg:px-8">
      @foreach ($folder->summaries as $summary)
        @include('app.shared.summary-card')
      @endforeach
    </div>
  </div>

</x-app-layout>
