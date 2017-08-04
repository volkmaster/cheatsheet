<style lang="scss" scoped>
@import '../../sass/app';

.header-wrapper {
    @if ($debug) { border: 1px solid red; }

    width            : 100%;
    height           : 100px;
    display          : flex;
    font-family      : $font-title;
    background-color : $green;
}
</style>

<template>
    <div class="header-wrapper"></div>
</template>

<script>
import Icon from 'vue-awesome/components/Icon'

export default {
    data () {
        return {}
    },
    components: {
        icon: Icon
    }
}
</script>
