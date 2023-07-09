require('./bootstrap');

import { createApp } from 'vue';
import StorageExample from './components/storage/StorageExample.vue';

const app = createApp({});

app.component('storage-example', StorageExample);

app.mount('#app');