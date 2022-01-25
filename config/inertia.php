<?php

return [
    'ssr' => [

        'enabled' => true,

        'url' => 'http://127.0.0.1:13714/render',

    ],

    'testing' => [

        'ensure_pages_exist' => true,

        'page_paths' => [

            resource_path('js/Pages'),

        ],

        'page_extensions' => [

            'js',
            'jsx',
            'svelte',
            'ts',
            'vue',

        ],

    ],


];
