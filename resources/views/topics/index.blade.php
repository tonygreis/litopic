<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($topics)
                <div class="overflow-hidden mb-4">
                    <x-welcome-topic-section :topics="$topics" />
                </div>
            @endif
        </div>
    </div>
</x-main-layout>
