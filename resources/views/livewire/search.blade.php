<div  x-data="{show: @entangle('show')}">
    <button x-data="{}" x-on:click="show = true; $nextTick(() => $refs.input.focus());"
            class="w-12 md:w-64 flex items-center space-x-2 border border-slate-800 bg-slate-700 shadow-sm px-3 py-1.5 hover:border-gray-300 focus:outline-none focus:border-gray-300 rounded-lg">
        <svg class="flex-none text-gray-400 -ml-1" width="24" height="24" fill="none" aria-hidden="true">
            <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"></path>
            <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"></circle>
        </svg>
        <span class="text-sm hidden text-gray-400 md:block flex-1 text-left">Search...</span>
        <span class="hidden md:block flex-none text-xs font-semibold text-gray-400">⌘K</span>
    </button>
    <div
         x-show="show"
         x-on:keydown.meta.k.window="show = true; $nextTick(() => $refs.input.focus());"
         x-on:keydown.escape.window="window.livewire.emitTo('search', 'close')"
         class="fixed inset-0 overflow-y-auto px-4 py-6 md:py-24 sm:px-0 z-40">
        {{-- background --}}
        <div x-show="show" class="fixed inset-0 transform" x-on:click="window.livewire.emitTo('search', 'close')">
            <div class="absolute inset-0 bg-slate-500 opacity-75"></div>
        </div>
        {{-- wraper --}}
        <div x-show="show"
             class="bg-white dark:bg-slate-900 rounded-large overflow-hidden transform sm:w-full sm:mx-auto max-w-lg">
            <div  x-trap="show"
                  class="flex flex-col overflow-hidden z-0 w-full max-w-xl bg-white dark:bg-slate-900 rounded-large max-h-[80vh] relative">
                <form class="relative flex items-center m-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-700 dark:text-slate-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <input wire:model.debounce.500="search" x-ref="input"
                           class="w-full py-4 pl-12 border-b border-gray-100 dark:text-slate-300 dark:border-gray-700 dark:bg-slate-700 focus:border-none outline-none placeholder-gray-400 rounded-large"
                           type="text" placeholder="Search...">

                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <button @click="window.livewire.emitTo('search', 'close')"
                                class="flex items-center p-1.5 uppercase font-semibold tracking-wider text-gray-700 dark:text-slate-300 rounded-md border border-gray-200 focus:outline-none focus:border-gray-300 text-xs"
                                type="button">Esc
                        </button>
                    </div>
                </form>
                @if ($search)
                    <div class="overflow-auto">
                        <div wire:loading class="border border-blue-300 shadow rounded-md p-4 my-2 mx-2">
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
                        @if (count($searchResults) > 0)
                            <ul class="m-2">
                                @foreach ($searchResults as $lesson)
                                    <li
                                        class="flex items-center px-4 py-2.5 relative rounded-large bg-gray-100 dark:bg-slate-800">
                                        <img src="{{ $lesson->thumbnail_url }}" alt="{{ $lesson->title }}"
                                             class="w-16 h-16 rounded-full object-cover border-white border-2 shrink-0 bg-gray-200">
                                        <a
                                            href="{{ route('frontend.lessons.show', [$lesson->serie->slug, $lesson->slug]) }}">
                                            <span class="absolute inset-0"></span>
                                        </a>
                                        <div class="ml-3">
                                            <div class="font-semibold text-sm text-slate-600 dark:text-slate-300">
                                                {{ $lesson->title }}
                                            </div>
                                            <div class="text-xs text-slate-600 dark:text-slate-300 mt-1">
                                                {{ $lesson->serie->name }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p v-if="results.length === 0" class="p-10 text-lg text-center text-gray-400">
                                No results...
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
