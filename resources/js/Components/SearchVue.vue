<template>
    <button
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

</template>

<script>

export default {

}
</script>
