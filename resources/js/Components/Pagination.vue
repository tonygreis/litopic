<template>
    <div class="flex justify-around md:w-full">
        <div class="hidden md:flex flex-wrap">
            <template v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    v-html="link.label"
                    class="
          mb-1
          mr-1
          px-4
          py-3
          text-gray-400 dark:text-slate-700 text-sm
          leading-4
          border
          rounded
        "
                ></div>
                <Link
                    :key="key"
                    v-else
                    :href="link.url"
                    v-html="link.label"
                    class="
          mb-1
          mr-1
          px-4
          py-3
          text-sm
          leading-4
          border
          dark:text-slate-300
          rounded
          focus:text-indigo-500 focus:border-indigo-500
          hover:bg-white dark:hover:bg-slate-700
        "
                    :class="{ 'bg-indigo-200 dark:text-slate-800': link.active }"
                />
            </template>
        </div>

        <Link
            v-if="prevPageUrl"
            :href="prevPageUrl"
            class="
            md:hidden
          mb-1
          mr-1
          px-4
          py-3
          text-sm
          leading-4
          border
          dark:text-slate-300
          rounded
          focus:text-indigo-500 focus:border-indigo-500
          hover:bg-white dark:hover:bg-slate-700
        ">Previous
        </Link>
        <Link
            v-if="nextPageUrl"
            :href="nextPageUrl"
            class="
            md:hidden
          mb-1
          mr-1
          px-4
          py-3
          text-sm
          leading-4
          border
          dark:text-slate-300
          rounded
          focus:text-indigo-500 focus:border-indigo-500
          hover:bg-white dark:hover:bg-slate-700
        ">Next
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

defineProps({
  links: Array,
  nextPageUrl: String,
  prevPageUrl: String
});
</script>

<style>
</style>
