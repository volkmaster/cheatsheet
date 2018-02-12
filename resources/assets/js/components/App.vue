<style lang="scss" scoped>
@import '../../sass/app';
</style>

<template>
    <div class="app">
        <router-view 
            @open-dialog="openDialog"
            @close-dialog="closeDialog">
        </router-view>
    </div>
</template>

<script>
export default {
    props: ['userId'],
    methods: {
        openDialog () {
            console.log(this.userId)
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
    }
}
</script>
