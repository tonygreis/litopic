<x-block-layout>
    <div class="lg:flex">
        <aside id="sidebar" class="fixed inset-0 z-20 flex-none w-72 h-full lg:static lg:h-auto lg:overflow-y-visible lg:pt-0 lg:w-64 lg:block hidden">
            <div id="navWrapper" class="overflow-hidden overflow-y-auto z-20 h-full bg-white scrolling-touch max-w-2xs lg:h-screen lg:block lg:sticky top:24 lg:top-12 dark:bg-gray-900 lg:mr-0">
                <nav id="nav" class="pt-16 px-1 pl-3 lg:pt-2 overflow-y-auto font-medium text-base lg:text-sm pb-10 lg:pb-20 sticky?lg:h-(screen-18)" aria-label="Docs navigation">
                    <ul class="mb-0 list-unstyled">
                        <h2 class="text-2xl font-bold">Free components</h2>
                            <li class="mt-8">
                                <ul class="py-1 list-unstyled font-semibold small">
                                   @foreach($main_component->sections as $section)
                                        <li>
                                            <a href="{{ route('frontend.sections.show', [$main_component->slug, $section->slug]) }}" class="py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500 dark:text-gray-400 dark:hover:text-white ">{{ $section->name }} </a>
                                        </li>
                                    @endforeach
                                </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="fixed inset-0 z-10 bg-gray-900/50 dark:bg-gray-900/60 hidden" id="sidebarBackdrop"></div>
        <main id="content-wrapper" class="flex-auto w-full min-w-0 lg:static lg:max-h-full lg:overflow-visible">
            <div class="flex w-full">
                <div class="flex-auto pt-6 min-w-0 max-w-4xl lg:px-8 lg:pt-10 pb:12 xl:pb-24 lg:pb-16">
                    <div class="pb-4 mb-10 border-b border-gray-200 dark:border-gray-800">
                        <h1 class="inline-block mb-2 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white" id="content">{{ $main_component->name }} - Laraveller</h1>
                        <p class="mb-4 text-lg text-gray-500 dark:text-gray-400">Get started with {{ $main_component->name }} components.</p>
                    </div>
                </div>
            </div>
            <div class="flex w-full">

            </div>
        </main>
    </div>
</x-block-layout>
