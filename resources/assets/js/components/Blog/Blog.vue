<template>
    <div id="blog-container" v-on:scroll="handleScroll">
        <header :class="{ 'scrolled-past-hero': scrolledPastHero }" ref="header">
            <nav>
                <span>Home</span>
                <span>Archive</span>
                <span>About</span>
            </nav>
        </header>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                scrollTop: 0
            }
        },
        methods: {
            handleScroll(e) {
                this.scrollTop = e.target.scrollTop;
            }
        },
        computed: {
            scrolledPastHero() {
                const headerHeight =  (this.$refs.header) ? this.$refs.header.offsetHeight : 0;
                return this.scrollTop > (window.innerHeight - headerHeight);
            }
        }

    }
</script>

<style lang="scss" scoped>
    header {
        font-size: 18px;
        left: 0;
        position: fixed;
        top: 0;
        right: 0;
        transition: all .3s;

        &.scrolled-past-hero {
            background: rgba(255, 255, 255, 1);
            box-shadow: 0px 2px 10px 0px rgba(0,0,0,0.75);
        }

        nav {
            > span {
                display: inline-block;
                padding: 10px;
                transition: all .5s;

                &:hover {
                    color: 	#606060;
                    cursor: pointer;
                }
            }
        }
    }
</style>
