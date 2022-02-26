require('./bootstrap')

import { createApp } from 'vue'
import SearchModal from "@/Components/SearchModal";

const app = createApp({})

app.component('search-modal', SearchModal)

app.mount('#app')
