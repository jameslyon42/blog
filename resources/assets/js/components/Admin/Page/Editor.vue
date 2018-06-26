<template>
    <div class="page-editor">
        <div class="page-editor-content">
            <textarea
                @input="emitEvent"
                v-model="page.markdown"
            ></textarea>
            <div class="page-editor-content-section"
                v-bind:class="{active: isSectionActive('settings')}"
            >
                <settings
                    v-bind:page="page"
                    v-bind:errors="errors"
                    @save="save"
                ></settings>
            </div>
        </div>
        <div class="sidebar">
            <div
                class="save"
                @click="save"
            >
                <div class="icon"></div>
            </div>
            <div
                v-bind:class="[{active: isSectionActive('settings')}, 'settings']"
                @click="setSection('settings')"
            >
                <div class="icon"></div>
            </div>
        </div>
    </div>
</template>

<script>

import Settings from './Settings.vue'

export default {
    data() {
        return {
            activeSection: false,
            errors: {}
        };
    },
    computed: {
        page() {
            return this.$store.state.page;
        }
    },
    watch: {
        errors() {
            const self = this;
            ['title'].forEach(key => {
                if (Object.keys(self.errors).indexOf(key) > -1)    {
                    self.activeSection = 'settings';
                }
            });
        }
    },
    methods: {
        emitEvent(event) {
            this.$emit('input', event)
        },
        setSection(section) {
            if (this.activeSection === section) {
                this.activeSection = false;
            } else {
                this.activeSection = section;
            }
        },
        isSectionActive(section) {
            return this.activeSection === section;
        },
        class(test) {
            console.log(test);
        },
        save() {
            const self = this;
            const method = this.page.id ? 'PUT' : 'POST';
            const route = '/pages' +  (this.page.id ? '/' + this.page.id : '');

            axios.post(route, {...this.page, _method: method})
            .then(function (response) {
                let message = 'Page created successfully';
                if (!self.page.id) {
                    message = 'Page updated successfully';
                    self.$store.commit('setPage', response.data.page);
                    self.$router.replace('/page/' + response.data.page.id)
                }

                self.globalAlert('success', message);
                self.errors = {};
            })
            .catch(function (error) {
                let message;
                if (error.response.data.errors) {
                    self.errors = error.response.data.errors;
                    if (Object.keys(self.errors).length > 1) {
                        message = 'Fix errors before submitting';
                    } else {
                        message = self.errors[Object.keys(self.errors)[0]][0];
                    }
                } else {
                    message = 'Unknown error';
                }

                self.globalAlert('error', message);
            });
        }
    },
    components: {
        Settings
    }
}
</script>

<style lang="scss" scoped>
    .page-editor {
        display: flex;
        flex-direction: row;

        .page-editor-content {
            height: 100%;
            overflow: hidden;
            position: relative;
            width: 100%;

            > * {
                box-sizing: border-box;
                height: 100%;
                left: 0;
                padding: 20px;
                position: absolute;
                top: 0;
                width: 100%;
            }

            textarea {
                background: rgb(33, 33, 33);
                border: none;
                color: white;
                display: block;
                resize: none;
            }

            .page-editor-content-section {
                background: #333;
                color: #fff;
                left: 100%;
                position: absolute;
                top: 0;
                transition: left .5s;

                &.active {
                    left: 0;
                }
            }
        }

        .sidebar {
            background: rgb(22, 22, 22);
            flex: none;
            width: 32px;

            > div {
                cursor: pointer;
                height: 32px;

                &.active {
                    background: #333;
                }

                &:hover
                {
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