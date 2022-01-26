<template>
    <Head :title="topic.name" />
    <FrontendLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-2 bg-slate-300 dark:bg-slate-700 mb-3 rounded-md">
                    <h2 class="text-2xl font-bold text-indigo-700 dark:text-indigo-400 font-serif">Topic: {{ topic.name }}</h2>
                </div>
                <div class="overflow-hidden mb-4">
                    <WelcomeSection :data="series.data" />
                    <div class="my-4 p-2 bg-slate-300 dark:bg-slate-900 rounded-lg">
                        <Pagination :links="series.links" :prev-page-url="series.prev_page_url" :next-page-url="series.next_page_url" />
                    </div>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>

<script setup>
import { Head} from '@inertiajs/inertia-vue3';
import FrontendLayout from "@/Layouts/Frontend";
import WelcomeSection from "@/Components/WelcomeSection";
import Pagination from "@/Components/Pagination";

const props = defineProps({
    topic: Object,
    series: Object
})
</script>
