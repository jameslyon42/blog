
require('./bootstrap');

import Vuex from 'vuex'
import VueRouter from 'vue-router'

window.Vue = require('vue');

Vue.component('app', require('./components/App.vue'));
Vue.component('app-input', require('./components/Shared/AppInput.vue'));

Vue.use(VueRouter);
Vue.use(Vuex);

Vue.mixin({
    methods: {
        globalAlert(type, message) {
            this.$store.commit('setAlert', {
                type: type,
                message: message,
                timeout: 2000
            });
        },
        globalConfirm(message, confirmCallback) {
            this.$store.commit('setConfirm', {
                message: message,
                confirmCallback: confirmCallback
            });
        }
    }
});

import Login from './components/Auth/Login.vue';
import Register from './components/Auth/Register.vue';
import Pages from './components/Admin/Pages.vue';
import Page from './components/Admin/Page.vue';

const routes = [
    {
        path: '/admin/login',
        component: Login
    },
    {
        path: '/admin/register',
        component: Register
    },
    {
        path: '/admin/',
        component: Pages
    },
    {
        path: '/admin/pages',
        component: Pages
    },
    {
        path: '/admin/page',
        component: Page,
    },
    {
        path: '/admin/page/:id',
        component: Page,
        props: true
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

const store = new Vuex.Store({
    state: {
        user: false,
        page: {},
        alert: {},
        confirm: {},
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        setPage(state, page) {
            state.page = page;
        },
        setAlert(state, alert) {
            state.alert = alert
        },
        setConfirm(state, confirm) {
            state.confirm = confirm
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

