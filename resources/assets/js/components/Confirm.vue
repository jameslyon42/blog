<template>
    <div
        v-bind:class="[{show: show}, 'confirm-container']"
    >
        <div class="overlay" @click="denied"></div>
        <div class="confirm">
            <div class="message">
                {{ confirm.message }}
            </div>
            <div class="buttons">
                <button @click="confirmed">Yes</button>
                <button @click="denied">No</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                show: false,
                confirmCallback: false
            }
        },
        computed: {
            confirm() {
                return this.$store.state.confirm;
            }
        },
        methods: {
            confirmed() {
                this.confirm.confirmCallback();
                this.show = false;
            },
            denied() {
                this.show = false;
            }
        },
        watch: {
            confirm() {
                this.show = true;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .confirm-container {
        display: none;
        height:100%;
        position: absolute;
        width: 100%;

        &.show {
            display: block;
        }

        .overlay {
            background: rgba(0, 0, 0, .7);
            height:100%;
            position: absolute;
            width: 100%;
        }

        .confirm {
            background: #fff;

            left: 50%;
            padding: 30px;
            position: absolute;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            width: 300px;

            .message {
                text-align: center;
            }

            .buttons {
                text-align: center;

                button {
                    background: black;
                    border: none;
                    color: white;
                    margin: 20px 20px 0;
                    padding: 10px 20px;

                    &:hover {
                        background: aqua;
                    }
                }
            }
        }
    }
</style>
