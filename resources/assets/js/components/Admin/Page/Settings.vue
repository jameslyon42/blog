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
        ></app-input>
        <app-input
                type="text"
                name='slug'
                :value="page.slug"
                :error="errors.slug"
                v-on:input="handleInput"
                placeholder="Slug"
        ></app-input>
        <app-input
                type="text"
                name='location'
                :value="page.location"
                :error="errors.location"
                v-on:input="handleInput"
                placeholder="Location"
        ></app-input>
        <app-input
                type="textarea"
                name='description'
                :value="page.description"
                :error="errors.description"
                v-on:input="handleInput"
                placeholder="Description"
        ></app-input>
        <app-input
                type="date"
                name='published_at'
                :value="page.published_at"
                :error="errors.published_at"
                v-on:input="handleInput"
                placeholder="Publish Date"
        ></app-input>
        <button
            class="save"
            v-html="submitText"
        ></button>
        <button
            @click="destroy"
            class="delete_button danger"
        >
            Delete
        </button>
    </form>
</template>

<script>
export default {
    props: [
        'page',
        'errors'
    ],
    methods: {
        destroy(event) {
            event.preventDefault();

            const self = this;
            this.globalConfirm(
                'Do you really want to delete this page?',
                () => {
                    axios.post('/pages/' + self.page.id, {_method: 'delete'})
                        .then(function () {
                            const message = 'Page deleted successfully';

                            self.globalAlert('success', message);
                            self.$router.push({ path: '/admin/pages' });
                        })
                        .catch(function () {
                            self.globalAlert('error', 'There was an issue deleting that page');
                        });
                }
            );
        },
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
