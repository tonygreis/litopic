<template>
    <Head title="Welcome" />
    <FrontendLayout>
       <div class="bg-gradient-to-r from-sky-500 to-indigo-500 dark:from-sky-900 dark:to-indigo-900">
           <div class="max-w-7xl mx-auto">
               <FrontendHero />
           </div>
       </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden mb-4">
                    <WelcomeTopicSection header="Topics" :data="topics" />
                </div>
                <div class="overflow-hidden mb-4">
                    <WelcomeSection header="Series" :data="series" />
                </div>
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-4 mx-auto">
                        <div class="flex flex-wrap -m-4 text-center">
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                    <h2 class="title-font font-medium text-3xl text-slate-900 dark:text-slate-300">Start Learning</h2>
                                    <Link class="leading-relaxed font-bold text-indigo-500 hover:text-indigo-700">Watch</Link>
                                </div>
                            </div>
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                    </svg>
                                    <h2 class="title-font font-medium text-3xl text-slate-900 dark:text-slate-300">{{ topics_count}}</h2>
                                    <p class="leading-relaxed text-slate-900 dark:text-slate-200">Topics</p>
                                </div>
                            </div>
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <h2 class="title-font font-medium text-3xl text-slate-900 dark:text-slate-300">{{ series_count}}</h2>
                                    <p class="leading-relaxed text-slate-900 dark:text-slate-200">Series</p>
                                </div>
                            </div>
                            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h2 class="title-font font-medium text-3xl text-slate-900 dark:text-slate-300">{{ lessons_count }}</h2>
                                    <p class="leading-relaxed text-slate-900 dark:text-slate-200">Lessons</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="overflow-hidden mb-4">
                    <WelcomeSection header="Lessons" :data="lessons" />
                </div>

            </div>
        </div>
    </FrontendLayout>
</template>

<script setup>
import { Head, Link} from '@inertiajs/inertia-vue3';
import FrontendLayout from "@/Layouts/Frontend";
import FrontendHero from "@/Components/FrontendHero";
import WelcomeSection from "@/Components/WelcomeSection";
import WelcomeTopicSection from "@/Components/WelcomeTopicSection";

const props = defineProps({
    topics: Array,
    series: Array,
    lessons: Array,
    topics_count: Number,
    series_count: Number,
    lessons_count: Number
})
</script>
