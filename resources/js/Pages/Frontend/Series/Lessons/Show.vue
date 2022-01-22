<template>
    <Head :title="lesson.title" />
    <FrontendLayout>
        <div class="py-1">
            <div class="h-full flex overflow-hidden flex-col space-y-4 xl:space-y-0 xl:flex-row max-w-12xl mx-auto">
                <div class="relative flex-1 bg-gray-900">
                    <div class="aspect-w-16 aspect-h-9" v-html="lesson.embed_html">
                    </div>
                    <div class="flex justify-end">
                        <div class="grid grid-cols-5 w-full max-w-xl divide-x divide-gray-700">

                        </div>
                    </div>
                </div>
                <div class="w-full xl:w-96 bg-slate-100 dark:bg-slate-900 flex-col flex">
                    <div class="p-4 bg-gray-900">
                        <h1 class="mb-6 text-xl font-bold text-center text-white">
                          {{ serie.name }}
                        </h1>
                        <div class="flex justify-between items-center mb-6 space-x-2">
                            <div class="w-1/2 text-left"></div>
                            <div class="flex space-x-1 shrink-0 text-sm text-white text-indigo-700 dark:text-indigo-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <span>{{ lessons.length }} Lessons</span>
                            </div>
                        </div>
                        <h3 class="font-semibold tracking-wide text-indigo-400">{{ lesson.title }}</h3>
                    </div>
                    <div class="flex xl:relative flex-col flex-1">
                        <ul class="flex xl:overflow-y-scroll xl:absolute flex-col w-full h-full">
                            <li class="" v-for="(les, index) in lessons" :key="les.id">
                                <Link :href="route('frontend.lessons.show', [serie.slug, les.slug])"
                                      :class="{'bg-slate-300 dark:bg-slate-800': les.id === lesson.id, 'bg-slate-100 dark:bg-slate-900': les.id !== lesson.id}"
                                class="font-medium px-4 py-3 flex space-x-4 items-center text-slate-600 dark:text-slate-300  hover:bg-slate-300 dark:hover:bg-slate-800">
                                    <span class="shrink-0 rounded-full inline-flex ring-2 text-slate-700 dark:text-slate-100 ring-black dark:ring-white font-semibold justify-center items-center self-start w-7 h-7 text-sm font-normal leading-relaxed text-center bg-indigo-300 dark:bg-indigo-600">
                                       {{ index + 1 }}
                                    </span>
                                <div class="flex flex-1 flex-col space-y-0.5">
                                    <div class="text-sm">{{ les.title }}</div>
                                    <div class="text-xs text-slate-700 dark:text-slate-100"> {{ les.duration }}</div>
                                </div>
                            </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>

<script setup>
import { Head, Link} from '@inertiajs/inertia-vue3';
import FrontendLayout from "@/Layouts/Frontend";

const props = defineProps({
    lesson: Object,
    serie: Object,
    lessons: Array
})
</script>
