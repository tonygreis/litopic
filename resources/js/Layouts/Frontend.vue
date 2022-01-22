<template>
        <div class="flex flex-col bg-gray-50 dark:bg-slate-800">
            <FrontendNavbar class="flex-1" />
            <main class="flex-1 min-h-screen">
                <slot />
            </main>
            <FrontendFooter class="flex-1" />
        </div>
</template>

<script setup>
import FrontendNavbar from "@/Components/FrontendNavbar";
import FrontendFooter from "@/Components/FrontendFooter";

</script>
