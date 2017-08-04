<style lang="scss" scoped>
@import '../../sass/app';

.content-wrapper {
    @if ($debug) { border: 1px solid blue; }

    width            : 100%;
    min-height       : calc(100vh - 250px);
    display          : flex;
    font-family      : $font-regular;
    background-color : $very-light-gray;
}
</style>

<template>
    <div class="content-wrapper"></div>
</template>

<script>
export default {
    data () {
        return {}
    },
    created () {},
    mounted () {
        this.$nextTick(() => {})
    },
    computed: {},
    methods: {}
}
</script>
