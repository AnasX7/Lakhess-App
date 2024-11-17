<header class="flex items-center justify-between px-10 py-6">
  <div class="flex gap-4">
    <img class="rounded-full h-14 w-14" src="{{ auth()->user()->avatar_url }}" alt="User Avatar">
    <div class="flex flex-col">
      <span class="text-xl font-semibold text-fg-primary dark:text-fg-primary-dark">Welcome back,
        {{ auth()->user()->name }}</span>
      <span class="text-base text-fg-tertiary dark:text-fg-tertiary-dark">{{ $date }}</span>
    </div>
  </div>

  @if (request()->routeIs('dashboard'))
    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50 w-auto h-auto">
      <button @click="modalOpen=true"
        class="inline-flex items-center justify-center h-10 gap-1 px-4 py-2 text-sm font-medium text-white transition-colors border rounded-lg border-secondary bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M13 7L11.8845 4.76892C11.5634 4.1268 11.4029 3.80573 11.1634 3.57116C10.9516 3.36373 10.6963 3.20597 10.4161 3.10931C10.0992 3 9.74021 3 9.02229 3H5.2C4.0799 3 3.51984 3 3.09202 3.21799C2.71569 3.40973 2.40973 3.71569 2.21799 4.09202C2 4.51984 2 5.0799 2 6.2V7M2 7H17.2C18.8802 7 19.7202 7 20.362 7.32698C20.9265 7.6146 21.3854 8.07354 21.673 8.63803C22 9.27976 22 10.1198 22 11.8V16.2C22 17.8802 22 18.7202 21.673 19.362C21.3854 19.9265 20.9265 20.3854 20.362 20.673C19.7202 21 18.8802 21 17.2 21H6.8C5.11984 21 4.27976 21 3.63803 20.673C3.07354 20.3854 2.6146 19.9265 2.32698 19.362C2 18.7202 2 17.8802 2 16.2V7ZM12 17V11M9 14H15"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        Add Folder
      </button>
      <template x-teleport="body">
        <div x-show="modalOpen" class="fixed left-0 top-0 z-[99] flex h-screen w-screen items-center justify-center"
          x-cloak>
          <div x-show="modalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="modalOpen=false"
            class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
          <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative w-full py-6 bg-white px-7 dark:bg-bg-active-dark sm:max-w-lg sm:rounded-lg">
            <div class="flex items-center justify-between pb-2">
              <h3 class="text-lg font-semibold text-fg-primary dark:text-fg-primary-dark">Create Folder</h3>
              <button @click="modalOpen=false"
                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:bg-gray-50 hover:text-gray-800">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>


            <div class="relative w-auto">

              <form method="POST" action="{{ route('folders.store') }}">
                @csrf
                <div class="flex flex-col justify-between gap-4">
                  <div class="flex items-center justify-between">
                    <div class="w-full">
                      <label for="folder-name"
                        class="block font-medium text-sm/6 text-fg-secondry dark:text-fg-secondry-dark">Name</label>
                      <div class="mt-2">
                        <input type="text" name="folder_name" id="first-name" autocomplete="given-name"
                          class="block w-full rounded-md border-1 py-1.5 border-gray-300 dark:border-gray-700 dark:bg-bg-primary-dark dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm sm:text-sm/6">
                      </div>
                    </div>
                    <div class="flex w-[100px] items-center justify-center">
                      <div>
                        <label for="folder-color"
                          class="block font-medium text-sm/6 text-fg-secondry dark:text-fg-secondry-dark">Color</label>
                        <div class="mt-2">
                          <input type="color" name="folder_color"
                            class="w-8 h-8 p-0 border-none rounded-lg appearance-none cursor-pointer" value="#8057DA" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="submit" value="Submit"
                    class="text-white dark:text-fg-primary btn hover:bg-bg-secondry-dark dark:bg-gray-200 dark:hover:bg-bg-primary" />
                </div>
              </form>

            </div>
          </div>
        </div>
      </template>
    </div>
  @endif

</header>
