import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './components/Home.vue';
import About from './components/About.vue';
import Blog from './components/Blog.vue';
import SinglePost from './components/SinglePost.vue';
import Error from './components/Error.vue';

const router = new VueRouter({
    mode: 'history',
    routes:[
        { path: '/', name: 'home' , component: Home },
        { path: '/about', name: 'about', component: About },
        { path: '/blog', name: 'blog', component: Blog },
        { path: '/blog/:slug', name: 'single-post', component: SinglePost },
        { path: '*', name: 'error', component: Error }
    ]
  });

  export default router;