<template>
    <Link
        :href="link"
        class="
                  px-4
                  py-2
                  bg-green-600
                  hover:bg-green-800
                  text-white
                  rounded-lg
                "
    >
       <slot />
    </Link>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import { defineProps} from "vue";
defineProps({
    link: String
})
</script>
