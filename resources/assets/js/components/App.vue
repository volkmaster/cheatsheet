<style lang="scss" scoped>
@import '../../sass/app';

.app { }
</style>

<template>
    <div class="app">
        <!-- <nav-header></nav-header> -->
        <router-view
            @open-dialog="openDialog"
            @close-dialog="closeDialog">
        </router-view>
        <!-- <nav-footer></nav-footer> -->
    </div>
</template>

<script>
import NavHeader from './NavHeader.vue'
import NavFooter from './NavFooter.vue'

export default {
    data () {
        return { }
    },
    methods: {
        openDialog () {
            let body = $('body')
            let scrollTop = -document.documentElement.scrollTop
            body.css('top', scrollTop + 'px')
            body.addClass('body--no-scroll')
        },
        closeDialog () {
            let body = $('body')
            let scrollTop = -body.position().top
            body.removeClass('body--no-scroll')
            document.documentElement.scrollTop = scrollTop
        }
    },
    components: {
        navHeader: NavHeader,
        navFooter: NavFooter
    }
}
</script>
