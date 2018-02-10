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
    top      : 50%;
    width    : 100px;
    height   : 100px;
}

.dashboard__loader-scroll {
    position       : absolute;
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
    transition       : background-color 0.2s linear;

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

.dashboard__grid-item:hover, .dashboard__grid-item--active { background-color: $spindle; }

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
    top      : 60%;
    left     : 10px;
    color    : $mariner;
}

.dashboard__grid-item:hover .dashboard__grid-item-description { color: $pickled-bluewood; }

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
    top             : 60%;
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

.dashboard__grid-item-command {
    position        : absolute;
    bottom          : 0;
    width           : 80px;
    height          : 80px;
    display         : flex;
    align-items     : center;
    justify-content : center;
    cursor          : pointer;

    @include breakpoint-2560 {
        width  : 60px;
        height : 60px;
    }
    @include breakpoint-1920 {
        width  : 45px;
        height : 45px;
    }
    @include breakpoint-1680 {
        width  : 40px;
        height : 40px;
    }
    @include breakpoint-1440 {
        width  : 40px;
        height : 40px;
    }
    @include breakpoint-1280 {
        width  : 40px;
        height : 40px;
    }
}

.dashboard__grid-item-command_edit {
    right: 80px;

    @include breakpoint-2560 { right : 60px; }
    @include breakpoint-1920 { right : 45px;  }
    @include breakpoint-1680 { right : 40px;  }
    @include breakpoint-1440 { right : 40px;  }
    @include breakpoint-1280 { right : 40px;  }
}

.dashboard__grid-item-command_remove { right: 0; }

.dashboard__grid-item-icon {
    width      : 40px;
    height     : 40px;
    color      : $pickled-bluewood;
    opacity    : 0.5;
    transition : opacity 0.1s linear;

    @include breakpoint-2560 {
        width  : 35px;
        height : 35px;
    }
    @include breakpoint-1920 {
        width  : 25px;
        height : 25px;
    }
    @include breakpoint-1680 {
        width  : 22px;
        height : 22px;
    }
    @include breakpoint-1440 {
        width  : 22px;
        height : 22px;
    }
    @include breakpoint-1280 {
        width  : 22px;
        height : 22px;
    }
}

.dashboard__grid-item-command:hover .dashboard__grid-item-icon { opacity: 1; }

.dashboard__dialog {
    position         : absolute;
    left             : 50%;
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
}

.dashboard__dialog_add, .dashboard__dialog_edit {
    width  : 650px;
    height : 350px;

    @include breakpoint-2560 {
        width  : 600px;
        height : 275px;
    }
    @include breakpoint-1920 {
        width  : 500px;
        height : 275px;
    }
    @include breakpoint-1680 {
        width  : 500px;
        height : 275px;
    }
    @include breakpoint-1440 {
        width  : 500px;
        height : 275px;
    }
    @include breakpoint-1280 {
        width  : 500px;
        height : 275px;
    }
}

