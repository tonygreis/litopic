<template>
    <img v-lazy="url" :alt="alt"
         class="object-cover h-full w-full group-hover:opacity-75">
</template>

<script setup>
defineProps({
    url: {
        required: true,
        type: String
    },
    alt: {
        required: true,
        type: String
    }
})
</script>

<style scoped>

</style>
