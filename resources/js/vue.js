require('./bootstrap');
import { createApp } from 'vue'
import lazyPlugin from 'vue3-lazy'

import SearchModal from "@/Components/SearchModal";
import VueImage from "@/Components/ImageVue";

const app = createApp({});
app.component('search-modal', SearchModal);
app.component('lazy-image', VueImage);

app.use(lazyPlugin, {
    loading: 'img/loading.png',
    error: 'img/error.png'
}).mount('#app')