.dashboard__dialog_remove {
    width  : 600px;
    height : 290px;

    @include breakpoint-2560 {
        width  : 500px;
        height : 260px;
    }
    @include breakpoint-1920 {
        width  : 475px;
        height : 250px;
    }
    @include breakpoint-1680 {
        width  : 450px;
        height : 235px;
    }
    @include breakpoint-1440 {
        width  : 425px;
        height : 230px;
    }
    @include breakpoint-1280 {
        width  : 400px;
        height : 225px;
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

.cheatsheet__dialog-content-text {
    width       : 100%;
    line-height : 25px;
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
    cursor           : pointer;
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
    transition       : background-color 0.1s linear, filter 0.1s linear;

    @include breakpoint-2560 { font-size : 16px; }
    @include breakpoint-1920 { font-size : 15px; }
    @include breakpoint-1680 { font-size : 14px; }
    @include breakpoint-1440 { font-size : 13px; }
    @include breakpoint-1280 { font-size : 12px; }
}

.dashboard__dialog-button_save {
    margin-right     : 10px;
    background-color : $green;
}

.dashboard__dialog-button_save:hover { filter: brightness(90%); }

.dashboard__dialog-button_edit, .dashboard__dialog-button_remove {
    margin-right     : 10px;
    background-color : $curious-blue;
}

.dashboard__dialog-button_edit:hover, .dashboard__dialog-button_remove:hover { background-color: $mariner; }

.dashboard__dialog-button_cancel { background-color: $cinnabar; }

.dashboard__dialog-button_cancel:hover { filter: brightness(90%); }

.dashboard__filter {
    position         : absolute;
    top              : 40px;
    display          : flex;
    align-items      : center;
    justify-content  : center;
    background-color : $porcelain;
    color            : $pickled-bluewood;

    // top              : 80px;

    // @include breakpoint-2560 { top : 60px; }
    // @include breakpoint-1920 { top : 50px; }
    // @include breakpoint-1680 { top : 40px; }
    // @include breakpoint-1440 { top : 40px; }
    // @include breakpoint-1280 { top : 40px; }
}

.dashboard__filter_collapsed {
    left             : 0;
    // width            : 145px;
    width: 200px;
    height           : 36px;
    padding          : 5px 20px 7px 20px;
    transform        : rotate(-90deg) translateX(-100%);
    transform-origin : 0% 0%;
    z-index          : 1;
    font-size        : 20px;
    cursor           : pointer;
    transition: transform 1s linear, width 1s linear;
}

.dashboard__filter_expanded {
    left      : -164px;
    width     : 200px;
    height    : 145px; // half of grid-item height
    animation : slide-in 1s linear 0s forwards;

    @keyframes slide-in {
        to { left: 36px; }
    }
}

.dashboard__filter-input {
    width: 100%;
    padding          : 0 0 2px 4px;
    border-style     : solid;
    border-color     : $curious-blue;
    border-width     : 0 0 1px 0;
    background-color : transparent;
    color            : $curious-blue;
    font-size        : 14px;
    outline          : 0;
    transition       : border-color 0.1s linear, color 0.1s linear;
}
.dashboard__filter-input:hover, .dashboard__filter-input:focus {
    border-color : $mariner;
    color        : $mariner;
}

.x {
    width: 300px;
    padding: 0 5px;
    box-shadow       : 5px 5px 3px rgba(0, 0, 0, 0.3);
    transform        : rotate(0deg);
}
</style>

<template>
    <div class="dashboard">
        <!-- loader -->
        <img class="dashboard__loader-initial" src="/images/loader.svg" v-show="loading.initial"/>

        <!-- grid -->
        <div class="dashboard__grid" :class="{ 'dashboard__grid--blur': dialog.opened.add || dialog.opened.edit || dialog.opened.remove }" v-show="!loading.initial">
            <div class="dashboard__grid-item" :class="{ 'dashboard__grid-item--active': dialog.opened.add }" @click="openAddDialog">
                <div class="dashboard__plus"></div>
            </div>
            <div class="dashboard__grid-item" :class="{ 'dashboard__grid-item--active': item.active }" v-for="(item, position) in data.cheatsheets" @click="navigateToCheatsheetPage(item.data.id)" @mouseenter="item.active = true" @mouseleave="item.active = false">
                <div class="dashboard__grid-item-title">
                    {{ item.data.name }}
                </div>
                <div class="dashboard__grid-item-description">
                    <div class="dashboard__grid-item-number">
                        {{ item.data.count }}
                    </div>
                    <div class="dashboard__grid-item-text">
                        knowledge pieces
                    </div>
                </div>
                <div class="dashboard__grid-item-language">
                    <img class="dashboard__grid-item-image" :src="item.data.language.image">
                </div>
                <template v-if="item.active">
                    <div class="dashboard__grid-item-command dashboard__grid-item-command_edit">
                        <icon class="dashboard__grid-item-icon" name="pencil" @click.native="openEditDialog($event, item.data, position); item.active = true"></icon>
                    </div>
                    <div class="dashboard__grid-item-command dashboard__grid-item-command_remove">
                        <icon class="dashboard__grid-item-icon" name="remove" @click.native="openRemoveDialog($event, item.data); item.active = true"></icon>
                    </div>
                </template>
            </div>
            <div class="dashboard__grid-item dashboard__grid-item--placeholder" v-for="n in 7"></div>
            <img class="dashboard__loader-scroll" src="/images/loader.svg" v-show="loading.scroll"/>
        </div>

        <!-- filter -->
        <div class="dashboard__filter dashboard__filter_collapsed" @click="filter.opened = true" :class="{ 'x': filter.opened }">
            <div v-if="!filter.opened">FILTER</div>
            <input class="dashboard__filter-input" type="text" v-model="filter.query" :placeholder="filter.placeholder" @keyup.enter.exact="filter.opened = false" v-else autofocus/>
        </div>
        <!-- <div class="dashboard__filter dashboard__filter_expanded" v-if="filter.opened">
            <input class="dashboard__filter-input" type="text" v-model="filter.query"/>
            <div style="width: 20px; height: 20px; background-color: black;" @click="filter.opened = false"></div>
        </div> -->

        <!-- dialog add -->
        <div class="dashboard__dialog dashboard__dialog_add" v-if="dialog.opened.add">
            <icon class="dashboard__dialog-close-icon" name="close" @click.native="closeDialog"></icon>
            <div class="dashboard__dialog-title">{{ dialog.title.add | uppercase }}</div>
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
                <div class="dashboard__dialog-button dashboard__dialog-button_save" @click="createNewCheatsheet(false)">{{ dialog.buttonText.save | uppercase }}</div>
                <div class="dashboard__dialog-button dashboard__dialog-button_edit" @click="createNewCheatsheet(true)">{{ dialog.buttonText.edit | uppercase }}</div>
                <div class="dashboard__dialog-button dashboard__dialog-button_cancel" @click="closeDialog">{{ dialog.buttonText.cancel | uppercase }}</div>
            </div>
        </div>

        <!-- dialog edit -->
        <div class="dashboard__dialog dashboard__dialog_edit" v-if="dialog.opened.edit">
            <icon class="dashboard__dialog-close-icon" name="close" @click.native="closeDialog"></icon>
            <div class="dashboard__dialog-title">{{ dialog.title.edit | uppercase }}</div>
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
                <div class="dashboard__dialog-button dashboard__dialog-button_save" @click="updateExistingCheatsheet">{{ dialog.buttonText.save | uppercase }}</div>
                <div class="dashboard__dialog-button dashboard__dialog-button_cancel" @click="closeDialog">{{ dialog.buttonText.cancel | uppercase }}</div>
            </div>
        </div>

        <!-- dialog remove -->
        <div class="dashboard__dialog dashboard__dialog_remove" v-if="dialog.opened.remove">
            <icon class="dashboard__dialog-close-icon" name="close" @click.native="closeDialog"></icon>
            <div class="dashboard__dialog-title">{{ dialog.title.remove | uppercase }}</div>
            <div class="dashboard__dialog-content">
                <div class="dashboard__dialog-content-row">
                    <div class="dashboard__dialog-content-text dashboard__dialog-content--font">{{ dialog.text.remove }}</div>
                </div>
            </div>
            <div class="dashboard__dialog-error-wrapper">
                <div class="dashboard__dialog-error" v-for="error in dialog.errors">
                    {{ error }}
                </div>
            </div>
            <div class="dashboard__dialog-button-wrapper">
                <div class="dashboard__dialog-button dashboard__dialog-button_remove" @click="removeExistingCheatsheet">{{ dialog.buttonText.remove | uppercase }}</div>
                <div class="dashboard__dialog-button dashboard__dialog-button_cancel" @click="closeDialog">{{ dialog.buttonText.cancel | uppercase }}</div>
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
                languages: []
            },
            filter: {
                opened: false,
                placeholder: 'Filter by name / language / content...',
                query: '',
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
                opened: {
                    add: false,
                    edit: false,
                    remove: false
                },
                title: {
                    add: 'new cheatsheet',
                    edit: 'edit cheatsheet',
                    remove: 'remove cheatsheet'
                },
                text: {
                    add: '',
                    edit: '',
                    remove: ''
                },
                buttonText: {
                    save: 'save',
                    edit: 'edit',
                    remove: 'remove',
                    cancel: 'cancel'
                },
                cheatsheet: null,
                errors: []
            }
        }
    },
    created () {
        this.setInitialPerPageCount()
        this.loading.initial = true
        this.loadCheatsheets()
        this.pagination.perPage++
    },
    mounted () {
        this.$nextTick(() => {
            window.addEventListener('scroll', this.handleScroll)
        })
        window.addEventListener('keyup', this.handleKeyup)
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll)
    },
    computed: { },
    methods: {
        setInitialPerPageCount () {
            let screenWidth = document.documentElement.clientWidth
            let screenHeight = document.documentElement.clientHeight
            let sizes = {
                3840: {
                    width: 416,
                    margin: 40
                },
                2560: {
                    width: 405,
                    margin: 30
                },
                1920: {
                    width: 300,
                    margin: 25
                },
                1680: {
                    width: 252,
                    margin: 20
                },
                1440: {
                    width: 290,
                    margin: 20
                },
                1280: {
                    width: 288,
                    margin: 20
                }
            }

            if (screenWidth > 2560) {
                this.pagination.perPage = this.calculateItemCount(screenWidth, screenHeight, sizes, 3840)
            } else if (screenWidth > 1920 && screenWidth <= 2560) {
                this.pagination.perPage = this.calculateItemCount(screenWidth, screenHeight, sizes, 2560)
            } else if (screenWidth > 1680 && screenWidth <= 1920) {
                this.pagination.perPage = this.calculateItemCount(screenWidth, screenHeight, sizes, 1920)
            } else if (screenWidth > 1440 && screenWidth <= 1680) {
                this.pagination.perPage = this.calculateItemCount(screenWidth, screenHeight, sizes, 1680)
            } else if (screenWidth > 1280 && screenWidth <= 1440) {
                this.pagination.perPage = this.calculateItemCount(screenWidth, screenHeight, sizes, 1440)
            } else {
                this.pagination.perPage = this.calculateItemCount(screenWidth, screenHeight, sizes, 1280)
            }
        },
        handleKeyup: function (event) {
            if (event.keyCode === 65 && event.altKey) {
                this.openAddDialog()
            }
        },
        calculateItemCount (width, height, sizes, size) {
            let itemSize = sizes[size].width + 2 * sizes[size].margin
            let nRow = Math.floor((width - 2 * sizes[size].margin) / itemSize)
            let nCol = Math.ceil((height - sizes[size].margin) / itemSize)
            return nRow * nCol - 1
        },
        loadCheatsheets () {
            let params = {
                page: this.pagination.currentPage,
                per_page: this.pagination.perPage,
                order_by: this.order.by,
                order_direction: this.order.direction
            }

            if (this.filter.query) {
                params.filter_name = encodeURIComponent(this.filter.query)
            }

            if (this.filter.language) {
                params.filter_language = this.filter.language
            }

            axios.get('/api/cheatsheets', { params: params })
                .then(response => {
                    let data = response.data
                    this.appendCheatsheets(data)
                    if (data.current_page === data.last_page) {
                        this.pagination.noMorePages = true
                    }
                    this.loading.initial = false
                    this.loading.scroll = false
                })
                .catch(error => console.log(error))
        },
        reloadCheatsheets () {
            this.data.cheatsheets = []
            this.pagination.perPage--
            this.pagination.currentPage = 1
            this.order.by = 'updated_at'
            this.order.direction = 'desc'
            this.loading.initial = true
            this.loadCheatsheets()
            this.pagination.perPage++
        },
        mapCheatsheet (cheatsheet) {
            return { id: cheatsheet.id, name: cheatsheet.name, language: cheatsheet.language, count: cheatsheet.knowledge_piece_ids.length }
        },
        appendCheatsheets (cheatsheets) {
            let data = cheatsheets.data.map(cheatsheet => {
                return { data: this.mapCheatsheet(cheatsheet), active: false }
            })
            this.data.cheatsheets.push.apply(this.data.cheatsheets, data)
        },
        loadLanguages (languageId) {
            let params = {
                per_page: 0
            }

            axios.get('/api/languages', { params: params })
                .then(response => {
                    let data = response.data
                    this.setLanguages(data)
                    this.dialog.cheatsheet.language = languageId === -1 ? this.data.languages[0].id : languageId
                })
                .catch(error => console.log(error))
        },
        mapLanguage (language) {
            return { id: language.id, name: language.name, image: language.image }
        },
        setLanguages (languages) {
            this.data.languages = languages.map(language => this.mapLanguage(language))
        },
        openAddDialog () {
            let cheatsheet = {
                name: '',
                language: -1
            }
            this.dialog.cheatsheet = this.copyObject(cheatsheet)
            if (this.data.languages.length === 0) {
                this.loadLanguages(cheatsheet.language)
            } else {
                this.dialog.cheatsheet.language = this.data.languages[0].id
            }
            this.dialog.errors = []
            this.openAndPositionDialog('add')
            window.addEventListener('keyup', this.handleKeyupCloseDialog)
            window.addEventListener('keyup', this.handleKeyupCreateNewCheatsheet)
        },
        openEditDialog (event, cheatsheet, position) {
            event.stopPropagation()

            this.dialog.cheatsheet = this.copyObject(cheatsheet)
            this.dialog.cheatsheet.position = position
            if (this.data.languages.length === 0) {
                this.loadLanguages(cheatsheet.language.id)
            } else {
                this.dialog.cheatsheet.language = cheatsheet.language.id
            }
            this.dialog.errors = []
            this.openAndPositionDialog('edit')
            window.addEventListener('keyup', this.handleKeyupCloseDialog)
            window.addEventListener('keyup', this.handleKeyupUpdateExistingCheatsheet)
        },
        openRemoveDialog (event, cheatsheet) {
            event.stopPropagation()

            this.dialog.cheatsheet = this.copyObject(cheatsheet)
            this.dialog.text.remove = `Do you really want to remove the '${cheatsheet.name}' cheatsheet?`
            this.dialog.errors = []
            this.openAndPositionDialog('remove')
            window.addEventListener('keyup', this.handleKeyupCloseDialog)
            window.addEventListener('keyup', this.handleKeyupRemoveExistingCheatsheet)
        },
        handleKeyupCloseDialog: function (event) {
            if (event.keyCode === 27) {
                this.closeDialog()
                window.removeEventListener('keyup', this.handleKeyupCloseDialog)
            }
        },
        handleKeyupCreateNewCheatsheet: function (event) {
            if (event.altKey && event.keyCode === 13) {
                this.createNewCheatsheet()
                window.removeEventListener('keyup', this.handleKeyupCreateNewCheatsheet)
            }
        },
        handleKeyupUpdateExistingCheatsheet: function (event) {
            if (event.altKey && event.keyCode === 13) {
                this.updateExistingCheatsheet()
                window.removeEventListener('keyup', this.handleKeyupUpdateExistingCheatsheet)
            }
        },
        handleKeyupRemoveExistingCheatsheet: function (event) {
            if (event.altKey && event.keyCode === 13) {
                this.removeExistingCheatsheet()
                window.removeEventListener('keyup', this.handleKeyupRemoveExistingCheatsheet)
            }
        },
        createNewCheatsheet (navigateToPage) {
            let cheatsheet = this.copyObject(this.dialog.cheatsheet)

            this.dialog.errors = []

            if (!cheatsheet.name) {
                this.dialog.errors.push('Name is required.')
                return
            }

            if (this.dialog.errors.length === 0) {
                axios.post('/api/cheatsheets', cheatsheet)
                    .then(response => {
                        let createdCheatsheet = response.data
                        this.reloadCheatsheets()
                        this.closeDialog()
                        if (navigateToPage) {
                            this.navigateToCheatsheetPage(createdCheatsheet.id)
                        }
                    })
                    .catch(error => {
                        this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                    })
            }
        },
        updateExistingCheatsheet () {
            let cheatsheet = this.copyObject(this.dialog.cheatsheet)

            this.dialog.errors = []

            if (!cheatsheet.name) {
                this.dialog.errors.push('Name is required.')
                return
            }

            axios.put('/api/cheatsheets/' + cheatsheet.id, cheatsheet)
                .then(response => {
                    let editedCheatsheet = this.data.cheatsheets[cheatsheet.position].data
                    editedCheatsheet.id = cheatsheet.id
                    editedCheatsheet.name = cheatsheet.name
                    editedCheatsheet.language = this.data.languages.filter(language => language.id === cheatsheet.language)[0]
                    this.closeDialog()
                })
                .catch(error => {
                    this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                })
        },
        removeExistingCheatsheet () {
            let cheatsheet = this.copyObject(this.dialog.cheatsheet)

            axios.delete('/api/cheatsheets/' + cheatsheet.id)
                .then(response => {
                    this.reloadCheatsheets()
                    this.closeDialog()
                })
                .catch(error => {
                    this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                })
        },
        navigateToCheatsheetPage (id) {
            this.$router.push({ name: 'cheatsheet', params: { id: id } })
        },
        openAndPositionDialog (which) {
            let height = {
                visible: document.documentElement.clientHeight,
                scroll: document.documentElement.scrollTop
            }
            this.dialog.opened[which] = true
            this.$emit('open-dialog')
            this.$nextTick(() => {
                let dialog = $(this.$el.querySelector('.dashboard__dialog'))
                dialog.css('top', `${height.visible / 2 + height.scroll}px`)
            })
        },
        closeDialog () {
            this.dialog.opened.add = false
            this.dialog.opened.edit = false
            this.dialog.opened.remove = false
            this.$emit('close-dialog')
        },
        search () {
            if (this.filter.query) {
                this.filter.isFiltered = true
                this.pagination.currentPage = 1
                this.loading.initial = true
                this.loadCheatsheets()
            }
        },
        clear () {
            if (this.filter.isFiltered) {
                this.filter.query = ''
                this.filter.isFiltered = false
                this.pagination.currentPage = 1
                this.loading.initial = true
                this.loadCheatsheets()
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
        copyObject (obj) {
            return JSON.parse(JSON.stringify(obj))
        }
    },
    components: {
        icon: Icon
    }
}
</script>
