<style lang="scss" scoped>
@import '../../sass/app';

.footer-wrapper {
    @if ($debug) { border: 1px solid green; }

    width            : 100%;
    height           : 150px;
    font-family      : $font-light;
    background-color : $dark-gray;
}
</style>

<template>
    <div class="footer-wrapper"></div>
</template>

<script>
export default {
    data () {
        return {}
    }
}
</script>
