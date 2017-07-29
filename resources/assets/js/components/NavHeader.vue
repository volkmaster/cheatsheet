<style lang="scss" scoped>
@import '../../sass/app';

.header-wrapper {
    width: 100%;

    .header {
        @if ($debug) { border: 1px solid red; }

        height           : 100px;
        display          : flex;
        font-family      : $font-title;
        background-color : $white;

        .logo-wrapper {
            @if ($debug) { border: 1px solid red; }

            width           : 200px;
            margin          : 0 calc(40% - 220px) 0 20px;
            display         : flex;
            align-items     : center;
            justify-content : flex-start;
            cursor          : pointer;

            .logo-img {
                @if ($debug) { border: 1px solid red; }

                max-height : 80%;
                cursor     : pointer;
            }
        }

        .media-wrapper {
            @if ($debug) { border: 1px solid red; }

            width           : 15%;
            padding-right   : 1%;
            display         : flex;
            align-items     : center;
            justify-content : center;

            .icon {
                @if ($debug) { border: 1px solid red; }

                width  : 50px;
                height : 30%;
                color  : $dark-gray;
                cursor : pointer;

                &:hover { color: $black; }
            }
        }

        .header-el {
            @if ($debug) { border: 1px solid red; }

            width           : 15%;
            display         : flex;
            align-items     : center;
            justify-content : center;
            color           : $white;
            font-size       : 35px;
            cursor          : pointer;

            &.flag        { background-color: $green;     }
            &.tackle      { background-color: $blue;      }
            &.association { background-color: $dark-gray; }

            .text {
                @if ($debug) { border: 1px solid red; }

                padding-top : 10px;
                line-height : 27px;
                display     : inline-block;
                align-items : flex-start;

                &:after {
                    content    : '';
                    width      : 0;
                    height     : 3px;
                    display    : block;
                    background : $white;
                    transition : width 0.3s ease-in;
                }

                &.active:after { width: 100%; }
            }

            &.active .text:after { width: 100%; }
        }
    }

    .subheader {
        height           : 45px;
        display          : flex;
        align-items      : center;
        font-family      : $font-title;
        font-size        : 25px;
        background-color : $green;
        color            : $white;

        .subheader-el {
            @if ($debug) { border: 1px solid red; }

            padding : 0 25px;
            cursor  : pointer;

            &:first-of-type { padding-left: 20px; }

            .text {
                @if ($debug) { border: 1px solid red; }

                padding-top : 5px;
                line-height : 18px;
                display     : inline-block;
                align-items : flex-start;

                &:after {
                    content    : '';
                    width      : 0;
                    height     : 3px;
                    display    : block;
                    background : $white;
                    transition : width 0.3s ease-in;
                }

                &.active {
                    &:after { width: 100%; }
                }
            }
        }
    }
}
</style>

<template>
    <div class="header-wrapper">
        <div class="header">
            <router-link class="logo-wrapper" to="/" tag="div" exact>
                <img class="logo-img" src="/images/logo.png">
            </router-link>
            <div class="media-wrapper">
                <icon class="icon" name="facebook"></icon>
                <icon class="icon" name="youtube-play"></icon>
                <icon class="icon" name="twitter"></icon>
            </div>
            <router-link class="header-el" :class="element.id" v-for="element in header" :key="element.id" @mouseenter.native="element.active = true" @mouseleave.native="element.active = false" :to="'/' + element.id" tag="div" exact-active-class="active" exact>
                <div class="text" :class="{ active: element.active }">{{ element.label | uppercase }}</div>
            </router-link>
        </div>
        <div class="subheader">
            <div class="subheader-el" v-for="element in subheader" @mouseenter="element.active = true" @mouseleave="element.active = false">
                <div class="text" :class="{ active: element.active }">{{ element.label | uppercase }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import Icon from 'vue-awesome/components/Icon'

export default {
    data () {
        return {
            header: [
                { id: 'flag', label: 'flag', active: false },
                { id: 'tackle', label: 'tackle', active: false },
                { id: 'association', label: 'zveza', active: false }
            ],
            subheader: [
                { label: 'koledar', active: false },
                { label: 'lige', active: false },
                { label: 'kaj je flag', active: false },
                { label: 'reprezentanca', active: false }
            ]
        }
    },
    components: {
        icon: Icon
    }
}
</script>
