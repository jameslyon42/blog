<template>
    <form class="auth-form" v-on:submit.prevent="register">
        <h2>Login</h2>
        <app-input
                type="text"
                name='username'
                :value="data.username"
                :error="errors.username"
                v-on:input="handleInput"
                placeholder="Username"
                required
        ></app-input>
        <app-input
                type="password"
                name='password'
                :value="data.password"
                :error="errors.password"
                v-on:input="handleInput"
                placeholder="Password"
                required
        ></app-input>
        <button>Login</button>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                data: {},
                errors: {}
            }
        },
        methods: {
            register() {
                const self = this;

                this.errors = {};

                axios.post('admin/login', this.data)
                    .then(function (response) {
                        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrf;
                        self.$store.commit('setUser', response.data.user);
                        self.$router.push('/admin');
                    })
                    .catch(function (error) {
                        if (error.response.data.errors) {
                            if ('logged_in' in error.response.data.errors) {
                                self.$store.commit('setUser', error.response.data.user);
                                self.$router.push(error.response.data.redirect);
                            } else {
                                self.errors = error.response.data.errors;
                            }
                        } else {
                            console.log(error);
                        }
                    });
            },
            handleInput(event) {
                const elm = event.target;

                this.data[elm.name] =  elm.value;
            }
        }
    }
</script>