<x-main-layout>
    <div class="bg-gradient-to-r from-violet-500 to-fuchsia-500">
        <div class="max-w-7xl mx-auto">
            <x-hero />
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($topics)
                <div class="overflow-hidden mb-4">
                    <x-welcome-topic-section header="Topics" :topics="$topics" />
                </div>
            @endif
            <div class="overflow-hidden mb-4">
                <x-welcome-courses-section header="Courses" :courses="$courses" />
            </div>
        </div>
        <section class="text-gray-600 body-font bg-slate-100 dark:bg-slate-800">
            <div class="max-w-7xl p-4 mx-auto">
                <div class="flex flex-wrap m-4 text-center">
                    <div class="w-full md:w-1/3">
                        <div class="border-2 border-gray-200 m-4 px-4 py-6 rounded-lg">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-slate-900 dark:text-slate-300">
                                {{ count(\App\Models\Topic::all()) }}</h2>
                            <p class="leading-relaxed text-slate-900 dark:text-slate-200">Topics</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <div class="border-2 border-gray-200 px-4 py-6 m-4 rounded-lg">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-slate-900 dark:text-slate-300">
                                {{ count(\App\Models\Course::all()) }}</h2>
                            <p class="leading-relaxed text-slate-900 dark:text-slate-200">Courses</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3">
                        <div class="border-2 border-gray-200 px-4 py-6 m-4 rounded-lg">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h2 class="title-font font-medium text-3xl text-slate-900 dark:text-slate-300">
                                {{ count(\App\Models\Lesson::all()) }}</h2>
                            <p class="leading-relaxed text-slate-900 dark:text-slate-200">Lessons</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="max-w-7xl mx-auto mt-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden mb-4">
                <x-welcome-lessons-section header="Lessons" :lessons="$lessons" />
            </div>
            <div class="mt-6 p-4 bg-slate-100 dark:bg-slate-900 dark:text-slate-300">
                <h2>The PHP Framework for Web Artisans</h2><br>
                Learn Laravel from scratch for begginers.<br>
                Inertia js tutorial for beginners. <br>
                Laravel livewire tutorial for beginners.<br>
                Vuejs tutorial for beginners. <br>
                <span class="m-2 p-2">laravel framework</span>
                <span class="m-2 p-2">laravel collection</span>
                <span class="m-2 p-2">laravel validation</span>
                <span class="m-2 p-2">laravel authentication</span>
                <span class="m-2 p-2">laravel api</span>
                <span class="m-2 p-2">laravel admin panel</span>
            </div>
        </div>
    </div>
</x-main-layout>
