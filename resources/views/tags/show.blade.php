<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($posts)
                <div class="overflow-hidden mb-4">
                    <x-posts-section :header="$tag->name . 'posts'" :posts="$posts" />
                </div>
            @endif
        </div>
    </div>
</x-main-layout>
