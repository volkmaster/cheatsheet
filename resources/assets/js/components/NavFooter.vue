<style lang="scss" scoped>
@import '../../sass/app';

.footer {
    width            : 100%;
    height           : 100px;
    display          : flex;
    justify-content  : center;
    align-items      : center;
    flex-direction   : column;
    background-color : $dark-gray;
}

.footer__row { width: 1230px; }

.footer__title, .footer__copyright {
    margin      : 10px 0;
    color       : $white;
    font-size   : 14px;
    font-family : $font-light;
}
</style>

<template>
    <div class="footer">
        <div class="footer__row">
            <div class="footer__title">{{ title }}</div>
            <div class="footer__copyright">{{ copyright }}</div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            title: 'Minimal Viable Product - Prototype application for Cheatsheet management platform Cheatr',
            copyright: '\u00A9  3PrijateljiCorp, October 2017'
        }
    }
}
</script>
