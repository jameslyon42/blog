<template>
    <div class="page-editor">
        <textarea
            @input="emitEvent"
        ></textarea>
        <div class="sidebar">
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        emitEvent(event) {
            this.$emit('input', event)
        }
    }
}
</script>

<style lang="scss" scoped>
    .page-editor {
        display: flex;
        flex-direction: row;

        textarea {
            background: rgb(33, 33, 33);
            border: none;
            box-sizing: border-box;
            color: white;
            display: block;
            height: 100%;
            padding: 20px;
            resize: none;
            width: 100%;
        }

        .sidebar {
            background: rgb(22, 22, 22);
            flex: none;
            width: 50px;
        }
    }
</style>