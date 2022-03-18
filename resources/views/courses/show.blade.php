<x-main-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section id="course-header-section">
                <div class="container mx-auto mt-3">
                    <div class="flex justify-center md:flex-row flex-wrap rounded bg-slate-200 dark:bg-slate-800 mb-4">
                        <div class="w-full md:w-1/4 p-4 text-gray-200">
                            <div class="flex justify-center md:float-right">
                                <img class="w-16 h-16 md:w-24 md:h-24 rounded-full mx-auto md:mx-0 md:mr-6 hover:opacity-75 transition transition-900 transition-ease-in bg-indigo"
                                    @if ($course->poster_path) src="{{ asset('storage/' . $course->poster_path) }}" @endif
                                    alt="{{ $course->name }}" loading="lazy" />
                            </div>
                        </div>
                        <div class="w-full md:w-3/4 p-4 text-center md:text-left text-slate-800 dark:text-slate-300">
                            <h1 class="text-lg font-bold mx-8">{{ $course->name }}</h1>
                            <div class="text-blue-600 mx-8">This course has {{ count($course->lessons) }} lessons.
                            </div>
                            <p class="m-2 p-4">
                                {{ $course->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            @if ($lessons)
                <div class="overflow-hidden mb-4">
                    <x-lessons-section-courses-show header="Lessons" :lessons="$lessons" />
                </div>
            @endif
        </div>
    </div>
</x-main-layout>
