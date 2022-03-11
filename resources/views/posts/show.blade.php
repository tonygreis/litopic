<x-main-layout>
    <x-slot:styles>
        <link rel="stylesheet"
            href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/monokai-sublime.min.css">
    </x-slot:styles>
    <div class="py-8">
        <div class="max-w-4xl mx-auto lg:text-lg dark:bg-slate-800">
             @if ($post)
                <article class="prose prose-slate mx-auto lg:prose-lg dark:text-slate-300 dark:prose-pre:bg-slate-700 p-2 prose-a:text-blue-600 hover:prose-a:text-blue-500">
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
                        {!! $post->content !!}</p>
                </article>
            @endif
        </div>
    </div>
    <x-slot:scripts>
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>
    </x-slot:scripts>
</x-main-layout>
