<style lang="scss" scoped>
@import '../../sass/app';

.wrapper {
    width  : 100%;
    height : 100%;
}
</style>

<template>
    <div class="wrapper">
        <nav-header></nav-header>
        <router-view></router-view>
        <nav-footer></nav-footer>
    </div>
</template>

<script>
import NavHeader from './NavHeader.vue'
import NavFooter from './NavFooter.vue'

export default {
    data () {
        return {}
    },
    methods: {},
    components: {
        navHeader: NavHeader,
        navFooter: NavFooter
    }
}
</script>
