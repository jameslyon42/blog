<template>
    <div id="app-container">
        <app-header></app-header>
        <router-view></router-view>
    </div>
</template>

<script>
import AppHeader from './Header.vue';

export default {
    props: [
        'user'
    ],
    mounted() {
        this.$store.commit('setUser', this.user);
    },
    components: {
        'app-header': AppHeader
    }
}
</script>
