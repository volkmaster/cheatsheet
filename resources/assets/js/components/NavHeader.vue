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
        width       : 1230px;
        display     : flex;
        align-items : center;

        .logo-wrapper {
            width       : 100px;
            height      : 100px;
            display     : flex;
            align-items : center;

            .logo {
                max-height : 80%;
                cursor     : pointer;
            }
        }

        .title {
            color          : $white;
            font-size      : 40px;
            letter-spacing : 2px;
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
            <div class="title">{{ title | uppercase }}</div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            title: 'cheatr'
        }
    }
}
</script>
