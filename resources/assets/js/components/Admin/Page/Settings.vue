<template>
    <form v-on:submit.prevent="save">
        <h2>Settings</h2>
        <label>Title</label>
        <app-input
                type="text"
                name='title'
                :value="page.title"
                :error="errors.title"
                v-on:input="handleInput"
                placeholder="Title"
                required
        ></app-input>
        <button
            v-html="submitText"
        ></button>
    </form>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props: [
        'page',
        'errors'
    ],
    methods: {
        save() {
            this.$emit('save');
        },
        handleInput(event) {
            const elm = event.target;
            this.page[elm.name] = elm.value;
            this.$store.commit('setPage', {...this.page, [elm.name]: elm.value});
        }
    },
    computed: {
        submitText() {
            return (this.page.id) ? 'Save' : 'Create'
        }
    }
}
</script>

<style scoped>

</style>