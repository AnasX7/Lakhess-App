<nav
    class="fixed z-50 flex h-screen w-[18.5rem] flex-col justify-between border-r-[1px] border-border-secondry bg-bg-primary px-4 pb-8 pt-6 dark:border-border-secondry-dark dark:bg-bg-primary-dark">

    <div class="flex flex-col gap-6">

        <div class="flex flex-col justify-between w-full gap-6">
            <div class="flex items-center justify-between px-2">

                <div class="flex items-center gap-[10px]">
                    <x-application-logo class="h-[40px] w-[40px]" />
                    <span class="font-zain text-2xl font-[900] text-fg-primary dark:text-fg-primary-dark">Lakhess</span>
                </div>

                <x-dark-mode-toggle />

            </div>

            <form action="{{ route('search') }}" method="GET">
                @csrf
                <label
                    class="flex items-center justify-between w-full input input-bordered border-border-primary bg-bg-primary dark:border-border-primary-dark dark:bg-bg-primary-dark">
                    <input type="text" name="search"
                        class="w-[180px] grow border-none bg-transparent px-0 text-fg-quaternary placeholder-fg-quaternary outline-none focus:ring-0 dark:text-fg-quaternary-dark dark:placeholder-fg-quaternary-dark"
                        placeholder="Search" />
                    <div class="flex gap-1">
                        <kbd
                            class="kbd kbd-sm border-border-primary bg-bg-active text-fg-tertiary dark:border-border-primary-dark dark:bg-bg-active-dark dark:text-fg-tertiary-dark">⌘</kbd>
                        <kbd
                            class="kbd kbd-sm border-border-primary bg-bg-active text-fg-tertiary dark:border-border-primary-dark dark:bg-bg-active-dark dark:text-fg-tertiary-dark">K</kbd>
                    </div>
                </label>
            </form>

        </div>

        <div class="flex flex-col w-full">

            <x-sidenav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg class="w-5 h-5" width="100%" height="100%" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4.5 22V17M4.5 7V2M2 4.5H7M2 19.5H7M13 3L11.2658 7.50886C10.9838 8.24209 10.8428 8.60871 10.6235 8.91709C10.4292 9.1904 10.1904 9.42919 9.91709 9.62353C9.60871 9.84281 9.24209 9.98381 8.50886 10.2658L4 12L8.50886 13.7342C9.24209 14.0162 9.60871 14.1572 9.91709 14.3765C10.1904 14.5708 10.4292 14.8096 10.6235 15.0829C10.8428 15.3913 10.9838 15.7579 11.2658 16.4911L13 21L14.7342 16.4911C15.0162 15.7579 15.1572 15.3913 15.3765 15.0829C15.5708 14.8096 15.8096 14.5708 16.0829 14.3765C16.3913 14.1572 16.7579 14.0162 17.4911 13.7342L22 12L17.4911 10.2658C16.7579 9.98381 16.3913 9.8428 16.0829 9.62353C15.8096 9.42919 15.5708 9.1904 15.3765 8.91709C15.1572 8.60871 15.0162 8.24209 14.7342 7.50886L13 3Z"
                        stroke="#717680" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Summarize</span>
            </x-sidenav-link>

            <ul class="w-full px-0 menu rounded-box">
                <li>
                    <details open>
                        <summary
                            class="font-semibold hover:text-fg-secondary-hover dark:hover:text-fg-secondary-dark-hover text-fg-secondry hover:bg-bg-active dark:text-fg-secondry-dark dark:hover:bg-bg-active-dark">
                            <svg class="w-5 h-5" width="100%" height="100%" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 7L11.8845 4.76892C11.5634 4.1268 11.4029 3.80573 11.1634 3.57116C10.9516 3.36373 10.6963 3.20597 10.4161 3.10931C10.0992 3 9.74021 3 9.02229 3H5.2C4.0799 3 3.51984 3 3.09202 3.21799C2.71569 3.40973 2.40973 3.71569 2.21799 4.09202C2 4.51984 2 5.0799 2 6.2V7M2 7H17.2C18.8802 7 19.7202 7 20.362 7.32698C20.9265 7.6146 21.3854 8.07354 21.673 8.63803C22 9.27976 22 10.1198 22 11.8V16.2C22 17.8802 22 18.7202 21.673 19.362C21.3854 19.9265 20.9265 20.3854 20.362 20.673C19.7202 21 18.8802 21 17.2 21H6.8C5.11984 21 4.27976 21 3.63803 20.673C3.07354 20.3854 2.6146 19.9265 2.32698 19.362C2 18.7202 2 17.8802 2 16.2V7Z"
                                    stroke="#717680" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Folders
                        </summary>
                        <ul>
                            @if (Request::is('search*'))
                                {{-- TODO: make this somehow on a controller --}}
                                @php
                                    /**
                                     * Since this is shared between multiple blade files, we did not find a way (yet) to put it on
                                     * a controller without making a new one.
                                     * So we do some php code here.... :(
                                     *
                                     */

                                    //Make some empty folders
                                    $folders = [];

                                    //retrive the data from the session
                                    $summaries = session('summaries');
                                    $total = session('total');

                                    foreach ($summaries as $summary) {
                                        // Check if the folder is already in the folders array
                                        if (!in_array($summary->folder, $folders)) {
                                            array_push($folders, $summary->folder);
                                        }
                                    }

                                @endphp

                                <li>
                                    <x-sidenav-link class="justify-between" href="{{ route('summaries') }}"
                                        :active="request()->routeIs('summaries')">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" width="100%" height="100%" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.49999 3L6.49999 21M17.5 3L14.5 21M20.5 8H3.5M19.5 16H2.5"
                                                    stroke="#717680" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span>View all</span>
                                        </div>
                                        <div
                                            class="border-1 badge badge-md border-border-primary bg-bg-active text-fg-tertiary dark:border-border-primary-dark dark:bg-bg-active-dark dark:text-fg-tertiary-dark">
                                            @php
                                                $total_view = 0;
                                                foreach ($folders as $folder) {
                                                    foreach ($folder->summaries as $summary) {
                                                        $total_view++;
                                                    }
                                                }
                                                echo $total_view;
                                            @endphp
                                        </div>
                                    </x-sidenav-link>
                                </li>
                                <li>
                                    <x-sidenav-link class="justify-between" href="{{ route('favorites') }}"
                                        :active="request()->routeIs('favorites')">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" width="100%" height="100%" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.1111 3C19.6333 3 22 6.3525 22 9.48C22 15.8138 12.1778 21 12 21C11.8222 21 2 15.8138 2 9.48C2 6.3525 4.36667 3 7.88889 3C9.91111 3 11.2333 4.02375 12 4.92375C12.7667 4.02375 14.0889 3 16.1111 3Z"
                                                    stroke="#717680" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span>Favorite</span>
                                        </div>
                                        <div
                                            class="border-1 badge badge-md border-border-primary bg-bg-active text-fg-tertiary dark:border-border-primary-dark dark:bg-bg-active-dark dark:text-fg-tertiary-dark">
                                            0</div>
                                    </x-sidenav-link>
                                </li>

                                @foreach ($folders as $folder)
                                    <li>
                                        <x-sidenav-link class="justify-between"
                                            href="{{ route('folders.show', $folder->id) }}" :active="request()->routeIs('folders.show') &&
                                                request()->route('folderId') == $folder->id">
                                            <div class="flex items-center gap-2">
                                                <div class="h-4 w-4 rounded-[4px]"
                                                    style="background-color: {{ $folder->color }};"></div>
                                                <span>{{ $folder->name }}</span>
                                            </div>
                                            <div
                                                class="border-1 badge badge-md border-border-primary bg-bg-active text-fg-tertiary dark:border-border-primary-dark dark:bg-bg-active-dark dark:text-fg-tertiary-dark">
                                                {{ $total[$folder->id] }}</div>
                                        </x-sidenav-link>
                                    </li>
                                @endforeach
                            @else
                                <li>
                                    <x-sidenav-link class="justify-between" href="{{ route('summaries') }}"
                                        :active="request()->routeIs('summaries')">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" width="100%" height="100%" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.49999 3L6.49999 21M17.5 3L14.5 21M20.5 8H3.5M19.5 16H2.5"
                                                    stroke="#717680" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span>View all</span>
                                        </div>
                                        <div
                                            class="border-1 badge badge-md border-border-primary bg-bg-active text-fg-tertiary dark:border-border-primary-dark dark:bg-bg-active-dark dark:text-fg-tertiary-dark">
                                            @php
                                                $folders = auth()->user()->folders;
                                                $total_view = 0;
                                                foreach ($folders as $folder) {
                                                    foreach ($folder->summaries as $summary) {
                                                        $total_view++;
                                                    }
                                                }
                                                echo $total_view;
                                            @endphp
                                        </div>
                                    </x-sidenav-link>
                                </li>
                                <li>
                                    <x-sidenav-link class="justify-between" href="{{ route('favorites') }}"
                                        :active="request()->routeIs('favorites')">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" width="100%" height="100%" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.1111 3C19.6333 3 22 6.3525 22 9.48C22 15.8138 12.1778 21 12 21C11.8222 21 2 15.8138 2 9.48C2 6.3525 4.36667 3 7.88889 3C9.91111 3 11.2333 4.02375 12 4.92375C12.7667 4.02375 14.0889 3 16.1111 3Z"
                                                    stroke="#717680" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <span>Favorite</span>
                                        </div>
                                        <div
                                            class="border-1 badge badge-md border-border-primary bg-bg-active text-fg-tertiary dark:border-border-primary-dark dark:bg-bg-active-dark dark:text-fg-tertiary-dark">
                                            0</div>
                                    </x-sidenav-link>
                                </li>
                                @foreach ($folders as $folder)
                                    <li>
                                        <x-sidenav-link class="justify-between"
                                            href="{{ route('folders.show', $folder->id) }}" :active="request()->routeIs('folders.show') &&
                                                request()->route('folderId') == $folder->id">
                                            <div class="flex items-center gap-2">
                                                <div class="h-4 w-4 rounded-[4px]"
                                                    style="background-color: {{ $folder->color }};"></div>
                                                <span>{{ $folder->name }}</span>
                                            </div>
                                            <div
                                                class="border-1 badge badge-md border-border-primary bg-bg-active text-fg-tertiary dark:border-border-primary-dark dark:bg-bg-active-dark dark:text-fg-tertiary-dark">
                                                {{ $folder->summaries->count() }}
                                            </div>
                                        </x-sidenav-link>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </details>
                </li>
            </ul>

        </div>

    </div>

    <div class="py-0 dropdown dropdown-end dropdown-right">
        <div tabindex="0" role="button"
            class="btn flex h-16 w-full flex-col items-center justify-center gap-1 rounded-[12px] border border-border-secondry bg-bg-primary px-2 hover:border-border-primary hover:bg-bg-active dark:border-border-secondry-dark dark:bg-bg-primary-dark hover:dark:border-border-primary-dark dark:hover:bg-bg-active-dark">
            <div class="flex gap-2">
                <div class="relative">
                    <img class="w-10 h-10 rounded-full" src="{{ auth()->user()->avatar_url }}" alt="User Avatar">
                    <span
                        class="absolute bottom-0 left-7 h-3.5 w-3.5 rounded-full border-2 border-white bg-green-400 dark:border-gray-800"></span>
                </div>

                <div class="flex flex-col items-start">
                    <span
                        class="text-sm font-semibold text-fg-primary dark:text-fg-primary-dark">{{ auth()->user()->name }}</span>
                    <span
                        class="text-sm font-regular text-fg-tertiary dark:text-fg-tertiary-dark">{{ auth()->user()->email }}</span>
                </div>
            </div>

            <svg class="w-5 h-5" width="20" height="20" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M7 15L12 20L17 15M7 9L12 4L17 9" stroke="#717680" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>
        <ul tabindex="0"
            class="menu dropdown-content z-[1] ml-2 w-40 rounded-[12px] border border-border-secondry bg-bg-primary p-2 shadow dark:border-border-secondry-dark dark:bg-bg-primary-dark">
            <li>
                <x-dropdown-link :href="route('profile.edit')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#717680" class="size-5">
                        <path fill-rule="evenodd"
                            d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                            clip-rule="evenodd" />
                    </svg>
                    Profile
                </x-dropdown-link>
            </li>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                              this.closest('form').submit();">

                    <svg class="w-5 h-5" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16 17L21 12M21 12L16 7M21 12H9M9 3H7.8C6.11984 3 5.27976 3 4.63803 3.32698C4.07354 3.6146 3.6146 4.07354 3.32698 4.63803C3 5.27976 3 6.11984 3 7.8V16.2C3 17.8802 3 18.7202 3.32698 19.362C3.6146 19.9265 4.07354 20.3854 4.63803 20.673C5.27976 21 6.11984 21 7.8 21H9"
                            stroke="#717680" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Log Out
                </x-dropdown-link>

            </form>

        </ul>
    </div>
</nav>
