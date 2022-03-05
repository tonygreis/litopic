<nav>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <div class="flex md:hidden">
                    <button type="button"
                        class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/" class="flex-shrink-0 flex items-center">
                    <h1
                        class="block lg:hidden text-3xl font-semibold font-serif text-transparent bg-gradient-to-r bg-clip-text from-pink-700 to-purple-600">
                        L</h1>
                    <h1
                        class="hidden lg:block text-3xl font-semibold font-serif text-transparent bg-gradient-to-r bg-clip-text from-pink-700 to-purple-600">
                        Laraveller</h1>
                </a>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <x-nav-link :href="route('frontend.topics.index')"
                            :active="request()->routeIs('frontend.topics.index')">
                            Topic
                        </x-nav-link>
                        <x-nav-link :href="route('frontend.series.index')"
                            :active="request()->routeIs('frontend.series.index')">
                            Series
                        </x-nav-link>
                        <x-nav-link :href="route('frontend.lessons.index')"
                            :active="request()->routeIs('frontend.lessons.index')">
                            Lessons
                        </x-nav-link>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <button x-data="{}" x-on:click="window.livewire.emitTo('search-modal', 'show')"
                    class="flex items-center space-x-2 border border-slate-800 bg-slate-800 shadow-sm px-3 py-1.5 hover:border-gray-300 focus:outline-none focus:border-gray-300 rounded-lg">
                    <svg class="flex-none text-gray-400 -ml-1" width="24" height="24" fill="none" aria-hidden="true">
                        <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></circle>
                    </svg>
                    <span class="text-sm hidden text-gray-400 md:block flex-1 text-left">Search...</span>
                    <span class="hidden md:block flex-none text-xs font-semibold text-gray-400">K</span>
                </button>
            </div>
        </div>
    </div>
</nav>


