<template>
    <div class="page-editor">
        <textarea
            @input="emitEvent"
        ></textarea>
        <div class="sidebar">
            <div
                class="save"
                @click="save"
            >
                <div class="icon"></div>
            </div>
            <div class="settings">
                <div class="icon"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        emitEvent(event) {
            this.$emit('input', event)
        },
        save() {
            console.log('asd');
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
            width: 32px;

            > div {
                cursor: pointer;
                height: 32px;

                &:hover {
                    background: rgba(255, 255, 255, .3);
                }

                .icon {
                    background: #fff;
                    height: 100%;
                    mask-position: center;
                    mask-repeat: no-repeat;
                    width: 100%;
                }
            }

            .save {
                .icon {
                    mask-image: url('~@/icons/save.svg');
                    mask-size: 80%;
                }
            }
            .settings {
                .icon {
                    mask-image: url('~@/icons/settings.svg');
                    mask-size: 80%;
                }
            }
        }
    }
</style>