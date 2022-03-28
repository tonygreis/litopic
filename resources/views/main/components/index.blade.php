<x-main-layout>
    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <div class="justify-between items-center w-full md:flex md:w-auto md:order-1"
                         id="mobile-menu-3">
                        <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                            @foreach ($components as $f_component)
                                <li>
                                    <a href="{{ route('frontend.components.show', $f_component->slug) }}"
                                       class="block py-2 pr-4 pl-3 text-white rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                                       aria-current="page">{{ $f_component->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
            @if ($first_component)
                <div class="mt-8 p-4">
                    <div class="m-2 p-2 text-3xl font-bold">
                   Sections for  {{ $first_component->name }}
                    </div>
                    <div class="m-2 p-2">
                        <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                            @foreach($first_component->sections as $section)
                                <a href="" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                    {{ $section->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-main-layout>
