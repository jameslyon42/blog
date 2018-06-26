<template>
    <div id="app-container">
        <app-header></app-header>
        <section id="app-content">
            <alert></alert>
            <router-view
                    @alert="test"
            ></router-view>
        </section>
    </div>
</template>

<script>

import AppHeader from './Header.vue';
import Alert from './Alert.vue';

export default {
    props: [
        'user'
    ],
    mounted() {
        this.$store.commit('setUser', this.user);
    },
    components: {
        'app-header': AppHeader,
        'alert': Alert
    }
}
</script>
