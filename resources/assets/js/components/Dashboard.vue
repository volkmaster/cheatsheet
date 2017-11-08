<style lang="scss" scoped>
@import '../../sass/app';

.dashboard {
    width            : 100%;
    height           : 100%;
    display          : flex;
    justify-content  : center;
    background-color : $pickled-bluewood;
}

.dashboard__loader-initial {
    position : absolute;
    top      : 40%;
    width    : 100px;
    height   : 100px;
}

.dashboard__loader-scroll {
    position : absolute;
    bottom   : -50px;
    width    : 50px;
    height   : 50px;
}

.dashboard__grid {
    position        : relative;
    margin          : 40px;
    display         : flex;
    justify-content : center;
    flex-wrap       : wrap;
    transition      : filter 0.1s linear;

    @include breakpoint-2560 { margin : 30px; }
    @include breakpoint-1920 { margin : 25px; }
    @include breakpoint-1680 { margin : 20px; }
    @include breakpoint-1440 { margin : 20px; }
    @include breakpoint-1280 { margin : 20px; }
}

.dashboard__grid--blur {
    filter         : blur(5px);
    pointer-events : none;
}

.dashboard__grid-item {
    position         : relative;
    width            : 416px;
    height           : 416px;
    margin           : 40px;
    background-color : $porcelain;
    box-shadow       : 5px 5px 3px rgba(0, 0, 0, 0.3);
    cursor           : pointer;
    transition       : background-color 0.1s linear;

    @include breakpoint-2560 {
        width  : 405px;
        height : 405px;
        margin : 30px;
    }

    @include breakpoint-1920 {
        width  : 300px;
        height : 300px;
        margin : 25px;
    }

    @include breakpoint-1680 {
        width  : 252px;
        height : 252px;
        margin : 20px;
    }

    @include breakpoint-1440 {
        width  : 290px;
        height : 290px;
        margin : 20px;
    }

    @include breakpoint-1280 {
        width  : 288px;
        height : 288px;
        margin : 20px;
    }
}

.dashboard__grid-item:hover { background-color: $cornflower; }

.dashboard__grid-item--placeholder {
    height        : 0;
    margin-top    : 0;
    margin-bottom : 0;
    box-shadow    : none;
    cursor        : auto;
}

.dashboard__plus {
    height          : 100%;
    padding-top     : 40px;
    display         : flex;
    align-items     : center;
    justify-content : center;

    @include breakpoint-2560 { padding-top : 35px; }
    @include breakpoint-1920 { padding-top : 30px; }
    @include breakpoint-1680 { padding-top : 25px; }
    @include breakpoint-1440 { padding-top : 25px; }
    @include breakpoint-1280 { padding-top : 25px; }
}

.dashboard__plus::before {
    content     : '+';
    color       : $pickled-bluewood;
    font-size   : 400px;
    font-family : $font-title;

    @include breakpoint-2560 { font-size : 350px; }
    @include breakpoint-1920 { font-size : 285px; }
    @include breakpoint-1680 { font-size : 270px; }
    @include breakpoint-1440 { font-size : 270px; }
    @include breakpoint-1280 { font-size : 270px; }
}

.dashboard__grid-item-title {
    padding     : 10px;
    color       : $cinnabar;
    font-size   : 50px;
    font-family : $font-title;

    @include breakpoint-2560 { font-size : 50px; }
    @include breakpoint-1920 { font-size : 40px; }
    @include breakpoint-1680 { font-size : 35px; }
    @include breakpoint-1440 { font-size : 40px; }
    @include breakpoint-1280 { font-size : 38px; }
}

.dashboard__grid-item-description {
    position : absolute;
    bottom   : 10px;
    left     : 10px;
    color    : $mariner;
}

.dashboard__grid-item-number {
    width       : 100%;
    font-size   : 32px;
    font-family : $font-regular;

    @include breakpoint-2560 { font-size : 30px; }
    @include breakpoint-1920 { font-size : 23px; }
    @include breakpoint-1680 { font-size : 21px; }
    @include breakpoint-1440 { font-size : 23px; }
    @include breakpoint-1280 { font-size : 23px; }
}

.dashboard__grid-item-text {
    width       : 100%;
    font-size   : 27px;
    font-family : $font-light;
    text-align  : center;

    @include breakpoint-2560 { font-size : 25px; }
    @include breakpoint-1920 { font-size : 18px; }
    @include breakpoint-1680 { font-size : 16px; }
    @include breakpoint-1440 { font-size : 18px; }
    @include breakpoint-1280 { font-size : 18px; }
}

.dashboard__grid-item-language {
    position        : absolute;
    bottom          : 10px;
    width           : 100%;
    padding-right   : 10px;
    display         : flex;
    justify-content : flex-end;
}

