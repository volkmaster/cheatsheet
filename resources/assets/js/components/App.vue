<style lang="scss" scoped>
@import '../../sass/app';

.wrapper {
    width: 100%;
    height: 100%;
}

.header-wrapper {
    @if ($debug) { border: 1px solid red; }

    width: 100%;
    height: 100px;
    display: flex;
    font-family: $font-title;

    .logo-wrapper {
        @if ($debug) { border: 1px solid red; }

        width: 200px;
        margin: 0 calc(40% - 220px) 0 20px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        cursor: pointer;

        .logo-img {
            @if ($debug) { border: 1px solid red; }

            max-height: 80%;
            cursor: pointer;
        }
    }

    .media-wrapper {
        @if ($debug) { border: 1px solid red; }

        width: 15%;
        padding-right: 1%;
        display: flex;
        align-items: center;
        justify-content: center;

        .icon {
            @if ($debug) { border: 1px solid red; }

            width: 50px;
            height: 30%;
            color: $dark-gray;
            cursor: pointer;

            &:hover { color: $black; }
        }
    }

    .header-el {
        @if ($debug) { border: 1px solid red; }

        width: 15%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: $white;
        font-size: 35px;
        cursor: pointer;

        &.flag { background-color: $green; }
        &.tackle { background-color: $blue; }
        &.association { background-color: $dark-gray; }

        .text {
            @if ($debug) { border: 1px solid red; }

            padding-top: 10px;
            line-height: 27px;
            display: inline-block;
            align-items: flex-start;

            &:after {
                content: '';
                width: 0;
                height: 3px;
                display: block;
                background: $white;
                transition: width 0.3s ease-in;
            }

            &.active {
                &:after { width: 100%; }
            }
        }
    }
}

.subheader-wrapper {
    width: 100%;
    height: 45px;
    display: flex;
    align-items: center;
    font-family: $font-title;
    font-size: 25px;
    background-color: $green;
    color: $white;

    .subheader-el {
        @if ($debug) { border: 1px solid red; }

        padding: 0 25px;
        cursor: pointer;

        &:first-of-type { padding-left: 20px; }

        .text {
            @if ($debug) { border: 1px solid red; }

            padding-top: 5px;
            line-height: 18px;
            display: inline-block;
            align-items: flex-start;

            &:after {
                content: '';
                width: 0;
                height: 3px;
                display: block;
                background: $white;
                transition: width 0.3s ease-in;
            }

            &.active {
                &:after { width: 100%; }
            }
        }
    }
}

