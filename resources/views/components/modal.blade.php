<div x-data="{show: @entangle($attributes->wire('model')).defer}"
     x-show="show"
     x-on:keydown.meta.k.window="show = true; $refs.input.focus();"
    x-on:keydown.escape.window="show = false"
     class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40">
    {{-- background --}}
    <div x-show="show" class="fixed inset-0 transform" x-on:click="show =false">
        <div class="absolute inset-0 bg-slate-500 opacity-75"></div>
    </div>
    {{-- wraper --}}
    <div x-show="show"
        class="bg-white dark:bg-slate-900 rounded-large overflow-hidden transform sm:w-full sm:mx-auto max-w-lg">
        {{ $slot }}
    </div>
</div>