.dashboard__grid-item-image {
    max-width  : 80px;
    max-height : 80px;

    @include breakpoint-2560 {
        max-width  : 80px;
        max-height : 80px;
    }

    @include breakpoint-1920 {
        max-width  : 60px;
        max-height : 60px;
    }

    @include breakpoint-1680 {
        max-width  : 50px;
        max-height : 50px;
    }

    @include breakpoint-1440 {
        max-width  : 60px;
        max-height : 60px;
    }

    @include breakpoint-1280 {
        max-width  : 60px;
        max-height : 60px;
    }
}

.dashboard__dialog {
    position         : absolute;
    top              : 50%;
    left             : 50%;
    width            : 400px;
    padding          : 10px 0 0 20px;
    transform        : translate3d(-50%, -50%, 0);
    box-shadow       : 0 1px 3px 0 rgba(0, 0, 0, 0.3);
    background-color : $white;
    overflow         : hidden;
}

.close-btn {
    position : absolute;
    top      : 10px;
    right    : 10px;
    width    : 30px;
    height   : 30px;
    cursor   : pointer;

    &:hover .square { border-color: $black; }
}

.square {
    position     : absolute;
    top          : 15px;
    left         : 5px;
    width        : 20px;
    border-style : solid;
    border-color : $dark-gray;
    border-width : 0 0 2px 0;

    &.top    { transform : rotate(45deg);  }
    &.bottom { transform : rotate(-45deg); }
}

.dashboard__dialog-title {
    height      : 30px;
    display     : flex;
    align-items : center;
    color       : $green;
    font-size   : 18px;
}

.dashboard__dialog-content {
    padding    : 10px 40px 10px 0;
    max-height : 375px;
    overflow-y : scroll;
}

.dashboard__dialog-content-name {
    height      : 40px;
    display     : flex;
    align-items : center;
    color       : $black;
    font-size   : 16px;
}

.dashboard__dialog-content-name-label {
    width  : 25%;
    height : 20px;
}

.dashboard__dialog-content-name-input {
    width            : 75%;
    height           : 20px;
    border-style     : solid;
    border-color     : $dark-gray;
    border-width     : 0 0 1px 0;
    outline          : 0;
    background-color : transparent;
    font-size        : 14px;
    font-family      : $font-light;

    &:hover, &:focus { border-color: $black; }
}

.dashboard__dialog-save-button-wrapper {
    margin-top: 10px;
    display: flex;
    justify-content: flex-end;
}

.dashboard__dialog-save-button {
    width            : 100px;
    height           : 40px;
    display          : flex;
    align-items      : center;
    justify-content  : center;
    background-color : $green;
    cursor           : pointer;

    &:hover { filter: brightness(80%); }
}
</style>

