
require('./bootstrap');

import Vuex from 'vuex'
import VueRouter from 'vue-router'

window.Vue = require('vue');

Vue.component('app', require('./components/App.vue'));
Vue.component('app-input', require('./components/Shared/AppInput.vue'));

Vue.use(VueRouter);
Vue.use(Vuex);

import Login from './components/Auth/Login.vue';
import Register from './components/Auth/Register.vue';
import Home from './components/Admin/Home.vue';
import Pages from './components/Admin/Pages.vue';
import Page from './components/Admin/Page.vue';
const Welcome = { template: '<div>Welcome</div>' };

const routes = [
    {
        path: '/login',
        component: Login
    },
    {
        path: '/register',
        component: Register
    },
    {
        path: '/home',
        component: Home
    },
    {
        path: '/pages',
        component: Pages
    },
    {
        path: '/page/:id',
        component: Page,
        props: true
    },
    {
        path: '/',
        component: Welcome
    },
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

const store = new Vuex.Store({
    state: {
        user: false
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        }
    }
});

window.onload = function () {
    const app = new Vue({
        el: '#app',
        router,
        store
    });
};

