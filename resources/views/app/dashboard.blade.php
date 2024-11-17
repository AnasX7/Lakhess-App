@section('title', 'Dashboard')

<x-app-layout>
  <div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

      <form action="{{ route('summaries.store') }}" method="POST">
        @csrf

        <div x-data="{
            files: [],
            isDragging: false,
            handleFiles(event) {
                const inputFiles = event.target.files || event.dataTransfer.files;
                this.files = Array.from(inputFiles);
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

          <div>
            <!-- Hidden File Input -->
            <input type="file" x-ref="fileInput" accept="application/pdf" class="hidden"
              @change="handleFiles($event)" multiple>

            <!-- Drag-and-Drop Instructions -->
            <div class="text-center"
              :class="{
                  'text-blue-500 dark:text-blue-300': isDragging,
                  'text-fg-quaternary dark:text-fg-quaternary-dark': !
                      isDragging
              }">
              <template x-if="files.length === 0">
                <div class="flex flex-col items-center justify-center gap-5">
                  <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M21 15V16.2C21 17.8802 21 18.7202 20.673 19.362C20.3854 19.9265 19.9265 20.3854 19.362 20.673C18.7202 21 17.8802 21 16.2 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V15M17 8L12 3M12 3L7 8M12 3V15"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div>
                    <p class="font-medium">Drag and drop a PDF file here</p>
                    <p class="text-sm text-fg-quaternary dark:text-fg-quaternary-dark">or click to browse</p>
                  </div>
                </div>
              </template>
              <template x-if="files.length > 0">
                <p class="font-medium text-green-600 dark:text-green-400">Files selected! See the list below.</p>
              </template>
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

      </form>

    </div>
  </div>
</x-app-layout>
