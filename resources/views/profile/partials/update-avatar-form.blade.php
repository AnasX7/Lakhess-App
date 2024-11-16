<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      {{ __('Update Avatar') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      {{ __('Update your profile image') }}
    </p>
  </header>

  <form method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
    @csrf

    <input type="file"
      class="block w-full text-sm text-gray-500 file:me-4 file:rounded-lg file:border-0 file:bg-blue-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 file:disabled:pointer-events-none file:disabled:opacity-50 dark:text-neutral-500 dark:file:bg-blue-500 dark:hover:file:bg-blue-400"
      name="avatar">

    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
  </form>
</section>
