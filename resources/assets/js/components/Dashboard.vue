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
    position      : absolute;
    bottom         : -45px;
    width          : 65px;
    height         : 65px;
    padding-bottom : 18px;

    @include breakpoint-2560 {
        bottom         : -30px;
        width          : 45px;
        height         : 45px;
        padding-bottom : 10px;
    }

    @include breakpoint-1920 {
        bottom         : -25px;
        width          : 40px;
        height         : 40px;
        padding-bottom : 8px;
    }

    @include breakpoint-1680 {
        bottom         : -25px;
        width          : 35px;
        height         : 35px;
        padding-bottom : 10px;
    }

    @include breakpoint-1440 {
        bottom         : -20px;
        width          : 30px;
        height         : 30px;
        padding-bottom : 5px;
    }

    @include breakpoint-1280 {
        bottom         : -20px;
        width          : 30px;
        height         : 30px;
        padding-bottom : 5px;
    }
}

.dashboard__grid {
    position        : relative;
    margin          : 40px;
    display         : flex;
    justify-content : center;
    flex-wrap       : wrap;

    @include breakpoint-2560 { margin : 30px; }
    @include breakpoint-1920 { margin : 25px; }
    @include breakpoint-1680 { margin : 20px; }
    @include breakpoint-1440 { margin : 20px; }
    @include breakpoint-1280 { margin : 20px; }
}

.dashboard__grid--blur {
    filter         : blur(4px);
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

.dashboard__grid-item:hover, .dashboard__grid-item--active { background-color: $cornflower; }

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
    object-fit : contain;

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
    left             : 50%;
    width            : 600px;
    height           : 350px;
    padding          : 20px;
    transform        : translate3d(-50%, -50%, 0);
    box-shadow       : 0 1px 3px 0 rgba(0, 0, 0, 0.3);
    background-color : $porcelain;
    overflow         : hidden;
    animation        : fade-in 0.1s linear 0s forwards;

    @keyframes fade-in {
        from { opacity : 0; }
        to   { opacity : 1; }
    }

    @include breakpoint-2560 {
        width  : 500px;
        height : 275px;
    }

    @include breakpoint-1920 {
        width  : 450px;
        height : 275px;
    }

    @include breakpoint-1680 {
        width  : 400px;
        height : 275px;
    }

    @include breakpoint-1440 {
        width  : 400px;
        height : 275px;
    }

    @include breakpoint-1280 {
        width  : 400px;
        height : 275px;
    }

}

.dashboard__dialog-close-icon {
    position   : absolute;
    top        : 30px;
    right      : 20px;
    width      : 35px;
    height     : 35px;
    color      : $cornflower;
    cursor     : pointer;
    transition : color 0.1s linear;

    @include breakpoint-2560 {
        top    : 30px;
        width  : 30px;
        height : 30px;
    }

    @include breakpoint-1920 {
        top    : 27px;
        width  : 25px;
        height : 25px;
    }

    @include breakpoint-1680 {
        top    : 25px;
        width  : 25px;
        height : 25px;
    }

    @include breakpoint-1440 {
        top    : 25px;
        width  : 23px;
        height : 23px;
    }

    @include breakpoint-1280 {
        top    : 25px;
        width  : 23px;
        height : 23px;
    }
}

.dashboard__dialog-close-icon:hover { color: $mariner; }

.dashboard__dialog-title {
    color       : $cinnabar;
    font-size   : 60px;
    font-family : $font-title;

    @include breakpoint-2560 { font-size : 50px; }
    @include breakpoint-1920 { font-size : 40px; }
    @include breakpoint-1680 { font-size : 35px; }
    @include breakpoint-1440 { font-size : 35px; }
    @include breakpoint-1280 { font-size : 32px; }
}

.dashboard__dialog-content { margin: 10px 0; }

.dashboard__dialog-content-row {
    height      : 65px;
    display     : flex;
    align-items : center;

    @include breakpoint-2560 { height : 50px; }
    @include breakpoint-1920 { height : 50px; }
    @include breakpoint-1680 { height : 50px; }
    @include breakpoint-1440 { height : 50px; }
    @include breakpoint-1280 { height : 50px; }
}

