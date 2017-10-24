<style lang="scss" scoped>
@import '../../sass/app';

.header {
    width            : 100%;
    height           : 100px;
    display          : flex;
    justify-content  : center;
    align-items      : center;
    flex-direction   : column;
    background-color : $green;
}

.header__row { width: 1230px; }

.header__logo {
    height      : 100px;
    display     : flex;
    align-items : center;
    cursor      : pointer;
}

.header__image { max-height: 85%; }

.header__title {
    margin-left    : 15px;
    color          : $white;
    font-size      : 40px;
    font-family    : $font-title;
    letter-spacing : 2px;
}
</style>

<template>
    <div class="header">
        <div class="header__row">
            <router-link class="header__logo" to="/" tag="div" exact>
                <img class="header__image" src="/images/logo.png">
                <div class="header__title">{{ title | uppercase }}</div>
            </router-link>
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
