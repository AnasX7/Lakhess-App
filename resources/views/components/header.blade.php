<header class="flex items-center justify-between px-10 py-6">

  <div class="flex gap-4">
    <img class="h-14 w-14 rounded-full" src="{{ auth()->user()->getAvatarUrlAttribute() }}" alt="User Avatar">
    <div class="flex flex-col">
      <span class="text-xl font-semibold text-fg-primary dark:text-fg-primary-dark">Welcome back,
        {{ auth()->user()->name }}</span>
      <span class="text-base text-fg-tertiary dark:text-fg-tertiary-dark">{{ $date }}</span>
    </div>
  </div>

  @if (request()->routeIs('dashboard'))
    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50 h-auto w-auto">
      <button @click="modalOpen=true"
        class="inline-flex h-10 items-center justify-center gap-1 rounded-lg border border-secondary bg-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
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
            class="absolute inset-0 h-full w-full bg-black bg-opacity-40"></div>
          <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative w-full bg-white px-7 py-6 dark:bg-bg-active-dark sm:max-w-lg sm:rounded-lg">
            <div class="flex items-center justify-between pb-2">
              <h3 class="text-lg font-semibold text-fg-primary dark:text-fg-primary-dark">Create Folder
              </h3>
              <button @click="modalOpen=false"
                class="absolute right-0 top-0 mr-5 mt-5 flex h-8 w-8 items-center justify-center rounded-full text-gray-600 hover:bg-gray-50 hover:text-gray-800">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                        class="block text-sm/6 font-medium text-fg-secondry dark:text-fg-secondry-dark">Name</label>
                      <div class="mt-2">
                        <input type="text" name="folder_name" id="first-name" autocomplete="given-name"
                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 dark:bg-bg-secondry-dark dark:text-fg-secondry-dark dark:ring-border-primary-dark sm:text-sm/6">
                      </div>
                    </div>
                    <div class="flex w-[100px] items-center justify-center">
                      <div>
                        <label for="folder-color"
                          class="block text-sm/6 font-medium text-fg-secondry dark:text-fg-secondry-dark">Color</label>
                        <div class="mt-2">
                          <input type="color" name="folder_color"
                            class="h-8 w-8 cursor-pointer appearance-none rounded-lg border-none p-0" value="#8057DA" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="submit" value="Create"
                    class="btn text-white hover:bg-bg-primary-dark dark:border-border-primary-dark dark:bg-bg-secondry-dark dark:text-fg-secondry-dark dark:hover:border-border-primary-dark" />
                </div>
              </form>

            </div>
          </div>
      </template>
    </div>
  @endif

  @if (request()->routeIs('folders.show'))
    <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false" class="relative z-50 h-auto w-auto">
      <button @click="modalOpen=true"
        class="inline-flex h-10 items-center justify-center gap-1 rounded-lg border border-[#f43f5e] bg-[#e11d48] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#f43f5e] focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 dark:hover:bg-[#f43f5e]">
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
            class="absolute inset-0 h-full w-full bg-black bg-opacity-40"></div>
          <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative w-full bg-white px-7 py-6 dark:bg-bg-active-dark sm:max-w-lg sm:rounded-lg">
            <div class="flex items-center justify-between pb-2">
              <h3 class="text-lg font-semibold text-fg-primary dark:text-fg-primary-dark">Delete Folder?
              </h3>
              <button @click="modalOpen=false"
                class="absolute right-0 top-0 mr-5 mt-5 flex h-8 w-8 items-center justify-center rounded-full text-gray-600 hover:bg-gray-50 hover:text-gray-800">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
                  <div class="flex gap-2 self-end">
                    <button type="button" @click="modalOpen=false"
                      class="btn border-border-primary bg-white text-fg-secondry hover:border-border-primary hover:bg-gray-100 dark:border-border-primary-dark dark:bg-bg-secondry-dark dark:text-fg-secondry-dark dark:hover:border-border-primary-dark">Cancel</button>
                    <input type="submit" value="Delete"
                      class="btn border-0 border-[#f43f5e] bg-[#e11d48] text-white hover:bg-[#f43f5e] dark:hover:bg-[#f43f5e]" />
                  </div>
                </div>
              </form>

            </div>
          </div>
      </template>
    </div>
  @endif

  @if (request()->routeIs('summaries.show') && !session('quiz'))
    <form action="{{ route('summaries.storeQuiz', request()->route('summaryId')) }}" method="POST">
      @csrf
      <button type="submit"
        class="inline-flex h-10 items-center justify-center gap-1 rounded-lg border border-secondary bg-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M4.5 22V17M4.5 7V2M2 4.5H7M2 19.5H7M13 3L11.2658 7.50886C10.9838 8.24209 10.8428 8.60871 10.6235 8.91709C10.4292 9.1904 10.1904 9.42919 9.91709 9.62353C9.60871 9.84281 9.24209 9.98381 8.50886 10.2658L4 12L8.50886 13.7342C9.24209 14.0162 9.60871 14.1572 9.91709 14.3765C10.1904 14.5708 10.4292 14.8096 10.6235 15.0829C10.8428 15.3913 10.9838 15.7579 11.2658 16.4911L13 21L14.7342 16.4911C15.0162 15.7579 15.1572 15.3913 15.3765 15.0829C15.5708 14.8096 15.8096 14.5708 16.0829 14.3765C16.3913 14.1572 16.7579 14.0162 17.4911 13.7342L22 12L17.4911 10.2658C16.7579 9.98381 16.3913 9.8428 16.0829 9.62353C15.8096 9.42919 15.5708 9.1904 15.3765 8.91709C15.1572 8.60871 15.0162 8.24209 14.7342 7.50886L13 3Z"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        Generate Quiz
      </button>
    </form>
  @endif
</header>