<template>
    <div class="dashboard">
        <img class="dashboard__loader-initial" src="/images/loader.svg" v-show="loading.initial"/>
        <div class="dashboard__grid" :class="{ 'dashboard__grid--blur': dialog.opened }" v-show="!loading.initial">
            <div class="dashboard__grid-item" @click="openDialog">
                <div class="dashboard__plus"></div>
            </div>
            <div class="dashboard__grid-item" v-for="item in data.cheatsheets" @click="editCheatsheet(item.id)">
                <div class="dashboard__grid-item-title">
                    {{ item.name }}
                </div>
                <div class="dashboard__grid-item-description">
                    <div class="dashboard__grid-item-number">
                        {{ item.count }}
                    </div>
                    <div class="dashboard__grid-item-text">
                        knowledge pieces
                    </div>
                </div>
                <div class="dashboard__grid-item-language">
                    <img class="dashboard__grid-item-image" :src="item.language.image">
                </div>
            </div>
            <div class="dashboard__grid-item dashboard__grid-item--placeholder" v-for="n in 6"></div>
            <img class="dashboard__loader-scroll" src="/images/loader.svg" v-show="loading.scroll"/>
        </div>
        <div class="dashboard__dialog" v-if="dialog.opened">
            <div class="close-btn" @click="closeDialog">
                <div class="square top"></div>
                <div class="square bottom"></div>
            </div>
            <div class="dashboard__dialog-title">{{ dialog.title | uppercase }}</div>
            <div class="dashboard__dialog-content">
                <div class="dashboard__dialog-content-name">
                    <div class="dashboard__dialog-content-name-label">Name: </div>
                    <input class="dashboard__dialog-content-name-input" type="text" v-model="dialog.cheatsheet.name"/>
                </div>
                <div class="dashboard__dialog-content-name">
                    <div class="dashboard__dialog-content-name-label">Language: </div>
                    <select class="" v-model="dialog.cheatsheet.language">
                        <option v-for="language in data.languages" :value="language.id">
                            {{ language.name }}
                        </option>
                    </select>
                </div>
                <div class="dashboard__dialog-save-button-wrapper" @click="saveCheatsheet">
                    <div class="dashboard__dialog-save-button">{{ dialog.buttonText | uppercase }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash'
import Icon from 'vue-awesome/components/Icon'

export default {
    data () {
        return {
            loading: {
                initial: false,
                scroll: false
            },
            data: {
                cheatsheets: [],
                languages: [],
                noDataMsg: 'No cheatsheets found. Create the first one.'
            },
            filter: {
                placeholder: 'Filter by name...',
                search: '',
                language: 0,
                isFiltered: false
            },
            pagination: {
                perPage: 0,
                currentPage: 1,
                noMorePages: false
            },
            dialog: {
                opened: false,
                title: 'new cheatsheet',
                buttonText: 'save',
                cheatsheet: null
            }
        }
    },
    created () {
        this.setInitialPerPage()
        this.loading.initial = true
        this.loadCheatsheets()
        this.pagination.perPage++
    },
    mounted () {
        this.$nextTick(() => {
            window.addEventListener('scroll', this.handleScroll)
        })
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll)
    },
    computed: { },
    methods: {
        setInitialPerPage () {
            let screenWidth = document.documentElement.clientWidth

            if (screenWidth > 2560) {
                this.pagination.perPage = 20
            } else if (screenWidth > 1920 && screenWidth <= 2560) {
                this.pagination.perPage = 14
            } else if (screenWidth > 1680 && screenWidth <= 1920) {
                this.pagination.perPage = 14
            } else if (screenWidth > 1440 && screenWidth <= 1680) {
                this.pagination.perPage = 14
            } else if (screenWidth > 1280 && screenWidth <= 1440) {
                this.pagination.perPage = 7
            } else {
                this.pagination.perPage = 5
            }
        },
        loadCheatsheets () {
            let params = {
                per_page: this.pagination.perPage,
                page: this.pagination.currentPage
            }

            if (this.filter.search) {
                params.filter_name = encodeURIComponent(this.filter.search)
            }

            if (this.filter.language) {
                params.filter_language = this.filter.language
            }

            axios.get('/api/cheatsheets', { params: params })
                .then(response => {
                    let data = response.data
                    this.addCheatsheets(data)
                    if (data.current_page === data.last_page) {
                        this.pagination.noMorePages = true
                    }
                    this.loading.initial = false
                    this.loading.scroll = false
                })
                .catch(error => console.log(error))
        },
        addCheatsheets (cheatsheets) {
            let data = cheatsheets.data.map(cheatsheet => {
                return { id: cheatsheet.id, name: cheatsheet.name, language: cheatsheet.language, count: cheatsheet.knowledge_piece_ids.length, created: cheatsheet.created_at, modified: cheatsheet.updated_at }
            })

            this.data.cheatsheets.push.apply(this.data.cheatsheets, data)
        },
        loadLanguages () {
            axios.get('/api/languages')
                .then(response => {
                    let data = response.data
                    this.addLanguages(data)
                    this.dialog.cheatsheet.language = this.data.languages.data[0].id
                })
                .catch(error => console.log(error))
        },
        addLanguages (languages) {
            let data = languages.data.map(language => {
                return { id: language.id, name: language.name, image: language.image, created: language.created_at, modified: language.updated_at }
            })

            this.data.languages.push.apply(this.data.languages, data)
        },
        saveCheatsheet () {
            if (this.dialog.cheatsheet.name && this.dialog.cheatsheet.language) {
                axios.post('/api/cheatsheets', this.dialog.cheatsheet)
                    .then(response => {
                        this.closeDialog()
                        this.pagination.currentPage = 1
                        this.loading.initial = true
                        this.loadCheatsheets()
                    })
                    .catch(error => console.log(error))
            }
        },
        openDialog () {
            this.loadLanguages()
            this.dialog.cheatsheet = {
                name: '',
                language: 0
            }
            this.dialog.opened = true
            this.$emit('open-dialog', true)
        },
        closeDialog () {
            this.dialog.opened = false
            this.$emit('open-dialog', false)
        },
        search () {
            if (this.filter.search) {
                this.filter.isFiltered = true
                this.pagination.currentPage = 1
                this.loading.initial = true
                this.loadCheatsheets()
            }
        },
        clear () {
            if (this.filter.isFiltered) {
                this.filter.search = ''
                this.filter.isFiltered = false
                this.pagination.currentPage = 1
                this.loading.initial = true
                this.loadCheatsheets()
            }
        },
        editCheatsheet (id) {
            this.$router.push({ name: 'cheatsheet', params: { id: id } })
        },
        handleScroll: _.debounce(function () {
            if (!this.pagination.noMorePages) {
                let totalHeight = this.$el.clientHeight
                let visibleHeight = document.documentElement.clientHeight
                let scrollHeight = document.documentElement.scrollTop

                if (totalHeight - (scrollHeight + visibleHeight) < 20) {
                    this.pagination.currentPage++
                    this.loading.scroll = true
                    this.$nextTick(() => {
                        $(document.documentElement).animate({
                            scrollTop: totalHeight - visibleHeight + 50
                        }, 1000)
                        this.loadCheatsheets()
                    })
                }
            }
        }, 100)
    },
    components: {
        icon: Icon
    }
}
</script>
