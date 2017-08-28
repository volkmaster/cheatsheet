<style lang="scss" scoped>
@import '../../sass/app';

.header-wrapper {
    width            : 100%;
    height           : 100px;
    display          : flex;
    justify-content  : center;
    font-family      : $font-title;
    background-color : $green;

    .header {
        width: 1230px;

        .logo-wrapper {
            height      : 100%;
            display     : flex;
            align-items : center;
            cursor      : pointer;

            .logo { max-height: 80%; }
        }
    }
}
</style>

<template>
    <div class="header-wrapper">
        <div class="header">
            <div class="logo-wrapper">
                <router-link class="logo-wrapper" to="/" tag="div" exact>
                    <img class="logo" src="/images/logo.png">
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {}
    }
}
</script>
