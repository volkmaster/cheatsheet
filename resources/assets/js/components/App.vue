<style lang="scss" scoped>
@import '../../sass/app';

.wrapper {
    width  : 100%;
    height : 100%;
}

.blur {
    filter         : blur(5px);
    pointer-events : none;
}
</style>

<template>
    <div class="wrapper">
        <nav-header :class="{ blur: dialogOpened }"></nav-header>
        <router-view
            @open-dialog="openDialog">
        </router-view>
        <nav-footer></nav-footer>
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
            $('body').toggleClass('no-scroll', val)
            this.dialogOpened = val
        }
    },
    components: {
        navHeader: NavHeader,
        navFooter: NavFooter
    }
}
</script>
