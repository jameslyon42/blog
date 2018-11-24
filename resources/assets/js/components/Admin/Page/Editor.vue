<template>
    <div class="page-editor">
        <div class="page-editor-content">
            <textarea
                @input="emitEvent($event.target.value)"
                @dragover.prevent
                @drop="importImage"
                v-model="page.markdown"
                ref="textarea"
            ></textarea>
            <div class="page-editor-content-section"
                v-bind:class="{active: isSectionActive('settings')}"
            >
                <settings
                    class="page-editor-settings"
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

import Showdown from 'showdown';
import Settings from './Settings.vue'

export default {
    data() {
        return {
            activeSection: false,
            errors: {},
            converter: new Showdown.Converter(),
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
        emitEvent(value) {
            this.$emit('input', value);
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
        save() {
            const self = this;
            const method = this.page.id ? 'PUT' : 'POST';
            const route = '/pages' +  (this.page.id ? '/' + this.page.id : '');

            axios.post(route,
                {
                    ...this.page,
                    _method: method,
                    html: this.converter.makeHtml(this.page.markdown)
                })
                .then(function (response) {
                    let message = 'Page updated successfully';
                    if (!self.page.id) {
                        message = 'Page created successfully';
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
        },
        importImage(e) {
            e.stopPropagation();
            e.preventDefault();

            const self      = this;
            const file      = e.dataTransfer.files[0];
            const formData  = new FormData();

            formData.append('image', file);
            formData.append('page_id', this.page.id);

            axios.post(
                '/images',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(function (response) {
                const url = response.data.url;
                const markdown = `\r\n \r\n ![Alt Text Here](${url}) \r\n \r\n`;

                self.insertTextAtCursor(markdown);
            });
        },
        insertTextAtCursor(text) {
            const textarea = this.$refs.textarea;
            const startPos = textarea.selectionStart;
            const endPos = textarea.selectionEnd;

            if (this.page.markdown) {
                this.page.markdown = this.page.markdown.substring(0, startPos)
                    + text
                    + this.page.markdown.substring(endPos, this.page.markdown.length);
            } else {
                this.page.markdown = text;
            }

            this.emitEvent(this.page.markdown);
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
                overflow: auto;

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