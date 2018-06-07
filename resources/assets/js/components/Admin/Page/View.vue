<template>
    <div class="page-view"
        v-html="html"
    ></div>
</template>

<script>

import showdown from 'showdown';

export default {
    props: [
        'markdown'
    ],
    data() {
        return {
            'converter': new showdown.Converter()
        };
    },
    computed: {
        html() {
            return this.converter.makeHtml(this.markdown);
        }
    }
}
</script>

<style lang="scss" scoped>
    .page-view {
        padding: 0 20px;
    }
</style>