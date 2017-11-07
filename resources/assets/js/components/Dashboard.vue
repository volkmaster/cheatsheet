<style lang="scss" scoped>
@import '../../sass/app';

.dashboard {
    width            : 100%;
    height           : 100%;
    display          : flex;
    justify-content  : center;
    background-color : $pickled-bluewood;
}

.dashboard__loader {
    display         : flex;
    align-items     : center;
    justify-content : center;
    transform       : translate3d(0, -5%, 0);
}

.dashboard__loader-image {
    width  : 100px;
    height : 100px;
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
        <div class="dashboard__loader" v-show="loading">
            <img class="dashboard__loader-image" src="/images/loader.svg"/>
        </div>
        <div class="dashboard__grid" :class="{ 'dashboard__grid--blur': dialogOpened }" v-show="!loading">
            <div class="dashboard__grid-item" @click="openDialog()">
                <div class="dashboard__plus"></div>
            </div>
            <div class="dashboard__grid-item" v-for="item in dataCheatsheets" @click="editCheatsheet(item.id)">
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
        </div>
        <div class="dashboard__dialog" v-if="dialogOpened">
            <div class="close-btn" @click="closeDialog">
                <div class="square top"></div>
                <div class="square bottom"></div>
            </div>
            <div class="dashboard__dialog-title">{{ dialogTitle | uppercase }}</div>
            <div class="dashboard__dialog-content">
                <div class="dashboard__dialog-content-name">
                    <div class="dashboard__dialog-content-name-label">Name: </div>
                    <input class="dashboard__dialog-content-name-input" type="text" v-model="newCheatsheet.name"/>
                </div>
                <div class="dashboard__dialog-content-name">
                    <div class="dashboard__dialog-content-name-label">Language: </div>
                    <select class="" v-model="newCheatsheet.language">
                        <option v-for="language in dataLanguages" :value="language.id">
                            {{ language.name }}
                        </option>
                    </select>
                </div>
                <div class="dashboard__dialog-save-button-wrapper" @click="saveCheatsheet">
                    <div class="dasboard__dialog-save-button">{{ dialogBtnText | uppercase }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Icon from 'vue-awesome/components/Icon'

export default {
    data () {
        return {
            loading: false,
            title: 'cheatsheets',
            cheatsheets: null,
            languages: null,
            filter: {
                placeholder: 'Filter by name...',
                search: '',
                isFiltered: false
            },
            perPage: 0,
            currentPage: 1,
            noDataMsg: 'No cheatsheets found. Create the first one.',
            dialogOpened: false,
            dialogTitle: 'new cheatsheet',
            dialogBtnText: 'save',
            newCheatsheet: null
        }
    },
    created () {
        this.setInitialPerPage()
        this.loadCheatsheets()
        this.perPage++
    },
    computed: {
        dataCheatsheets () {
            let data = []

            if (this.cheatsheets) {
                data = this.cheatsheets.data.map(cheatsheet => {
                    return { id: cheatsheet.id, name: cheatsheet.name, language: cheatsheet.language, count: cheatsheet.knowledge_piece_ids.length, created: cheatsheet.created_at, modified: cheatsheet.updated_at }
                })
            }

            return data
        },
        dataLanguages () {
            let data = []

            if (this.languages) {
                data = this.languages.data.map(language => {
                    return { id: language.id, name: language.name, image: language.image, created: language.created_at, modified: language.updated_at }
                })
            }

            return data
        }
    },
    methods: {
        setInitialPerPage () {
            let screenWidth = document.documentElement.clientWidth

            if (screenWidth > 2560) {
                this.perPage = 20
            } else if (screenWidth > 1920 && screenWidth <= 2560) {
                this.perPage = 14
            } else if (screenWidth > 1680 && screenWidth <= 1920) {
                this.perPage = 14
            } else if (screenWidth > 1440 && screenWidth <= 1680) {
                this.perPage = 14
            } else if (screenWidth > 1280 && screenWidth <= 1440) {
                this.perPage = 7
            } else {
                this.perPage = 5
            }
        },
        loadCheatsheets () {
            this.loading = true

            let params = {
                per_page: this.perPage,
                page: this.currentPage
            }

            if (this.filter.search) {
                params.filter_name = encodeURIComponent(this.filter.search)
            }

            axios.get('/api/cheatsheets', { params: params })
                .then(response => {
                    this.cheatsheets = response.data
                    this.loading = false
                })
                .catch(error => console.log(error))
        },
        loadLanguages () {
            axios.get('/api/languages')
                .then(response => {
                    this.languages = response.data
                    this.newCheatsheet.language = this.languages.data[0].id
                })
                .catch(error => console.log(error))
        },
        saveCheatsheet () {
            if (this.newCheatsheet.name && this.newCheatsheet.language) {
                axios.post('/api/cheatsheets', this.newCheatsheet)
                    .then(response => {
                        this.closeDialog()
                        this.currentPage = 1
                        this.loadCheatsheets()
                    })
                    .catch(error => console.log(error))
            }
        },
        openDialog () {
            this.loadLanguages()
            this.newCheatsheet = {
                name: '',
                language: 0
            }
            this.dialogOpened = true
            this.$emit('open-dialog', true)
        },
        closeDialog () {
            this.dialogOpened = false
            this.$emit('open-dialog', false)
        },
        search () {
            if (this.filter.search) {
                this.filter.isFiltered = true
                this.currentPage = 1
                this.loadCheatsheets()
            }
        },
        clear () {
            if (this.filter.isFiltered) {
                this.filter.search = ''
                this.filter.isFiltered = false
                this.currentPage = 1
                this.loadCheatsheets()
            }
        },
        editCheatsheet (id) {
            this.$router.push({ name: 'cheatsheet', params: { id: id } })
        }
    },
    components: {
        icon: Icon
    }
}
</script>
