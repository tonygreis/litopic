<template>
    <Head title="Laraveller Topics - Laraveller.com" />
    <FrontendLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden mb-4">
                    <WelcomeSection :data="topics.data" />
                    <div class="my-4 p-2 bg-slate-300 dark:bg-slate-900 rounded-lg">
                        <Pagination :links="topics.links" :prev-page-url="topics.prev_page_url" :next-page-url="topics.next_page_url" />
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
    topics: Object,
})
</script>
