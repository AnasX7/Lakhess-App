<a href="{{ route('summaries.show', $summary->id) }}" class="w-full">
  <div
    class="flex items-center justify-between w-full px-4 py-3 border rounded-lg border-border-primary bg-bg-active dark:border-border-primary-dark dark:bg-bg-active-dark">
    <div class="flex items-center gap-10">
      <div class="h-5 w-5 rounded-[4px]"
        style="background-color: {{ \App\Models\Folder::find($summary->folder_id)->color }};"></div>
      <span class="text-base font-semibold text-fg-secondry dark:text-fg-secondry-dark">{{ $summary->title }}</span>
    </div>

    <div class="flex gap-3">
      @if (!$summary->favorite)
        <a href="{{ route('favorites.check', $summary->id) }}">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M16.1111 3C19.6333 3 22 6.3525 22 9.48C22 15.8138 12.1778 21 12 21C11.8222 21 2 15.8138 2 9.48C2 6.3525 4.36667 3 7.88889 3C9.91111 3 11.2333 4.02375 12 4.92375C12.7667 4.02375 14.0889 3 16.1111 3Z"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </a>
      @else
        <a href="{{ route('favorites.uncheck', $summary->id) }}">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="#f43f5e" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M16.1111 3C19.6333 3 22 6.3525 22 9.48C22 15.8138 12.1778 21 12 21C11.8222 21 2 15.8138 2 9.48C2 6.3525 4.36667 3 7.88889 3C9.91111 3 11.2333 4.02375 12 4.92375C12.7667 4.02375 14.0889 3 16.1111 3Z"
              stroke="#f43f5e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </a>
      @endif

      <a href="{{ route('summaries.export', $summary->id) }}">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3 21H21M12 3V17M12 17L19 10M12 17L5 10" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </a>
    </div>
  </div>
</a>
