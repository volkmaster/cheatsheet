<style lang="scss" scoped>
@import '../../sass/app';

.filter-wrapper {
    margin-top       : 20px;
    padding          : 0 20px;
    display          : flex;
    align-items      : center;
    font-family      : $font-title;
    font-size        : 25px;
    background-color : $very-light-gray;
    color            : $white;

    .filter-el {
        margin-right     : 10px;
        padding          : 5px 20px;
        background-color : $green;

        &:last-of-type { background-color: #a0bd86; }
    }
}

.content-wrapper {
    @if ($debug) { border: 1px solid blue; }

    width            : 100%;
    min-height       : calc(100vh - 250px);
    display          : flex;
    background-color : $very-light-gray;

    .events-wrapper {
        @if ($debug) { border: 1px solid blue; }

        width            : calc(20% - 20px);
        background-color : $light-gray;
        margin           : 20px 0 20px 20px;
        padding          : 20px;
        color            : $dark-gray;

        .events-title {
            font-size     : 35px;
            line-height   : 35px;
            margin-bottom : 20px;
            font-family   : $font-title;
        }
    }

    .news-wrapper {
        @if ($debug) { border: 1px solid blue; }

        width            : calc(60% - 40px);
        margin           : 20px;
        background-color : $very-light-gray;

        .news-title {
            width            : 100%;
            padding          : 15px 10px 0 10px;
            background-color : $green;
            color            : $white;
            font-size        : 30px;
            font-family      : $font-title;
            line-height      : 30px;
        }

        .news-text {
            width            : 100%;
            height           : 100%;
            padding          : 10px;
            background-color : $green;
            color            : $white;
            text-align       : justify;
            text-justify     : inter-word;
            line-height      : 1.4;
        }

        .news-img { width: 100%; }

        .main-news {
            width: 100%;

            .news-img-div {
                width    : 100%;
                height   : 300px;
                overflow : hidden;
            }
        }

        .small-news-wrapper {
            width      : 100%;
            margin-top : 20px;
            display    : flex;

            .small-news {
                display        : flex;
                flex-direction : column;

                &:first-of-type { margin-right: 10px; }
                &:last-of-type  { margin-left: 10px;  }

                .news-img-div {
                    width  : 100%;
                    height : 200px;
                }
            }
        }
    }

    .sponsors-wrapper {
        @if ($debug) { border: 1px solid blue; }

        width            : calc(20% - 20px);
        margin           : 20px 20px 20px 0;
        padding          : 20px;
        background-color : $light-gray;
        color            : $dark-gray;

        .sponsors-title {
            font-size     : 35px;
            line-height   : 35px;
            margin-bottom : 20px;
            font-family   : $font-title;
        }
    }
}
</style>

<template>
    <div>
        <div class="filter-wrapper">
            <div class="filter-el">1. LIGA</div>
            <div class="filter-el">2. LIGA</div>
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
                <template v-for="(arr, index) in structuredNews">
                    <div class="main-news" v-if="index === 0">
                        <div class="news-img-div">
                            <img class="news-img" :src="arr[0].image">
                        </div>
                        <div class="news-title">{{ arr[0].title }}</div>
                        <div class="news-text">{{ arr[0].text }}</div>
                    </div>
                    <div class="small-news-wrapper" v-else>
                        <div class="small-news" v-for="element in arr">
                            <div class="news-img-div">
                                <img class="news-img" :src="element.image">
                            </div>
                            <div class="news-title">{{ element.title }}</div>
                            <div class="news-text">{{ element.text }}</div>
                        </div>
                    </div>
                </template>
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
    </div>
</template>

<script>
export default {
    data () {
        return {
            events: [
                { title: 'Dogodek 1', date: '1.8.2017' },
                { title: 'Dogodek 2', date: '1.8.2017' },
                { title: 'Dogodek 3', date: '1.8.2017' }
            ],
            news: [
                {
                    title: 'Finalni touchdown za DP v Flag Footballu je pred vrati!',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.',
                    image: '/images/american_football.jpg'
                },
                {
                    title: '3. krog članskega DP in začetek DP mladinskih selekcij',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.',
                    image: '/images/ball.jpg'
                },
                {
                    title: 'Pregled 2. kroga DP v Flag Footballu',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.',
                    image: '/images/american_football.jpg'
                },
                {
                    title: '3. krog članskega DP in začetek DP mladinskih selekcij',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.',
                    image: '/images/american_football.jpg'
                },
                {
                    title: 'Pregled 2. kroga DP v Flag Footballu',
                    text: 'Letošnje državno prvenstvo v Flag Footballu bo to soboto dobilo epilog. Po rednem delu tekmovanja sta se v finale uvrstili ekipi Ajdovščina Gladiators in Kočevje Wild Hogs. Ajdovščina v finale prihaja kot izraziti favorit, saj v rednem delu sezone sploh ni zabeležila poraza. Na drugi strani Kočevje v dvoboj prihaja brez pritiska, saj so v letošnji sezoni naredili ogromen preskok v svoji igri in zabeležili tudi odmevnejši uspeh z zmago turnirja v tujini.',
                    image: '/images/defense.jpg'
                }
            ],
            sponsors: [
                { title: 'Sponzor 1' },
                { title: 'Sponzor 2' },
                { title: 'Sponzor 3' }
            ]
        }
    },
    computed: {
        structuredNews () {
            let arr = []
            arr.push([this.news[0]])

            let innerArr = []
            for (let i = 1; i < this.news.length; i++) {
                innerArr.push(this.news[i])
                if (i % 2 === 0) {
                    arr.push(innerArr)
                    innerArr = []
                }
            }

            return arr
        }
    },
    created () {},
    mounted () {
        this.$nextTick(() => {})
    },
    methods: {}
}
</script>