.dashboard__dialog-content-label { width: 25%; }

.dashboard__dialog-content-input {
    width            : 75%;
    padding          : 0 0 2px 4px;
    border-style     : solid;
    border-color     : $curious-blue;
    border-width     : 0 0 1px 0;
    background-color : transparent;
    outline          : 0;
    transition       : border-color 0.1s linear, color 0.1s linear;
}

.dashboard__dialog-content-input:hover, .dashboard__dialog-content-input:focus {
    border-color : $mariner;
    color        : $mariner;
}

.dashboard__dialog-content-select {
    width            : 75%;
    padding-bottom   : 2px;
    border-width     : 0 0 1px 0;
    border-color     : $curious-blue;
    outline          : 0;
    background-color : transparent;
    transition       : border-color 0.1s linear, color 0.1s linear;
}

.dashboard__dialog-content-select:hover, .dashboard__dialog-content-input:focus {
    border-color : $mariner;
    color        : $mariner;
}

.dashboard__dialog-content-option {
    background-color : $porcelain;
    color            : $mariner;
}

.dashboard__dialog-content--font {
    color       : $curious-blue;
    font-size   : 23px;
    font-family : $font-light;

    @include breakpoint-2560 { font-size : 18px; }
    @include breakpoint-1920 { font-size : 17px; }
    @include breakpoint-1680 { font-size : 16px; }
    @include breakpoint-1440 { font-size : 15px; }
    @include breakpoint-1280 { font-size : 14px; }
}

.dashboard__dialog-error-wrapper {
    position        : absolute;
    bottom          : 20px;
    left            : 20px;
    margin-top      : 3px;
    display         : flex;
    justify-content : flex-end;
    flex-direction  : column;
}

.dashboard__dialog-error {
    color      : $cinnabar;
    font-style : italic;
    font-size  : 20px;

    @include breakpoint-2560 { font-size : 16px; }
    @include breakpoint-1920 { font-size : 15px; }
    @include breakpoint-1680 { font-size : 14px; }
    @include breakpoint-1440 { font-size : 13px; }
    @include breakpoint-1280 { font-size : 12px; }
}

.dashboard__dialog-button-wrapper {
    position : absolute;
    bottom   : 20px;
    right    : 20px;
    display  : flex;
}

.dashboard__dialog-button {
    width            : 100px;
    height           : 50px;
    display          : flex;
    align-items      : center;
    justify-content  : center;
    color            : $white;
    font-size        : 20px;
    cursor           : pointer;
    transition       : background-color 0.1s linear;

    @include breakpoint-2560 { font-size : 16px; }
    @include breakpoint-1920 { font-size : 15px; }
    @include breakpoint-1680 { font-size : 14px; }
    @include breakpoint-1440 { font-size : 13px; }
    @include breakpoint-1280 { font-size : 12px; }
}

.dashboard__dialog-button--save {
    margin-right     : 10px;
    background-color : $curious-blue;
}

.dashboard__dialog-button--save:hover { background-color: $mariner; }

.dashboard__dialog-button--open {
    background-color : $green;
}

.dashboard__dialog-button--open:hover { filter: brigthness(90%); }
</style>

