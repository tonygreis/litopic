<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($lessons)
                <div class="overflow-hidden mb-4">
                    <x-lessons-section :header="$serie->name . ' Lessons'" :lessons="$lessons" />
                </div>
            @endif
        </div>
    </div>
</x-main-layout>
