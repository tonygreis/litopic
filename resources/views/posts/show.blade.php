<x-main-layout>
    <x-slot:styles>
        <link rel="stylesheet"
            href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/monokai-sublime.min.css">
    </x-slot:styles>
    <div class="py-8">
        <div class="max-w-4xl mx-auto lg:text-lg dark:bg-slate-800">
             @if ($post)
                <article class="prose prose-slate mx-auto prose-img:rounded-xl lg:prose-lg dark:prose-invert p-2 prose-a:text-blue-600 hover:prose-a:text-blue-500">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img src="{{ $post->featured_image }}">
                    </a>
                    <div class="bg-white dark:bg-slate-800 flex flex-col justify-start p-6">
                        <h1 class="text-3xl font-bold font-serif dark:text-slate-300 pb-4">{{ $post->title }}</h1>
                        <p class="text-sm dark:text-slate-300 pb-8">
                            By <a href="#" class="font-semibold hover:text-gray-800  dark:text-slate-500">Laraveller</a>,
                            {{ $post->publish_date }}
                        </p>
                    </div>
                    <p>
                        {!! $post->content !!}
                    </p>
                </article>
            @endif
        </div>
        <div class="max-w-7xl mx-auto">
            <div class='p-2 bg-slate-300 dark:bg-slate-700 mb-3 rounded-md'>
                <h2 class="text-2xl font-bold text-indigo-700 dark:text-indigo-400 font-serif">Latest Posts</h2>
            </div>
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($latest_posts as $lp)
                <div>
                    <a href="{{ route('frontend.posts.show', $lp->slug) }}"
                       class="group flex overflow-hidden space-x-4 items-center bg-white dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 rounded-large p-2">
                        <div class="w-32 h-32 rounded-large overflow-hidden shrink-0">
                            <lazy-image url="{{ asset($lp->featured_image) }}" alt="{{ $lp->title }}" />
                        </div>
                        <div>
                            <h3
                                class="font-semibold text-slate-900 dark:text-white leading-tight group-hover:text-slate-800 dark:group-hover:text-slate-200">
                                {{ $lp->title }}
                            </h3>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <x-slot:scripts>
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>
    </x-slot:scripts>
</x-main-layout>
