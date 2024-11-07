@section('titel', 'Dashboard')

<x-app-layout>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="dark:bg-gray-800 overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="dark:text-gray-100 p-6 text-gray-900">
          {{ __("You're logged in!") }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
