
require('./bootstrap');

import VueRouter from 'vue-router'

window.Vue = require('vue');

Vue.component('blog', Blog);

Vue.use(VueRouter);

import Blog from './components/Blog/Blog.vue';
import Home from './components/Blog/Home.vue';

const routes = [
    {
        path: '/',
        component: Home
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

window.onload = function () {
    const app = new Vue({
        el: '#app',
        router,
    });
};

