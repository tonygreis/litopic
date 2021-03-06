<template>
    <button
        @click="isOpen = true"
        v-bind="$attrs"
        class="flex items-center space-x-2 border border-slate-800 bg-slate-800 shadow-sm px-3 py-1.5 hover:border-gray-300 focus:outline-none focus:border-gray-300 rounded-lg">
        <svg class="flex-none text-gray-400 -ml-1" width="24" height="24" fill="none" aria-hidden="true">
            <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></circle>
        </svg>
        <span class="text-sm hidden text-gray-400 md:block flex-1 text-left">Search...</span>
        <span class="hidden md:block flex-none text-xs font-semibold text-gray-400">{{ keyboardShortcut }}</span>
    </button>

    <TransitionRoot :show="isOpen" as="template">
        <Dialog
            @keydown="navigateResults"
            class="fixed inset-0 z-50 flex justify-center items-start"
            :open="isOpen" @close="isOpen = false">
            <TransitionChild
                enter="duration-200 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
                as="template">
                <DialogOverlay
                    class="fixed inset-0 bg-black bg-opacity-70"
                ></DialogOverlay>
            </TransitionChild>

            <TransitionChild
                enter="duration-200 ease-out"
                enter-from="opacity-0 scale-95"
                enter-to="opacity-100 scale-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100 scale-100"
                leave-to="opacity-0 scale-95"
                as="template">
                <div
                    class="flex flex-col overflow-hidden z-0 w-full max-w-xl bg-white dark:bg-slate-900 rounded-large mx-4 max-h-[80vh] mt-[10vh] relative"
                >
                    <form
                        @submit.prevent="onSubmit"
                        class="relative flex items-center m-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                            <svg
                                class="w-5 h-5 text-gray-700 dark:text-slate-300"
                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>

                        <input
                            @keydown="onTermKeydown"
                            @input="(e) => search(e.target.value)"
                            class="w-full py-4 pl-12 border-b border-gray-100 dark:text-slate-300 dark:border-gray-700 dark:bg-slate-700 focus:border-none outline-none placeholder-gray-400 rounded-large"
                            type="text" placeholder="Search...">

                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <button
                                @click="isOpen = false"
                                class="flex items-center p-1.5 uppercase font-semibold tracking-wider text-gray-700 dark:text-slate-300 rounded-md border border-gray-200 focus:outline-none focus:border-gray-300 text-xs"
                                type="button">Esc
                            </button>
                        </div>
                    </form>

                    <div class="overflow-auto">
                        <div v-if="isLoading" class="border border-blue-300 shadow rounded-md p-4 my-2 mx-2">
                            <div class="animate-pulse flex space-x-4">
                                <div class="rounded-full bg-slate-200 h-10 w-10"></div>
                                <div class="flex-1 space-y-6 py-1">
                                    <div class="h-2 bg-slate-200 rounded"></div>
                                    <div class="space-y-3">
                                        <div class="grid grid-cols-3 gap-4">
                                            <div class="h-2 bg-slate-200 rounded col-span-2"></div>
                                            <div class="h-2 bg-slate-200 rounded col-span-1"></div>
                                        </div>
                                        <div class="h-2 bg-slate-200 rounded"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul v-if="results.length > 0 && !isLoading"
                            class="m-2"
                        >
                            <li
                                v-for="(item, index) in results"
                                :key="index"
                                :ref="el => {resultsRefs[index] = el}"
                                :class="selectedIndex === index ? 'bg-gray-100 dark:bg-slate-800' : ''"
                                @mousemove="selectedIndex = index"
                                class="flex items-center px-4 py-2.5 relative rounded-large"
                            >
                                <img v-lazy="item.image" :alt="item.name"
                                     class="w-16 h-16 rounded-full object-cover border-white border-2 shrink-0 bg-gray-200"
                                >
                                <Link :href="item.url">
                                    <span class="absolute inset-0"></span>
                                </Link>
                                <div class="ml-3">
                                    <div class="font-semibold text-sm text-slate-600 dark:text-slate-300">
                                        {{ item.name }}
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <p v-if="results.length === 0" class="p-10 text-lg text-center text-gray-400">
                            No results...
                        </p>
                    </div>
                </div>
            </TransitionChild>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import {Dialog, DialogOverlay, TransitionChild, TransitionRoot} from "@headlessui/vue";
import {nextTick, onMounted, onUnmounted, ref} from "vue";
import axios from "axios";
import {debounce} from "lodash";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {Dialog, DialogOverlay, TransitionRoot, TransitionChild, Link},
    setup() {
        const isAppleOS = () => {
            const platform = navigator?.userAgentData?.platform || navigator?.platform || "unknown";
            return /(Mac|iPhone|iPod|iPad)/i.test(platform);
        }

        const keyboardShortcut = isAppleOS() ? "⌘K" : "Ctrl+K";
        const isOpen = ref(false);

        const onKeyDown = (event) => {
            if (isOpen.value) return;

            if ((event.metaKey || event.ctrlKey) && event.key === 'k') {
                isOpen.value = true;
            }
        };

        const results = ref([]);
        const resultsRefs = ref([]);
        const selectedIndex = ref(0);
        const isLoading = ref(false)

        const search = debounce(async (term) => {
            isLoading.value = true
            let {data} = await axios.get('/api/search', {params: {term: term}});
            results.value = data;
            isLoading.value = false
            await nextTick();
            resultsRefs.value = [];
        }, 250);

        const navigateResults = (event) => {
            switch (event.code) {
                case 'ArrowDown':
                    if (selectedIndex.value === results.value.length - 1) {
                        selectedIndex.value = 0;
                    } else {
                        selectedIndex.value += 1;
                    }
                    break;
                case 'ArrowUp':
                    if (selectedIndex.value === 0) {
                        selectedIndex.value = results.value.length - 1;
                    } else {
                        selectedIndex.value -= 1;
                    }
                    break;
            }

            resultsRefs.value[selectedIndex.value]?.scrollIntoView(false);
        }

        const onTermKeydown = (event) => {
            if (['ArrowUp', 'ArrowDown'].includes(event.code)) {
                event.preventDefault();
            }
        }

        const onSubmit = () => {
            if(results.value[selectedIndex.value]) {
                window.location = results.value[selectedIndex.value].url;
            }
        }

        onMounted(() => {
            window.addEventListener('keydown', onKeyDown);
            search();
        });
        onUnmounted(() => window.removeEventListener('keydown', onKeyDown));

        return {
            onSubmit,
            navigateResults,
            onTermKeydown,
            resultsRefs,
            selectedIndex,
            results,
            search,
            isOpen,
            keyboardShortcut,
            isLoading
        }
    },
}
</script>
