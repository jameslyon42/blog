<template>
    <div class="page-creator">
        <page-view
            class="page-creator-pane"
            :markdown="markdown"
        ></page-view>
        <page-editor
            class="page-creator-pane page-editor"
            v-bind:page="page"
            @input="updatePreview"
        ></page-editor>
    </div>
</template>
<script>

import Editor from './Page/Editor';
import View from './Page/View';

export default {
    props: ['id'],
    data() {
        return {
            markdown: ''
        };
    },
    computed: {
        page() {
            return this.$store.state.page;
        }
    },
    methods: {
        updatePreview(value) {
            this.markdown = value;
        },
        fetchPage(id) {
            const self = this;
            axios.get('/pages/' + id)
                .then(function (response) {
                    self.$store.commit('setPage', response.data.page);
                    self.markdown = self.page.markdown;
                })
                .catch(function (error) {
                    console.log(error);
                    self.$router.push('/admin/pages');
                });
        }
    },
    created() {
        if (!isNaN(this.id)) {
            this.$store.commit('setPage', {});
            this.fetchPage(this.id);
        } else if (typeof this.id !== 'undefined') {
            this.$router.push('/admin/pages');
        } else {
            this.$store.commit('setPage', {});
        }
    },
    components: {
        'page-editor': Editor,
        'page-view': View
    }
}
</script>

<style lang="scss" scoped>
    .page-creator {
        display: flex;
        flex-direction: row;
        height: 100%;

        .page-creator-pane {
            box-sizing: border-box;
            flex: none;
            width: 50%;
        }

        .page-editor {

        }
    }
</style>

