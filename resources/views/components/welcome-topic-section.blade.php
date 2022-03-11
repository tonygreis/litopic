@props(['header' => null, 'topics'])
<div class="p-6 bg-gray-100 dark:bg-gray-900 rounded-lg">
    @if ($header)
        <div class="p-2 bg-slate-300 dark:bg-slate-700 mb-3 rounded-md">
            <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-200 font-serif">{{ $header }}</h2>
        </div>
    @endif
    <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-4">
        @foreach ($topics as $topic)
            <div
                class="group flex flex-col overflow-hidden items-center bg-white dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-large p-2">
                <a href="{{ route('frontend.topics.show', $topic->slug) }}"
                    class="w-32 h-32 rounded-full border-4 border-slate-800 dark:border-white overflow-hidden shrink-0">
                    <lazy-image url="{{ asset('storage/' . $topic->poster_path) }}" alt="{{ $topic->name }}" />
                </a>
                <a href="" class="my-2">
                    <h3
                        class="sm:text-lg text-base font-semibold text-slate-900 dark:text-white leading-tight group-hover:text-slate-800 dark:group-hover:text-slate-200">
                        {{ $topic->name }} </h3>
                </a>
            </div>
        @endforeach
    </div>
</div>
