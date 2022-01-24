require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import lazyPlugin from 'vue3-lazy'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laraveller';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(lazyPlugin, {
            loading: 'img/loading.png',
            error: 'img/error.png'
        })
            .mixin({ methods: { route } })
            .mount('#my-app');
    },
});

InertiaProgress.init({ color: '#4B5563' });
