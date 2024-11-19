@section('title', 'Dashboard')

<x-app-layout>

  <div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('summaries.generate') }}" method="POST" class="flex flex-col gap-8"
                enctype="multipart/form-data" x-data="{
                    loading: false,
                    validateForm() {
                        const form = this.$el; // Get the form element
                        if (form.checkValidity()) {
                            this.loading = true;
                            form.submit(); // Submit the form programmatically
                        } else {
                            this.loading = false; // Reset loading if validation fails
                            form.reportValidity(); // Show validation errors
                        }
                    }
                }" @submit.prevent="if (validateForm()) form.submit()">
                @csrf

                <div x-data="{
                    files: [],
                    isDragging: false,
                    handleFiles(event) {
                        const inputFiles = event.target.files || event.dataTransfer.files;
                        this.files = Array.from(inputFiles);
                        this.$refs.fileInput.files = event.target.files;
                    },
                    formatFileSize(size) {
                        const kb = size / 1024;
                        return kb > 1024 ? `${(kb / 1024).toFixed(2)} MB` : `${Math.round(kb)} KB`;
                    }
                }"
                    class="m-x-auto flex h-[300px] w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed p-4 transition"
                    :class="{
                        'border-blue-500 bg-blue-50 dark:bg-bg-active-dark dark:border-blue-300': isDragging,
                        'border-border-primary dark:border-border-primary-dark bg-bg-secondry dark:bg-bg-secondry-dark':
                            !isDragging
                    }"
                    @dragover.prevent="isDragging = true" @dragleave.prevent="isDragging = false"
                    @drop.prevent="isDragging = false; handleFiles($event)" @click="$refs.fileInput.click()">

                    <!-- File Input Section -->
                    <div>
                        <input type="file" name="file" x-ref="fileInput" accept="application/pdf" class="hidden"
                            @change="handleFiles($event)" required>

                        <div class="text-center"
                            :class="{
                                'text-blue-500 dark:text-blue-300': isDragging,
                                'text-fg-quaternary dark:text-fg-quaternary-dark': !isDragging
                            }">
                            <template x-if="files.length === 0">
                                <div class="flex flex-col items-center justify-center gap-5">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21 15V16.2C21 17.8802 21 18.7202 20.673 19.362C20.3854 19.9265 19.9265 20.3854 19.362 20.673C18.7202 21 17.8802 21 16.2 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V15M17 8L12 3M12 3L7 8M12 3V15"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div>
                                        <p class="font-medium">Drag and drop a PDF file here</p>
                                        <p class="text-sm text-fg-quaternary dark:text-fg-quaternary-dark">or click to
                                            browse</p>
                                    </div>
                                </div>
                            </template>
                            <template x-if="files.length > 0">
                                <p class="font-medium text-green-600 dark:text-green-400">Files selected! See the list
                                    below.</p>
                            </template>
                        </div>

                        <!-- File List -->
                        <template x-if="files.length > 0">
                            <ul class="mt-4 space-y-2">
                                <template x-for="file in files" :key="file.name">
                                    <li
                                        class="flex items-center justify-between px-4 py-2 bg-gray-100 rounded-lg dark:bg-gray-200">
                                        <span class="text-sm font-medium text-gray-700 truncate"
                                            x-text="file.name"></span>
                                        <span class="text-xs text-gray-500" x-text="formatFileSize(file.size)"></span>
                                    </li>
                                </template>
                            </ul>
                        </template>
                    </div>
                </div>

            <!-- File List -->
            <template x-if="files.length > 0">
              <ul class="mt-4 space-y-2">
                <template x-for="file in files" :key="file.name">
                  <li class="flex items-center justify-between px-4 py-2 bg-gray-100 rounded-lg dark:bg-gray-200">
                    <span class="text-sm font-medium text-gray-700 truncate" x-text="file.name"></span>
                    <span class="text-xs text-gray-500" x-text="formatFileSize(file.size)"></span>
                  </li>
                </template>
              </ul>
            </template>
          </div>
        </div>

        <!-- Summary Title Input -->
        <div class="flex items-center justify-between w-full">
          <div class="w-[50%]">
            <label for="summary-name"
              class="block font-medium text-sm/6 text-fg-secondry dark:text-fg-secondry-dark">Summary title</label>
            <div class="mt-2">
              <input type="text" name="title" id="summary-name" autocomplete="given-name" required
                class="border-1 block w-full rounded-md border-gray-300 py-1.5 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-bg-primary-dark dark:text-fg-secondry dark:focus:border-indigo-600 dark:focus:ring-indigo-600 sm:text-sm/6">
            </div>
          </div>

          {{-- <!-- Folder Dropdown -->
          <div x-data="{ open: false, selected: { id: '{{ $folders->first()->id }}', name: '{{ $folders->first()->name }}', color: '{{ $folders->first()->color }}' } }" class="w-[45%]">
            <label id="listbox-label"
              class="block text-sm font-medium text-fg-secondry dark:text-fg-secondry-dark">Folder</label>
            <div class="relative mt-2">
              <button @click="open = !open" @click.away="open = false" type="button"
                class="relative w-full cursor-default rounded-md bg-bg-primary py-1.5 pl-3 pr-10 text-left text-fg-secondry shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-bg-primary-dark dark:text-fg-secondry-dark dark:ring-gray-700 sm:text-sm"
                aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label">
                <span class="flex items-center">
                  <div class="h-4 w-4 rounded-[4px]" :style="{ 'background-color': selected.color }"></div>
                  <span class="block ml-3 truncate" x-text="selected.name"></span>
                </span>
                <span class="absolute inset-y-0 right-0 flex items-center pr-2 ml-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"
                      clip-rule="evenodd" />
                  </svg>
                </span>
              </button>
              <ul x-show="open" x-cloak
                class="absolute z-10 w-full py-1 mt-1 overflow-auto text-base rounded-md shadow-lg max-h-56 bg-bg-primary ring-1 ring-black/5 focus:outline-none dark:bg-bg-primary-dark sm:text-sm"
                tabindex="-1" role="listbox" aria-labelledby="listbox-label">
                @foreach ($folders as $folder)
                  <li
                    @click="selected = { id: '{{ $folder->id }}', name: '{{ $folder->name }}', color: '{{ $folder->color }}' }; open = false; $refs.folderInput.value = selected.id"
                    class="relative py-2 pl-3 cursor-pointer select-none pr-9 text-fg-secondry hover:bg-bg-active hover:text-fg-primary dark:text-fg-secondry-dark dark:hover:bg-bg-active-dark"
                    role="option">
                    <div class="flex items-center">
                      <div class="h-4 w-4 rounded-[4px]" style="background-color: {{ $folder->color }};"></div>
                      <span class="block ml-3 truncate">{{ $folder->name }}</span>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>
            <input type="hidden" name="folder_id" x-ref="folderInput" required>
          </div>
        </div> --}}

          <!-- Folder Dropdown -->
          <div x-data="{
              open: false,
              selected: {{ $folders->isNotEmpty()
                  ? "{ id: '{$folders->first()->id}', name: '{$folders->first()->name}', color: '{$folders->first()->color}' }"
                  : "{ id: null, name: 'No folders available', color: '#ccc' }" }}
          }" class="w-[45%]">
            <label id="listbox-label"
              class="block text-sm font-medium text-fg-secondry dark:text-fg-secondry-dark">Folder</label>
            <div class="relative mt-2">
              <button @click="open = !open" @click.away="open = false" type="button"
                class="relative w-full cursor-default rounded-md bg-bg-primary py-1.5 pl-3 pr-10 text-left text-fg-secondry shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-bg-primary-dark dark:text-fg-secondry-dark dark:ring-gray-700 sm:text-sm"
                aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label">
                <span class="flex items-center">
                  <div class="h-4 w-4 rounded-[4px]" :style="{ 'background-color': selected.color }"></div>
                  <span class="block ml-3 truncate" x-text="selected.name"></span>
                </span>
                <span class="absolute inset-y-0 right-0 flex items-center pr-2 ml-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                      d="M10.53 3.47a.75.75 0 0 0-1.06 0L6.22 6.72a.75.75 0 0 0 1.06 1.06L10 5.06l2.72 2.72a.75.75 0 1 0 1.06-1.06l-3.25-3.25Zm-4.31 9.81 3.25 3.25a.75.75 0 0 0 1.06 0l3.25-3.25a.75.75 0 1 0-1.06-1.06L10 14.94l-2.72-2.72a.75.75 0 0 0-1.06 1.06Z"
                      clip-rule="evenodd" />
                  </svg>
                </span>
              </button>
              <ul x-show="open" x-cloak
                class="absolute z-10 w-full py-1 mt-1 overflow-auto text-base rounded-md shadow-lg max-h-56 bg-bg-primary ring-1 ring-black/5 focus:outline-none dark:bg-bg-primary-dark sm:text-sm"
                tabindex="-1" role="listbox" aria-labelledby="listbox-label">
                @forelse ($folders as $folder)
                  <li
                    @click="selected = { id: '{{ $folder->id }}', name: '{{ $folder->name }}', color: '{{ $folder->color }}' }; open = false; $refs.folderInput.value = selected.id"
                    class="relative py-2 pl-3 cursor-pointer select-none pr-9 text-fg-secondry hover:bg-bg-active hover:text-fg-primary dark:text-fg-secondry-dark dark:hover:bg-bg-active-dark"
                    role="option">
                    <div class="flex items-center">
                      <div class="h-4 w-4 rounded-[4px]" style="background-color: {{ $folder->color }};"></div>
                      <span class="block ml-3 truncate">{{ $folder->name }}</span>
                    </div>
                  </li>
                @empty
                  <li
                    class="relative py-2 pl-3 cursor-default select-none pr-9 text-fg-secondry dark:text-fg-secondry-dark"
                    role="option">
                    <div class="flex items-center">
                      <span class="block ml-3 truncate">No folders available</span>
                    </div>
                  </li>
                @endforelse
              </ul>
            </div>
            <input type="hidden" name="folder_id" x-ref="folderInput" :value="selected.id">
          </div>
        </div>

        <!-- Submit Button -->
        <div class="w-full">
          <button type="submit" class="w-full btn" :disabled="loading">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M4.5 22V17M4.5 7V2M2 4.5H7M2 19.5H7M13 3L11.2658 7.50886C10.9838 8.24209 10.8428 8.60871 10.6235 8.91709C10.4292 9.1904 10.1904 9.42919 9.91709 9.62353C9.60871 9.84281 9.24209 9.98381 8.50886 10.2658L4 12L8.50886 13.7342C9.24209 14.0162 9.60871 14.1572 9.91709 14.3765C10.1904 14.5708 10.4292 14.8096 10.6235 15.0829C10.8428 15.3913 10.9838 15.7579 11.2658 16.4911L13 21L14.7342 16.4911C15.0162 15.7579 15.1572 15.3913 15.3765 15.0829C15.5708 14.8096 15.8096 14.5708 16.0829 14.3765C16.3913 14.1572 16.7579 14.0162 17.4911 13.7342L22 12L17.4911 10.2658C16.7579 9.98381 16.3913 9.8428 16.0829 9.62353C15.8096 9.42919 15.5708 9.1904 15.3765 8.91709C15.1572 8.60871 15.0162 8.24209 14.7342 7.50886L13 3Z"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span x-show="!loading">Summarize</span>
            <progress class="w-56 progress" x-show="loading" x-cloak></progress>
          </button>
        </div>


            </form>

        </div>
    </div>
</x-app-layout>
