<template>
    <div class="page-list-container">
        <div class="page-list-title">
            <h1>
                Pages
            </h1>
            <router-link
                    class="material-icons page-list-create-page"
                    to="/admin/page"
            >
                &#xe148;
            </router-link>
        </div>
        <div class="page-list">
            <div class="page-list-header">
                <div class="page-list-item">
                    <span class="page-list-item-title">Title</span>
                    <span class="page-list-item-created">Created</span>
                    <span class="page-list-item-actions">Actions</span>
                </div>
            </div>
            <div class="page-list-body">
                <div v-for="(page, index) in pages" class="page-list-item">
                    <span class="page-list-item-title">{{ page.title }}</span>
                    <span class="page-list-item-user">{{ page.created_at }}</span>
                    <span class="page-list-item-actions">
                        <router-link to="" class="page-list-action" @click="">View</router-link>
                        <router-link :to="{ path: 'page/' + page.id }"
                                     class="page-list-action">Edit</router-link>
                        <span @click="destroyPage(index)" class="page-list-action">Delete</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pages: false
        }
    },
    created() {
      this.fetchPages();
    },
    methods: {
        destroyPage(index) {
            const self = this;
            const page = self.pages[index];

            this.globalConfirm(
                'Do you really want to delete this page?',
                () => {
                    axios.post('/pages/' + page.id, {_method: 'delete'})
                        .then(function () {
                            const message = 'Page delete successfully';

                            self.globalAlert('success', message);
                            self.pages.splice(index, 1);
                        })
                        .catch(function () {
                            self.globalAlert('error', 'There was an issue deleting that page');
                        });
                }
            );
        },
        fetchPages() {
            const self = this;

            axios.get('/pages/')
                .then(function (response) {
                    const pages = response.data.pages;
                    self.pages = pages;
                })
                .catch(function (error) {
                    console.log(error);
                    self.$router.push('/pages');
                });
        }
    }
}
</script>

<style lang="scss" scoped>
    .page-list-container {
        box-sizing: border-box;
        height: 100%;
        overflow: auto;
        padding: 30px 30px;
        width: 100%;
    }
    .page-list-title {
        h1 {
            display: inline-block;
            margin-right: 15px;
            vertical-align: middle;
        }

        .page-list-create-page {
            text-decoration: none;
            color: black;
            vertical-align: middle;
        }
    }
    .page-list {
        margin: 0 100px;
        .page-list-header {
            font-weight: bold;
        }
        .page-list-item {
            border-bottom: solid thin black;
            font-size: 0;
            > span {
                box-sizing: border-box;
                display: inline-block;
                font-size: 18px;
                padding: 5px;
                width: 33.3%;

                .page-list-action {
                    color: black;
                    cursor: pointer;
                    padding: 0 5px;
                    text-decoration: none;

                    &:hover {
                        font-weight: bold;
                    }
                }
            }
        }
    }
</style>