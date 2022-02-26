@props(['header' => null, 'lessons'])
<div {{ $attributes->merge(['class' => 'p-6 bg-gray-100 dark:bg-gray-900 rounded-lg']) }}>
    @if ($header)
        <div class='p-2 bg-slate-300 dark:bg-slate-700 mb-3 rounded-md'>
            <h2 class="text-2xl font-bold text-indigo-700 dark:text-indigo-400 font-serif">{{ $header }}</h2>
        </div>
    @endif
    <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($lessons as $lesson)
            @if ($loop->last)
                <div>
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8360309152742177"
                                        crossorigin="anonymous"></script>
                    <ins class="adsbygoogle" style="display:block" data-ad-format="fluid"
                        data-ad-layout-key="-ec+g-v-4z+c4" data-ad-client="ca-pub-8360309152742177"
                        data-ad-slot="5357855034"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || [])
                        .push({});
                    </script>
                </div>
            @endif
            <div>
                <a href="{{ route('frontend.lessons.show', [$lesson->serie->slug, $lesson->slug]) }}"
                    class="group flex overflow-hidden space-x-4 bg-white dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-large p-2">
                    <div class="w-32 h-32 rounded-large overflow-hidden shrink-0">
                        <img src="{{ $lesson->thumbnail_url }}" alt="{{ $lesson->title }}"
                            class="object-cover h-full w-full group-hover:opacity-75">
                    </div>
                    <div class="">
                        <h3
                            class="font-semibold text-slate-900 dark:text-white leading-tight group-hover:text-slate-800 dark:group-hover:text-slate-200">
                            {{ $lesson->title }}
                        </h3>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
