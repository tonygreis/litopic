<x-main-layout>
    <div class="py-1">
        <div class="bg-slate-200 dark:bg-slate-700 w-full py-5 px-3 md:px-8 flex flex-wrap lg:flex-nowrap items-center">
            <div class="relative w-full flex items-center">
                <a class="flex items-center md:mr-4" href="{{ route('frontend.series.show', $lesson->serie->slug) }}">
                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24"
                        class="w-7 h-7 text-indigo-800 dark:text-white mr-3">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19.25 12H5"></path>
                    </svg>
                </a>
                <h1 class="md:text-lg text-indigo-800 dark:text-gray-200 truncate text-ellipsis">
                    {{ $lesson->serie->name }}</h1>
            </div>
            <div class="flex items-center ml-4">
                {{-- <div
                        class="text-xs flex uppercase tracking-wide font-medium">
                        <span class="p-1 m-1 flex text-slate-900 dark:text-slate-300 bg-slate-300 dark:bg-slate-800 rounded" v-for="topic in serie.topics">{{ topic.name }}</span>
                    </div> --}}
            </div>
        </div>
        <div class="h-full flex overflow-hidden flex-col space-y-4 xl:space-y-0 xl:flex-row max-w-12xl mx-auto">
            <div class="relative flex-1 bg-gray-900">
                <div class="aspect-w-16 aspect-h-9">
                    {!! $lesson->embed_html !!}
                </div>
                <div class="w-full">
                    <div class="flex flex-col">
                        <div class="w-full py-3 flex items-center px-3 md:px-6 bg-gray-50 dark:bg-slate-900"
                            id="mid-banner">
                            <div class="flex items-center justify-between w-full">
                                <div class="flex items-center min-w-0">
                                    <div
                                        class="text-gray-400 dark:text-gray-600 leading-none mr-2 overflow-hidden truncate text-ellipsis">
                                        <span
                                            class="text-gray-500 text-sm dark:text-gray-400 font-medium dark:font-normal ml-1 truncate text-ellipsis">{{ $lesson->title }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        @if ($previous)
                                            <div class="v-popper v-popper--theme-null" v-if="lesson.previous">
                                                <a href="{{ route('frontend.lessons.show', $previous->slug) }}"
                                                    class="p-2 rounded-lg hover:bg-gray-100 text-blue-500 dark:text-blue-700 dark:hover:bg-gray-800 disabled:opacity-25 disabled:hover:bg-transparent">
                                                    <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5"
                                                            d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        @endif
                                        @if ($next)
                                            <div class="v-popper v-popper--theme-null" v-if="lesson.next">
                                                <a href="{{ route('frontend.lessons.show', $next->slug) }}"
                                                    class="p-2 rounded-lg hover:bg-gray-100 text-blue-500 dark:text-blue-700 dark:hover:bg-gray-800 disabled:opacity-25 disabled:hover:bg-transparent">
                                                    <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5"
                                                            d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="1.5" d="M19 12H4.75">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full xl:w-96 bg-slate-100 dark:bg-slate-900 flex-col flex">
                <div class="p-4">
                    <div class="flex justify-between items-center space-x-2">
                        <div class="flex space-x-1 shrink-0 text-sm text-indigo-700 dark:text-indigo-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <span>{{ $serie->lessons()->count() }} Lessons</span>
                        </div>
                    </div>
                </div>
                <div class="flex xl:relative flex-col flex-1" scroll-region>
                    <ul class="flex xl:overflow-y-scroll xl:absolute flex-col w-full h-full px-2">
                        @foreach ($serie->lessons as $serie_lesson)
                            <li class="">
                                <a class="flex justify-between items-center px-5 py-4 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-slate-700 bg-slate-300 dark:bg-slate-700"
                                    href="{{ route('frontend.lessons.show', [$serie->slug, $serie_lesson->slug]) }}">
                                    <div class="flex items-center w-full">
                                        <div class="flex justify-center text-slate-900 dark:text-white items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800"
                                            :class="{'text-blue-200 bg-blue-500 dark:text-blue-400 dark:bg-blue-700': lsn.id === lesson.id}">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div class="flex-grow min-w-0">
                                            <!---->
                                            <h2
                                                class="text-dark-blue dark:text-gray-400 leading-snug text-ellipsis text-sm">
                                                {{ $serie_lesson->title }}</h2>
                                            <div
                                                class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center">
                                                <!---->
                                                <svg fill="none" viewBox="0 0 24 24"
                                                    class="w-5 h-5 text-yellow-400 mr-1">
                                                    <circle cx="12" cy="12" r="7.25" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                    <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14">
                                                    </path>
                                                </svg>
                                                <div class="whitespace-nowrap">{{ $serie_lesson->duration }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
