<style lang="scss" scoped>
@import '../../sass/app';

.app { }

.app--blur {
    filter         : blur(5px);
    pointer-events : none;
}
</style>

<template>
    <div class="app">
        <!-- <nav-header :class="{ 'app--blur': dialogOpened }"></nav-header> -->
        <router-view
            @open-dialog="openDialog">
        </router-view>
        <!-- <nav-footer></nav-footer> -->
    </div>
</template>

<script>
import NavHeader from './NavHeader.vue'
import NavFooter from './NavFooter.vue'

export default {
    data () {
        return {
            dialogOpened: false
        }
    },
    methods: {
        openDialog (val) {
            $('body').toggleClass('body--no-scroll', val)
            this.dialogOpened = val
        }
    },
    components: {
        navHeader: NavHeader,
        navFooter: NavFooter
    }
}
</script>
