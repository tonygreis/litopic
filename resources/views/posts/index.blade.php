<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <div class="justify-between items-center w-full md:flex md:w-auto md:order-1"
                        id="mobile-menu-3">
                        <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                           @foreach ($tags as $tag)
                           <li>
                            <a href="{{ route('frontend.tags.show', $tag->slug) }}"
                                class="block py-2 pr-4 pl-3 text-white rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                                aria-current="page">{{ $tag->name }}</a>
                        </li>
                           @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
            @if ($posts)
                <div class="overflow-hidden my-4">
                    <x-posts-section :posts="$posts" />
                </div>
            @endif
        </div>
    </div>
</x-main-layout>
