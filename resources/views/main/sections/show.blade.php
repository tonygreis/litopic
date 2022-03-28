<x-block-layout>
    <div class="lg:flex" x-data="{asideOpen: false}">
        <aside id="sidebar" class="fixed inset-0 z-20 flex-none w-72 h-full lg:static lg:h-auto lg:overflow-y-visible lg:pt-0 lg:w-64 lg:block hidden">
            <div id="navWrapper" class="overflow-hidden overflow-y-auto z-20 h-full bg-white scrolling-touch max-w-2xs lg:h-screen lg:block lg:sticky top:24 lg:top-12 dark:bg-gray-900 lg:mr-0">
                <nav id="nav" class="pt-16 px-1 pl-3 lg:pt-2 overflow-y-auto font-medium text-base lg:text-sm pb-10 lg:pb-20 sticky?lg:h-(screen-18)" aria-label="Docs navigation">
                     <h2 class="text-xl font-semibold font-serif">Free components</h2>
                    <div class="w-48 text-gray-900 text-sm font-medium mt-6">
                    @foreach($main_component->sections as $c_section)
                                <a href="{{ route('frontend.sections.show', [$main_component->slug, $c_section->slug]) }}"
                                   class="block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:text-blue-700 cursor-pointer">{{ $c_section->name }} </a>
                        @endforeach
                    </div>
                </nav>
            </div>
        </aside>
        <div class="fixed inset-0 z-10 bg-gray-900/50 dark:bg-gray-900/60 hidden" id="sidebarBackdrop"></div>
        <main id="content-wrapper" class="flex-auto w-full min-w-0 lg:static lg:max-h-full lg:overflow-visible">
            <div class="flex w-full">
                <div class="flex-auto pt-6 min-w-0 max-w-4xl lg:px-8 lg:pt-10 pb:12">
                    <div class="pb-4 mb-10 border-b border-gray-200 dark:border-gray-800">
                        <h1 class="inline-block mb-2 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white" id="content">{{ $main_component->name }} - Laraveller</h1>
                        <p class="mb-4 text-lg text-gray-500 dark:text-gray-400">Get started with free {{ $main_component->name }} components.</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full p-4">
                @foreach($section->blocks as $block)
                    <div class="mt-8 max-w-sm md:max-w-2xl lg:max-w-3xl xl:max-w-5xl">
                        <h3 class="text-2xl font-serif font-semibold m-2 p-2">{{ $block->name }}</h3>
                        <div class="code-preview-wrapper">
                            <div class="code-preview rounded-xl bg-gradient-to-r bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 p-2 sm:p-6">
                               {!! $block->html !!}
                            </div>
                        </div>
                        <div class="">
                                <pre>
                                <code class="language-html">
                                {{ $block->html }}
                            </code>
                            </pre>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </div>
</x-block-layout>
