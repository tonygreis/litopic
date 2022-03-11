@props(['header' => null, 'posts'])
<div {{ $attributes->merge(['class' => 'p-6 bg-gray-100 dark:bg-gray-900 rounded-lg']) }}>
    @if ($header)
        <div class='p-2 bg-slate-300 dark:bg-slate-700 mb-3 rounded-md'>
            <h2 class="text-2xl font-bold text-indigo-700 dark:text-indigo-400 font-serif">{{ $header }}</h2>
        </div>
    @endif
    <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('frontend.posts.show', $post->slug) }}"
                    class="group flex overflow-hidden space-x-4 items-center bg-white dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-large p-2">
                    <div class="w-32 h-32 rounded-large overflow-hidden shrink-0">
                        <lazy-image url="{{ asset($post->featured_image) }}" alt="{{ $post->title }}" />
                    </div>
                    <div>
                        <h3
                            class="font-semibold text-slate-900 dark:text-white leading-tight group-hover:text-slate-800 dark:group-hover:text-slate-200">
                            {{ $post->title }}
                        </h3>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="m-2 p-2">
            {{ $posts->links() }}
        </div>
    </div>
</div>
