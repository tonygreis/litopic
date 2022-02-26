<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($series)
                <div class="overflow-hidden mb-4">
                    <x-series-section :series="$series" />
                </div>
            @endif
        </div>
    </div>
</x-main-layout>
