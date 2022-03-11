<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="bg-gray-800" x-data="{ openMobileMenu: false }">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" @click="openMobileMenu = ! openMobileMenu"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">openMobileMenu main menu</span>
                    <svg class="h-6 w-6" :class="{ 'block': !openMobileMenu, 'hidden': openMobileMenu}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="h-6 w-6" :class="{ 'block': openMobileMenu, 'hidden': !openMobileMenu}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/" class="flex-shrink-0 flex items-center">
                    <h2
                        class="block lg:hidden text-3xl font-semibold font-serif text-transparent bg-gradient-to-r bg-clip-text from-pink-700 to-purple-600">
                        L</h2>
                    <h2
                        class="hidden lg:block text-3xl font-semibold font-serif text-transparent bg-gradient-to-r bg-clip-text from-pink-700 to-purple-600">
                        Laraveller</h2>
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
                        <x-nav-link :href="route('frontend.posts.index')"
                            :active="request()->routeIs('frontend.posts.index')">
                            Posts
                        </x-nav-link>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <search-modal class="w-12 md:w-64 md:w-72" />
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="openMobileMenu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                aria-current="page">Dashboard</a>

            <a href="{{ route('frontend.topics.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Topics</a>

            <a href="{{ route('frontend.series.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Series</a>

            <a href="{{ route('frontend.lessons.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Lessons</a>
                <a href="{{ route('frontend.posts.index') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Posts</a>
        </div>
    </div>
</nav>