.subsubheader-wrapper {
    margin: 10px 0;
    padding: 0 20px;
    display: flex;
    align-items: center;
    font-family: $font-title;
    font-size: 25px;
    background-color: $very-light-gray;
    color: $white;

    .subsubheader-el {
        margin-right: 10px;
        padding: 5px 20px;
        background-color: $green;

        &:last-of-type { background-color: #a0bd86; }
    }
}

.content-wrapper {
    @if ($debug) { border: 1px solid blue; }

    width: 100%;
    min-height: calc(100vh - 250px);
    display: flex;
    background-color: $very-light-gray;

    .events-wrapper {
        @if ($debug) { border: 1px solid blue; }

        width: calc(20% - 20px);
        background-color: $light-gray;
        margin: 20px 0 20px 20px;
        padding: 20px;
        color: $dark-gray;

        .events-title {
            font-size: 35px;
            line-height: 35px;
            margin-bottom: 20px;
            font-family: $font-title;
        }
    }

    .news-wrapper {
        @if ($debug) { border: 1px solid blue; }

        width: calc(60% - 40px);
        margin: 20px;
        background-color: $very-light-gray;

        .news-title {
            width: 100%;
            padding: 15px 10px 0 10px;
            background-color: $green;
            color: $white;
            font-size: 30px;
            font-family: $font-title;
            line-height: 30px;
        }

        .news-text {
            width: 100%;
            height: 100%;
            padding: 10px;
            background-color: $green;
            color: $white;
            text-align: justify;
            text-justify: inter-word;
            line-height: 1.4;
        }

        .news-img {
            width: 100%;
        }

        .main-news {
            width: 100%;

            .news-img-div {
                width: 100%;
                height: 300px;
                overflow: hidden;
            }
        }

        .small-news-wrapper {
            width: 100%;
            margin-top: 20px;
            display: flex;

            .small-news {
                display: flex;
                flex-direction: column;

                &.left { margin-right: 10px; }
                &.right { margin-left: 10px; }

                .news-img-div {
                    width: 100%;
                    height: 200px;
                }
            }
        }
    }

    .sponsors-wrapper {
        @if ($debug) { border: 1px solid blue; }

        width: calc(20% - 20px);
        margin: 20px 20px 20px 0;
        padding: 20px;
        background-color: $light-gray;
        color: $dark-gray;

        .sponsors-title {
            font-size: 35px;
            line-height: 35px;
            margin-bottom: 20px;
            font-family: $font-title;
        }
    }
}

.footer-wrapper {
    @if ($debug) { border: 1px solid green; }

    width: 100%;
    height: 150px;
    background-color: $text-color;
}
</style>

<template>
    <div class="wrapper">
        <div class="header-wrapper">
            <div class="logo-wrapper">
                <img class="logo-img" src="/images/logo.png">
            </div>
            <div class="media-wrapper">
                <icon class="icon" name="facebook"></icon>
                <icon class="icon" name="youtube-play"></icon>
                <icon class="icon" name="twitter"></icon>
            </div>
            <div class="header-el" :class="element.id" v-for="element in header" @mouseenter="element.active = true" @mouseleave="element.active = false">
                <div class="text" :class="{ active: element.active }">{{ element.label | uppercase }}</div>
            </div>
        </div>
        <div class="subheader-wrapper">
            <div class="subheader-el" v-for="element in subheader" @mouseenter="element.active = true" @mouseleave="element.active = false">
                <div class="text" :class="{ active: element.active }">{{ element.label | uppercase }}</div>
            </div>
        </div>
        <div class="subsubheader-wrapper">
            <div class="subsubheader-el">
                1. LIGA
            </div>
            <div class="subsubheader-el">
                2. LIGA
            </div>
        </div>
        <div class="content-wrapper">
            <div class="events-wrapper">
                <div class="events-title">DOGODKI</div>
                <div class="event" v-for="element in events">
                    <div class="event-title">
                        {{ element.title }}
                    </div>
                    <div class="event-date">
                        {{ element.date }}
                    </div>
                </div>
            </div>
            <div class="news-wrapper">
                <div class="main-news">
                    <div class="news-img-div">
                        <img class="news-img" src="/images/american_football.jpg">
                    </div>
                    <div class="news-title">
                        {{ news[0].title }}
                    </div>
                    <div class="news-text">
                        {{ news[0].text }}
                    </div>
                </div>
                <div class="small-news-wrapper">
                    <div class="small-news left">
                        <div class="news-img-div">
                            <img class="news-img" src="/images/ball.jpg">
                        </div>
                        <div class="news-title">
                            {{ news[1].title }}
                        </div>
                        <div class="news-text">
                            {{ news[1].text }}
                        </div>
                    </div>
                    <div class="small-news right">
                        <div class="news-img-div">
                            <img class="news-img" src="/images/american_football.jpg">
                        </div>
                        <div class="news-title">
                            {{ news[2].title }}
                        </div>
                        <div class="news-text">
                            {{ news[2].text }}
                        </div>
                    </div>
                </div>
                <div class="small-news-wrapper">
                    <div class="small-news left">
                        <div class="news-img-div">
                            <img class="news-img" src="/images/american_football.jpg">
                        </div>
                        <div class="news-title">
                            {{ news[3].title }}
                        </div>
                        <div class="news-text">
                            {{ news[3].text }}
                        </div>
                    </div>
                    <div class="small-news right">
                        <div class="news-img-div">
                            <img class="news-img" src="/images/defense.jpg">
                        </div>
                        <div class="news-title">
                            {{ news[4].title }}
                        </div>
                        <div class="news-text">
                            {{ news[4].text }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="sponsors-wrapper">
                <div class="sponsors-title">SPONZORJI</div>
                <div class="event" v-for="element in sponsors">
                    <div class="event-title">
                        {{ element.title }}
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrapper">
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
            ],
            events: [
                { title: 'Dogodek 1', date: '1.8.2017' },
                { title: 'Dogodek 2', date: '1.8.2017' },
                { title: 'Dogodek 3', date: '1.8.2017' }
            ],
            news: [
                {
                    title: 'Finalni touchdown za DP v Flag Footballu je pred vrati!',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.'
                },
                {
                    title: '3. krog članskega DP in začetek DP mladinskih selekcij',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.'
                },
                {
                    title: 'Pregled 2. kroga DP v Flag Footballu',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.'
                },
                {
                    title: '3. krog članskega DP in začetek DP mladinskih selekcij',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.'
                },
                {
                    title: 'Pregled 2. kroga DP v Flag Footballu',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.'
                }
            ],
            sponsors: [
                { title: 'Sponzor 1' },
                { title: 'Sponzor 2' },
                { title: 'Sponzor 3' }
            ]
        }
    },
    computed: {},
    created () {},
    mounted () {
        this.$nextTick(() => {})
    },
    methods: {},
    components: {
        icon: Icon
    }
}
</script>
