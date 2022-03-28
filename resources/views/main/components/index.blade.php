<x-main-layout>
    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($components as $c)
                    <div class="max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('frontend.components.show', $c->slug) }}">
                            <img class="p-8 rounded-t-lg" src="{{ Storage::url('public/'.$c->poster_path) }}" alt="{{ $c->name }}" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="{{ route('frontend.components.show', $c->slug) }}">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $c->name }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-main-layout>
