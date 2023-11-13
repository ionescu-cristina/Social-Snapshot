import { createApp } from 'vue';
import PostsComponent from './components/PostsComponent.vue';

const app = createApp({});
app.component('posts-component', PostsComponent);
app.mount('#app');
