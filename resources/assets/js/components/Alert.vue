<template>
    <div
            v-bind:class="[{show: show}, 'alert', alert.type]"
    >
        {{ alert.message }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
            timeout: false
        }
    },
    computed: {
        alert() {
            return this.$store.state.alert;
        }
    },
    watch: {
        alert() {
            clearTimeout(this.timeout);
            this.show = true;
            this.timeout = setTimeout(
                () => {
                    this.show = false;
                },
                this.alert.timeout || 2000
            );
        }
    }
}
</script>

<style lang="scss" scoped>
    .alert {
        background: #E53935;
        color: white;
        padding: 8px 0;
        position: absolute;
        text-align: center;
        transform: translateY(-100%);
        transition: transform 500ms;
        width: 100%;
        z-index: 10;

        &.show {
            transform: translateY(0);
        }

        &.success {
            background: #4CAF50;
        }
     }
</style>
