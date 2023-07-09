require('./bootstrap');

import { createApp } from 'vue';
import StorageExample from './components/StorageExample.vue';

const app = createApp({});

app.component('storage-example', StorageExample);

app.mount('#app');