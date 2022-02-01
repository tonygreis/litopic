<template>
    <div class="flex flex-col overflow-hidden">
        <div class="bg-dark-blue w-full py-5 px-3 md:px-8 flex items-center overflow-hidden order-1">
            <div class="relative w-full flex items-center">
                <a class="flex items-center md:mr-4" href="/courses/getting-started-with-nuxt-3">
                <svg width="24" height="24" fill="none" viewBox="0 0 24 24" class="w-7 h-7 text-white mr-3">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M19.25 12H5"></path>
                </svg>
            </a>
                <h1 class="md:text-lg text-white truncate text-ellipsis">Getting Started with Nuxt 3</h1>
                <div class="flex items-center ml-4">
                    <div class="mr-4">
                        <svg class="w-7 h-7 -rotate-90">
                            <circle class="text-gray-400 opacity-50" stroke-width="4" stroke="currentColor"
                                    fill="transparent" r="10" cx="14" cy="14"></circle>
                            <circle class="text-gray-300" stroke-width="4" stroke-dasharray="62.83185307179586"
                                    stroke-dashoffset="62.83185307179586" stroke-linecap="round" stroke="currentColor"
                                    fill="transparent" r="10" cx="14" cy="14"></circle>
                        </svg>
                        <span class="absolute text-xl text-blue-700" x-text="`${percent}%`"></span></div>
                    <div
                        class="text-xs uppercase tracking-wide text-white-o-50 font-medium bg-white-o-20 inline rounded-full px-2.5 py-0.5 mr-2 last:mr-0">
                        Nuxt.js
                    </div>
                </div>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                     class="absolute w-[100px] md:w-[150px] h-[100px] md:h-[150px] right-[0px] bottom-[-50px] md:bottom-[-60px] text-blue-4 opacity-20 rotate-12 bg-black rounded-full">
                    <rect width="14.5" height="14.5" x="4.75" y="4.75" stroke="currentColor" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="1.5" rx="2"></rect>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M8.75 10.75L11.25 13L8.75 15.25"></path>
                </svg>
            </div>
        </div>
        <div class="order-1 md:order-2 flex flex-col">
            <div class="w-full py-3 flex items-center px-3 md:px-6 bg-gray-50 dark:bg-nearly-black" id="mid-banner">
                <div class="flex items-center justify-between w-full">
                    <div class="flex items-center min-w-0">
                        <div
                            class="text-gray-400 dark:text-gray-600 leading-none mr-2 overflow-hidden truncate text-ellipsis">
                            <span
                                class="text-gray-500 text-sm dark:text-gray-400 font-medium dark:font-normal ml-1 truncate text-ellipsis">02/18. Installing Nuxt</span>
                        </div>
                        <div class="flex items-center">
                            <div class="v-popper v-popper--theme-null">
                                <button
                                    class="p-2 rounded-lg hover:bg-gray-100 text-dark-blue dark:text-white-o-75 dark:hover:bg-gray-900 disabled:opacity-25 disabled:hover:bg-transparent"
                                    disabled="">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                         class="w-6 h-6">
                                        <path
                                            d="M17.2502 19.25H6.75C5.64543 19.25 4.75 18.3546 4.75 17.25V6.75C4.75 5.64543 5.64543 4.75 6.75 4.75H17.2502C18.3548 4.75 19.2502 5.64543 19.2502 6.75V17.25C19.2502 18.3546 18.3548 19.25 17.2502 19.25Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path><!----></svg>
                                </button>
                            </div>
                            <div class="v-popper v-popper--theme-null"><a href="/parts/installing-nuxt-3/download"
                                                                          rel="nofollow"
                                                                          class="block p-2 rounded-lg hover:bg-gray-100 text-dark-blue dark:text-white-o-75 dark:hover:bg-gray-900 pointer-events-none opacity-25"
                                                                          disabled="true">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                    <path
                                        d="M6.25 14.25C6.25 14.25 4.75 14 4.75 12C4.75 10.2869 6.07542 8.88339 7.75672 8.75897C7.88168 6.5239 9.73368 4.75 12 4.75C14.2663 4.75 16.1183 6.5239 16.2433 8.75897C17.9246 8.88339 19.25 10.2869 19.25 12C19.25 14 17.75 14.25 17.75 14.25"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M14.25 16.75L12 19.25L9.75 16.75" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12 18.25V12.75" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a></div>
                            <div class="v-popper v-popper--theme-null">
                                <button
                                    class="p-2 rounded-lg hover:bg-gray-100 text-dark-blue dark:text-white-o-75 dark:hover:bg-gray-900 disabled:opacity-25 disabled:hover:bg-transparent">
                                    <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1.5" d="M19.25 12H5"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="v-popper v-popper--theme-null">
                                <button
                                    class="p-2 rounded-lg hover:bg-gray-100 text-dark-blue dark:text-white-o-75 dark:hover:bg-gray-900 disabled:opacity-25 disabled:hover:bg-transparent">
                                    <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1.5" d="M19 12H4.75"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center"><!---->
                        <div class="v-popper v-popper--theme-null">
                            <button
                                class="p-2 rounded-lg hover:bg-gray-100 text-dark-blue dark:text-white-o-75 dark:hover:bg-gray-900">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                    <path
                                        d="M6.5 6C6.5 6.27614 6.27614 6.5 6 6.5C5.72386 6.5 5.5 6.27614 5.5 6C5.5 5.72386 5.72386 5.5 6 5.5C6.27614 5.5 6.5 5.72386 6.5 6Z"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M6.5 12C6.5 12.2761 6.27614 12.5 6 12.5C5.72386 12.5 5.5 12.2761 5.5 12C5.5 11.7239 5.72386 11.5 6 11.5C6.27614 11.5 6.5 11.7239 6.5 12Z"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M6.5 18C6.5 18.2761 6.27614 18.5 6 18.5C5.72386 18.5 5.5 18.2761 5.5 18C5.5 17.7239 5.72386 17.5 6 17.5C6.27614 17.5 6.5 17.7239 6.5 18Z"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.75 6H18.25" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.75 12H18.25" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.75 18H18.25" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="v-popper v-popper--theme-null"></div>
                        <button
                            class="p-2 rounded-lg hover:bg-gray-100 text-dark-blue dark:text-white-o-75 dark:hover:bg-gray-900 hidden md:block">
                            <svg fill="none" viewBox="0 0 24 24" class="w-6 h-6">
                                <circle cx="12" cy="12" r="3.25" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M12 2.75V4.25"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M17.25 6.75L16.0659 7.93416"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M21.25 12.0001L19.75 12.0001"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M17.25 17.2501L16.0659 16.066"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M12 19.75V21.25"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M7.9341 16.0659L6.74996 17.25"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M4.25 12.0001L2.75 12.0001"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M7.93405 7.93423L6.74991 6.75003"></path>
                            </svg><!----></button>
                    </div>
                </div>
            </div>
            <div class="h-px opacity-75 dark:opacity-50"
                 style="background: linear-gradient(90deg, rgba(111, 118, 126, 0) 0%, rgba(111, 118, 126, 0.2) 30%, rgba(111, 118, 126, 0.2) 70%, rgba(111, 118, 126, 0) 100%);"></div>
        </div>
        <div
            class="w-full h-full flex items-stretch flex-wrap md:flex-nowrap md:pb-6 order-3 md:w-[calc(100%+350px+250px)] lg:w-[calc(100%+450px+350px)] bg-gray-100 dark:bg-nearly-black">
            <div
                class="px-0 md:px-6 md:mt-6 transition-all duration-200 mb-3 md:mb-0 flex-grow order-first w-full md:w-auto">
                <div class="bg-black mx-auto transition-all duration-200 w-full" id="player">
                    <div class="player">
                        <div id="player" data-vimeo-initialized="true">
                            <iframe
                                src="https://player.vimeo.com/video/640753422?h=f3ee10e590&amp;title=0&amp;byline=0&amp;app_id=122963"
                                width="640" height="360" frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen=""
                                title="02 - Installing Nuxt" data-ready="true"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="hidden md:block transition-all duration-200 mt-2 md:mt-6 md:relative overflow-y-scroll md:h-auto mb-3 md:mb-0 w-full md:w-[350px] lg:w-[450px] !block md:order-1 md:mr-[350px] lg:mr-[450px]"
                id="episode-list">
                <div class="py-6 px-3 md:px-0 pt-0 md:pr-6 md:absolute w-full h-full">
                    <div
                        class="flex items-center justify-between pb-6 sticky top-0 w-full bg-gray-100 dark:bg-nearly-black z-30">
                        <h1 class="font-medium leading-none dark:text-gray-400">Episodes (18)</h1><label
                        class="text-sm text-gray-500 flex items-center">
                        <button type="button"
                                class="flex-shrink-0 group relative rounded-full inline-flex items-center justify-center h-5 w-10 cursor-pointer focus:outline-none mr-2">
                            <span class="pointer-events-none absolute w-full h-full rounded-md"></span><span
                            class="bg-gray-200 dark:bg-gray-500 pointer-events-none absolute h-4 w-9 mx-auto rounded-full transition-colors ease-in-out duration-200"></span><span
                            class="pointer-events-none absolute left-0 inline-block h-5 w-5 border border-gray-200 rounded-full bg-white shadow transform ring-0 transition-transform ease-in-out duration-200 translate-x-0"></span>
                        </button>
                        Autoplay </label></div>
                    <a class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                       id="episode-4193" href="/watch/getting-started-with-nuxt-3?part=introduction-nuxt-3">
                        <div class="flex items-center w-full">
                            <div
                                class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                                <svg fill="none" viewBox="0 0 24 24"
                                     class="fill-current text-gray-400 opacity-75 w-5 h-5 -mr-[1px]">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.5" d="M18.25 12L5.75 5.75V18.25L18.25 12Z"></path>
                                </svg>
                            </div>
                            <div class="flex-grow min-w-0"><!----><h2
                                class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">
                                01. Introduction</h2></div>
                            <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4">
                                <!---->
                                <svg fill="none" viewBox="0 0 24 24"
                                     class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                    <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                    <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                                </svg>
                                <div class="whitespace-nowrap">00:46</div>
                            </div>
                        </div>
                    </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10 bg-gray-50 dark:bg-dark-2-o-10"
                    id="episode-4194" href="/watch/getting-started-with-nuxt-3?part=installing-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24"
                                 class="fill-current text-gray-400 opacity-75 w-5 h-5 -mr-[1px]">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="1.5" d="M18.25 12L5.75 5.75V18.25L18.25 12Z"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0">
                            <div class="text-xs uppercase tracking-wide text-gray-400 dark:text-gray-600">Now playing
                            </div>
                            <h2 class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">
                                02. Installing Nuxt</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">05:40</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4195" href="/watch/getting-started-with-nuxt-3?part=creating-pages-in-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">03.
                            Creating pages</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">04:50</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4196" href="/watch/getting-started-with-nuxt-3?part=linking-to-pages-nuxt">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">04.
                            Linking to pages</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">04:25</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4197" href="/watch/getting-started-with-nuxt-3?part=pages-with-params-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">05.
                            Pages with params</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">05:59</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4198" href="/watch/getting-started-with-nuxt-3?part=using-layouts-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">06.
                            Using layouts</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">04:22</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4199" href="/watch/getting-started-with-nuxt-3?part=components-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">07.
                            Components</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">04:47</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4200" href="/watch/getting-started-with-nuxt-3?part=simple-css-and-sass-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">08.
                            Simple CSS and Sass</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">03:53</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4201" href="/watch/getting-started-with-nuxt-3?part=fetching-data-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">09.
                            Fetching data</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">05:58</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4202" href="/watch/getting-started-with-nuxt-3?part=deferred-fetching-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">10.
                            Deferred fetching</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">05:14</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4203" href="/watch/getting-started-with-nuxt-3?part=picking-data-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">11.
                            Picking data</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">04:14</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4204" href="/watch/getting-started-with-nuxt-3?part=fetching-within-components">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">12.
                            Fetching within components</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">01:52</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4205" href="/watch/getting-started-with-nuxt-3?part=client-side-fetching-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">13.
                            Client-side fetching</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">03:15</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4206" href="/watch/getting-started-with-nuxt-3?part=managing-head-data-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">14.
                            Managing head data</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">03:19</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4207" href="/watch/getting-started-with-nuxt-3?part=dynamic-head-data-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">15.
                            Dynamic head data</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">03:11</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4208" href="/watch/getting-started-with-nuxt-3?part=composables-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">16.
                            Composables</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">05:28</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4213" href="/watch/getting-started-with-nuxt-3?part=public-files-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">17.
                            Public files</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">02:16</div>
                        </div>
                    </div>
                </a><a
                    class="flex justify-between items-center px-5 py-4 bg-white dark:bg-dark-2-o-5 rounded lg:flex-grow mb-1 w-full border border-gray-200 dark:border-none hover:bg-gray-50 dark:hover:bg-dark-2-o-10"
                    id="episode-4215" href="/watch/getting-started-with-nuxt-3?part=server-api-nuxt-3">
                    <div class="flex items-center w-full">
                        <div
                            class="flex justify-center items-center mr-5 ml-1 min-w-[2.25rem] min-h-[2.25rem] rounded-full bg-gray-100 dark:bg-gray-800">
                            <svg fill="none" viewBox="0 0 24 24" class="text-gray-400 opacity-75 w-5 h-5">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5.75 11.75C5.75 11.1977 6.19772 10.75 6.75 10.75H17.25C17.8023 10.75 18.25 11.1977 18.25 11.75V17.25C18.25 18.3546 17.3546 19.25 16.25 19.25H7.75C6.64543 19.25 5.75 18.3546 5.75 17.25V11.75Z"></path>
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M7.75 10.5V10.3427C7.75 8.78147 7.65607 7.04125 8.74646 5.9239C9.36829 5.2867 10.3745 4.75 12 4.75C13.6255 4.75 14.6317 5.2867 15.2535 5.9239C16.3439 7.04125 16.25 8.78147 16.25 10.3427V10.5"></path>
                            </svg>
                        </div>
                        <div class="flex-grow min-w-0"><!----><h2
                            class="text-dark-blue dark:text-gray-400 leading-snug truncate text-ellipsis text-sm">18.
                            Server API</h2></div>
                        <div class="text-xs text-dark-2 dark:text-gray-500 opacity-75 flex items-center ml-4"><!---->
                            <svg fill="none" viewBox="0 0 24 24" class="w-5 h-5 text-dark-2 dark:text-gray-500 mr-1">
                                <circle cx="12" cy="12" r="7.25" stroke="currentColor" stroke-width="1.5"></circle>
                                <path stroke="currentColor" stroke-width="1.5" d="M12 8V12L14 14"></path>
                            </svg>
                            <div class="whitespace-nowrap">06:04</div>
                        </div>
                    </div>
                </a></div>
            </div>
            <div
                class="hidden md:block transition-all duration-200 mt-2 md:mt-6 md:relative overflow-y-scroll md:h-auto mb-3 md:mb-0 w-full md:w-[250px] lg:w-[350px] md:order-2"
                id="episode-list">
                <div class="py-6 px-3 md:px-0 pt-0 md:pr-6 md:absolute w-full h-full">
                    <div
                        class="flex items-center justify-between pb-6 sticky top-0 w-full bg-gray-100 dark:bg-nearly-black z-30">
                        <h1 class="font-medium leading-none dark:text-gray-400">Resources</h1></div><!----><!----></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SeasonShow"
}
</script>

<style scoped>

</style>
