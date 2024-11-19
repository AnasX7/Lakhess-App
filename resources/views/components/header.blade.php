<header class="flex items-center justify-between px-10 py-6">

  <div class="flex gap-4">
    <img class="rounded-full h-14 w-14"
      src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://api.dicebear.com/9.x/thumbs/svg?seed=' . urlencode(auth()->user()->name) }}"
      alt="User Avatar">
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
              <h3 class="text-lg font-semibold text-fg-primary dark:text-fg-primary-dark">Create Folder
              </h3>
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
                          class="block w-full rounded-md dark:bg-bg-secondry-dark dark:text-fg-secondry-dark border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-border-primary-dark placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6">
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
                  <input type="submit" value="Create"
                    class="text-white btn hover:bg-bg-primary-dark dark:bg-bg-secondry-dark dark:border-border-primary-dark dark:hover:border-border-primary-dark dark:text-fg-secondry-dark" />
                </div>
              </form>

            </div>
          </div>
      </template>
    </div>
  @endif

  @if (request()->routeIs('folders.show'))
    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50 w-auto h-auto">
      <button @click="modalOpen=true"
        class="inline-flex items-center justify-center h-10 gap-1 px-4 py-2 text-sm font-medium text-white transition-colors border rounded-lg border-[#f43f5e] bg-[#e11d48] hover:bg-[#f43f5e] dark:hover:bg-[#f43f5e] focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M16 6V5.2C16 4.0799 16 3.51984 15.782 3.09202C15.5903 2.71569 15.2843 2.40973 14.908 2.21799C14.4802 2 13.9201 2 12.8 2H11.2C10.0799 2 9.51984 2 9.09202 2.21799C8.71569 2.40973 8.40973 2.71569 8.21799 3.09202C8 3.51984 8 4.0799 8 5.2V6M10 11.5V16.5M14 11.5V16.5M3 6H21M19 6V17.2C19 18.8802 19 19.7202 18.673 20.362C18.3854 20.9265 17.9265 21.3854 17.362 21.673C16.7202 22 15.8802 22 14.2 22H9.8C8.11984 22 7.27976 22 6.63803 21.673C6.07354 21.3854 5.6146 20.9265 5.32698 20.362C5 19.7202 5 18.8802 5 17.2V6"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        Delete Folder
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
              <h3 class="text-lg font-semibold text-fg-primary dark:text-fg-primary-dark">Delete Folder?
              </h3>
              <button @click="modalOpen=false"
                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:bg-gray-50 hover:text-gray-800">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>


            <div class="relative w-auto">

              <form method="POST" action="{{ route('folders.destroy', request()->route('folderId')) }}">
                @csrf
                @method('DELETE')
                
                <div class="flex flex-col justify-between gap-4 text-fg-secondry dark:text-fg-secondry-dark">
                  <p class="text-fg-secondry dark:text-fg-secondry-dark">This can't be undone</p>
                  <div class="flex self-end gap-2">
                    <button  type="button" @click="modalOpen=false" class="bg-white dark:bg-bg-secondry-dark hover:bg-gray-100 btn border-border-primary hover:border-border-primary dark:border-border-primary-dark dark:hover:border-border-primary-dark text-fg-secondry dark:text-fg-secondry-dark">Cancel</button>
                    <input type="submit" value="Delete"
                    class="text-white btn border-0 border-[#f43f5e] bg-[#e11d48] hover:bg-[#f43f5e] dark:hover:bg-[#f43f5e]" />
                  </div>
                </div>
              </form>

            </div>
          </div>
      </template>
    </div>
  @endif
</header>
