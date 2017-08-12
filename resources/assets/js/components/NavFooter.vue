<style lang="scss" scoped>
@import '../../sass/app';

.footer-wrapper {
    width            : 100%;
    height           : 150px;
    display          : flex;
    justify-content  : center;
    font-family      : $font-light;
    background-color : $dark-gray;

    .footer {
        width           : 1230px;
        display         : flex;
        justify-content : center;
        flex-direction  : column;

        .title, .copyright {
            margin    : 5px 0;
            color     : $white;
            font-size : 14px;
        }
    }
}
</style>

<template>
    <div class="footer-wrapper">
        <div class="footer">
            <div class="title">{{ title }}</div>
            <div class="copyright">{{ copyright }}</div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            title: 'Minimal Viable Product - Prototype application for Cheatsheet management platform',
            copyright: '\u00A9  3PrijateljaCorp, August 2017'
        }
    }
}
</script>
