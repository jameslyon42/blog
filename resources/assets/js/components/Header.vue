<template>
    <header>
        <nav>
            <router-link v-show="!user" to="/admin/login">Login</router-link>
            <!--<router-link v-show="!user" to="/admin/register">Register</router-link>-->
            <router-link v-show="user" to="/admin/pages">Pages</router-link>
            <a v-show="user" v-on:click="logout">Logout</a>
        </nav>
    </header>
</template>

<script>
    export default {
        data() {
            return {
              loggedIn: !!this.$user
            };
        },
        computed: {
            user() {
                return this.$store.state.user;
            }
        },
        methods: {
            logout() {
                const self = this;

                axios.post('admin/logout', this.data)
                    .then(function (response) {
                        self.$router.push('/admin');
                        self.$store.commit('setUser', false);
                        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrf;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