<template>
    <div class="dashboard">
        <img class="dashboard__loader-initial" src="/images/loader.svg" v-show="loading.initial"/>
        <div class="dashboard__grid" :class="{ 'dashboard__grid--blur': dialog.opened }" v-show="!loading.initial">
            <div class="dashboard__grid-item" :class="{ 'dashboard__grid-item--active': dialog.opened }" @click="openDialog">
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
            <icon class="dashboard__dialog-close-icon" name="close" @click.native="closeDialog"></icon>
            <div class="dashboard__dialog-title">{{ dialog.title | uppercase }}</div>
            <div class="dashboard__dialog-content">
                <div class="dashboard__dialog-content-row">
                    <div class="dashboard__dialog-content-label dashboard__dialog-content--font">Name: </div>
                    <input class="dashboard__dialog-content-input dashboard__dialog-content--font" type="text" v-model="dialog.cheatsheet.name"/>
                </div>
                <div class="dashboard__dialog-content-row">
                    <div class="dashboard__dialog-content-label dashboard__dialog-content--font">Language: </div>
                    <select class="dashboard__dialog-content-select dashboard__dialog-content--font" v-model="dialog.cheatsheet.language">
                        <option class="dashboard__dialog-content-option dashboard__dialog-content--font" v-for="language in data.languages" :value="language.id">
                            {{ language.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="dashboard__dialog-error-wrapper">
                <div class="dashboard__dialog-error" v-for="error in dialog.errors">
                    {{ error }}
                </div>
            </div>
            <div class="dashboard__dialog-button-wrapper">
                <div class="dashboard__dialog-button dashboard__dialog-button--save" @click="saveCheatsheet">{{ dialog.buttonText.save | uppercase }}</div>
                <div class="dashboard__dialog-button dashboard__dialog-button--open" @click="saveCheatsheet(true)">{{ dialog.buttonText.open | uppercase }}</div>
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
            order: {
                by: 'updated_at',
                direction: 'desc'
            },
            dialog: {
                opened: false,
                title: 'new cheatsheet',
                buttonText: {
                    open: 'open',
                    save: 'save'
                },
                cheatsheet: null,
                errors: []
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
                this.pagination.perPage = 27
            } else if (screenWidth > 1920 && screenWidth <= 2560) {
                this.pagination.perPage = 14
            } else if (screenWidth > 1680 && screenWidth <= 1920) {
                this.pagination.perPage = 14
            } else if (screenWidth > 1440 && screenWidth <= 1680) {
                this.pagination.perPage = 19
            } else if (screenWidth > 1280 && screenWidth <= 1440) {
                this.pagination.perPage = 11
            } else {
                this.pagination.perPage = 8
            }
        },
        loadCheatsheets () {
            let params = {
                page: this.pagination.currentPage,
                per_page: this.pagination.perPage,
                order_by: this.order.by,
                order_direction: this.order.direction
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
        saveCheatsheet (edit = false) {
            this.dialog.errors = []

            if (!this.dialog.cheatsheet.name) {
                this.dialog.errors.push('Name is required.')
            }

            if (!this.dialog.cheatsheet.language) {
                this.dialog.errors.push('Language is required.')
            }

            if (this.dialog.errors.length === 0) {
                axios.post('/api/cheatsheets', this.dialog.cheatsheet)
                    .then(response => {
                        this.data.cheatsheets = []
                        this.pagination.perPage--
                        this.pagination.currentPage = 1
                        this.order.by = 'updated_at'
                        this.order.direction = 'desc'
                        this.loading.initial = true
                        this.loadCheatsheets()
                        this.pagination.perPage++
                        this.closeDialog()
                        if (edit) {
                            this.editCheatsheet(response.data.id)
                        }
                    })
                    .catch(error => {
                        this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                    })
            }
        },
        handleScroll: _.debounce(function () {
            if (!this.loading.scroll && !this.pagination.noMorePages) {
                let totalHeight = this.$el.clientHeight
                let visibleHeight = document.documentElement.clientHeight
                let scrollHeight = document.documentElement.scrollTop

                if (totalHeight - (scrollHeight + visibleHeight) < 20) {
                    this.pagination.currentPage++
                    this.loading.scroll = true
                    this.loadCheatsheets()
                }
            }
        }, 100, { 'leading': true }),
        openDialog () {
            if (this.data.languages.length === 0) {
                this.loadLanguages()
            }

            this.dialog.cheatsheet = {
                name: '',
                language: 0
            }

            this.dialog.errors = []

            let height = {
                visible: document.documentElement.clientHeight,
                scroll: document.documentElement.scrollTop
            }
            this.dialog.opened = true
            this.$emit('open-dialog')
            this.$nextTick(() => {
                $('.dashboard__dialog').css('top', `${height.visible / 2 + height.scroll}px`)
            })
        },
        closeDialog () {
            this.dialog.opened = false
            this.$emit('close-dialog')
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
        }
    },
    components: {
        icon: Icon
    }
}
</script>
