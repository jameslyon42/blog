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
        // Disable stupid ellipsis substitution
        showdown.subParser('ellipsis', function (text, options, globals) {
            text = globals.converter._dispatch('ellipsis.before', text, options, globals);
            text = globals.converter._dispatch('ellipsis.after', text, options, globals);
            return text;
        });

        return {
            'converter': new showdown.Converter()
        };
    },
    computed: {
        html() {
            console.log(this.converter.getOptions());
            return this.converter.makeHtml(this.markdown);
        }
    }
}
</script>

<style lang="scss">
    .page-view {
        overflow: auto;
        padding: 0 20px;
        word-wrap: break-word;

        img {
            height: auto;
            width: 100%;
        }
    }

</style>