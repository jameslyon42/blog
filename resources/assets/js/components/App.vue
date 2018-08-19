<template>
    <div id="app-container">
        <app-header></app-header>
        <section id="app-content">
            <alert></alert>
            <router-view
            ></router-view>
        </section>
        <confirm></confirm>
    </div>
</template>

<script>

import AppHeader from './Header.vue';
import Alert from './Alert.vue';
import Confirm from './Confirm.vue';

export default {
    props: [
        'user'
    ],
    mounted() {
        this.$store.commit('setUser', this.user);
    },
    components: {
        'app-header': AppHeader,
        'alert': Alert,
        'confirm': Confirm
    }
}
</script>
