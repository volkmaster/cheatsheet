<style lang="scss" scoped>
@import '../../sass/app';
@import '~highlight.js/styles/ocean.css';

.cheatsheet {
    width            : 100%;
    height           : 100%;
    display          : flex;
    justify-content  : center;
    background-color : $pickled-bluewood;
}

.cheatsheet__loader {
    position : absolute;
    top      : 50%;
    width    : 100px;
    height   : 100px;
}

.cheatsheet__grid {
    position  : relative;
    display   : flex;
    flex-wrap : wrap;
}

.cheatsheet__grid--blur {
    filter         : blur(4px);
    pointer-events : none;
}

.cheatsheet__grid-item {
    padding     : 0 5px;
    position    : relative;
    width       : calc(100vw / 5);
    height      : calc(100vh / 3);
    display     : flex;
    align-items : flex-start;
    box-shadow  : 0 0 10px rgba(0, 0, 0, 0.75);
}

.cheatsheet__grid-item--fade {
    opacity        : 0.5;
    pointer-events : none;
}

.cheatsheet__plus {
    width      : 100%;
    height     : 100%;
    text-align : center;
    opacity    : 0.5;
    cursor     : pointer;
    transition : opacity 0.1s linear;
}

.cheatsheet__plus:hover { opacity: 1; }

.cheatsheet__plus::before {
    content     : '+';
    color       : $mariner;
    font-size   : 730px;
    font-family : $font-title;
    line-height : 730px;

    @include breakpoint-2560 {
        font-size   : 480px;
        line-height : 480px;
    }
    @include breakpoint-1920 {
        font-size   : 350px;
        line-height : 350px;
    }
    @include breakpoint-1680 {
        font-size   : 335px;
        line-height : 335px;
    }
    @include breakpoint-1440 {
        font-size   : 270px;
        line-height : 270px;
    }
    @include breakpoint-1280 {
        font-size   : 250px;
        line-height : 250px;
    }
}

.cheatsheet__grid-item-content {
    width           : 100%;
    height          : calc(100% - 150px);
    display         : flex;
    flex-direction  : column;
    transition      : filter 0.1s linear;

    @include breakpoint-2560 { height : calc(100% - 100px); }
    @include breakpoint-1920 { height : calc(100% - 65px);  }
    @include breakpoint-1680 { height : calc(100% - 60px);  }
    @include breakpoint-1440 { height : calc(100% - 45px);  }
    @include breakpoint-1280 { height : calc(100% - 35px);  }
}

.cheatsheet__grid-item:hover .cheatsheet__grid-item-content { filter: brightness(150%); }

.cheatsheet__grid-item-description {
    padding-top : 5px;
    color       : $cornflower;
    font-size   : 70px;
    font-family : $font-title;

    @include breakpoint-2560 { font-size : 48px; }
    @include breakpoint-1920 { font-size : 42px; }
    @include breakpoint-1680 { font-size : 38px; }
    @include breakpoint-1440 { font-size : 35px; }
    @include breakpoint-1280 { font-size : 32px; }
}

.cheatsheet__grid-item-code {
    margin      : 0;
    white-space : pre-wrap;
    overflow-y  : hidden;
}

// overriding highlight.js class
.hljs {
    margin    : -15px 0 2px 0;
    font-size : 20px;

    @include breakpoint-2560 { font-size : 16px; }
    @include breakpoint-1920 { font-size : 15px; }
    @include breakpoint-1680 { font-size : 14px; }
    @include breakpoint-1440 { font-size : 13px; }
    @include breakpoint-1280 { font-size : 12px; }
}

.cheatsheet__grid-item-command {
    position        : absolute;
    bottom          : 0;
    width           : 150px;
    height          : 150px;
    display         : flex;
    align-items     : center;
    justify-content : center;
    cursor          : pointer;

    @include breakpoint-2560 {
        width  : 100px;
        height : 100px;
    }
    @include breakpoint-1920 {
        width  : 65px;
        height : 65px;
    }
    @include breakpoint-1680 {
        width  : 60px;
        height : 60px;
    }
    @include breakpoint-1440 {
        width  : 45px;
        height : 45px;
    }
    @include breakpoint-1280 {
        width  : 40px;
        height : 40px;
    }
}

.cheatsheet__grid-item-command_edit {
    right: 150px;

    @include breakpoint-2560 { right : 100px; }
    @include breakpoint-1920 { right : 65px;  }
    @include breakpoint-1680 { right : 60px;  }
    @include breakpoint-1440 { right : 45px;  }
    @include breakpoint-1280 { right : 40px;  }
}

.cheatsheet__grid-item-command_remove { right: 0; }

.cheatsheet__grid-item-icon {
    width      : 75px;
    height     : 75px;
    color      : $mariner;
    opacity    : 0.5;
    transition : opacity 0.1s linear;

    @include breakpoint-2560 {
        width  : 50px;
        height : 50px;
    }
    @include breakpoint-1920 {
        width  : 40px;
        height : 40px;
    }
    @include breakpoint-1680 {
        width  : 35px;
        height : 35px;
    }
    @include breakpoint-1440 {
        width  : 25px;
        height : 25px;
    }
    @include breakpoint-1280 {
        width  : 23px;
        height : 23px;
    }
}

.cheatsheet__grid-item-command:hover .cheatsheet__grid-item-icon { opacity: 1; }

.cheatsheet__code-details {
    position   : absolute;
    box-shadow : 0 0 10px $porcelain;
    animation  : fade-in 0.1s linear 0s forwards;

    @keyframes fade-in {
        from { opacity : 0; }
        to   { opacity : 1; }
    }
}

.cheatsheet__code-details-code {
    margin   : 0;
    overflow : hidden;
}

.cheatsheet__dialog {
    position         : absolute;
    top              : 50%;
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

.cheatsheet__dialog_add, .cheatsheet__dialog_edit {
    width  : 1200px;
    height : 1000px;

    @include breakpoint-2560 {
        width  : 1000px;
        height : 800px;
    }
    @include breakpoint-1920 {
        width  : 800px;
        height : 600px;
    }
    @include breakpoint-1680 {
        width  : 700px;
        height : 600px;
    }
    @include breakpoint-1440 {
        width  : 600px;
        height : 500px;
    }
    @include breakpoint-1280 {
        width  : 550px;
        height : 450px;
    }
}

.cheatsheet__dialog_remove {
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

.cheatsheet__dialog-close-icon {
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

.cheatsheet__dialog-close-icon:hover { color: $mariner; }

.cheatsheet__dialog-title {
    color       : $cinnabar;
    font-size   : 60px;
    font-family : $font-title;

    @include breakpoint-2560 { font-size : 50px; }
    @include breakpoint-1920 { font-size : 40px; }
    @include breakpoint-1680 { font-size : 35px; }
    @include breakpoint-1440 { font-size : 35px; }
    @include breakpoint-1280 { font-size : 32px; }
}

.cheatsheet__dialog-content { margin: 10px 0; }

.cheatsheet__dialog-content-row {
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

.cheatsheet__dialog-content-label { width: 25%; }

.cheatsheet__dialog-content-input {
    width            : 75%;
    padding          : 0 0 2px 4px;
    border-style     : solid;
    border-color     : $curious-blue;
    border-width     : 0 0 1px 0;
    background-color : transparent;
    outline          : 0;
    transition       : border-color 0.1s linear, color 0.1s linear;
}

.cheatsheet__dialog-content-input:hover, .cheatsheet__dialog-content-input:focus {
    border-color : $mariner;
    color        : $mariner;
}

.cheatsheet__dialog-content-select {
    width            : 75%;
    padding-bottom   : 2px;
    border-width     : 0 0 1px 0;
    border-color     : $curious-blue;
    outline          : 0;
    background-color : transparent;
    cursor           : pointer;
    transition       : border-color 0.1s linear, color 0.1s linear;
}

.cheatsheet__dialog-content-select:hover, .cheatsheet__dialog-content-input:focus {
    border-color : $mariner;
    color        : $mariner;
}

.cheatsheet__dialog-content-option {
    background-color : $porcelain;
    color            : $mariner;
}

.cheatsheet__dialog-content-textarea {
    width       : 100%;
    height      : 650px;
    font-family : monospace;
    font-size   : 20px;
    resize      : none;

    @include breakpoint-2560 {
        height    : 500px;
        font-size : 16px;
    }
    @include breakpoint-1920 {
        height    : 325px;
        font-size : 15px;
    }
    @include breakpoint-1680 {
        height    : 325px;
        font-size : 14px;
    }
    @include breakpoint-1440 {
        height    : 240px;
        font-size : 13px;
    }
    @include breakpoint-1280 {
        height    : 190px;
        font-size : 12px;
    }
}

.cheatsheet__dialog-content--font {
    color       : $curious-blue;
    font-size   : 23px;
    font-family : $font-light;

    @include breakpoint-2560 { font-size : 18px; }
    @include breakpoint-1920 { font-size : 17px; }
    @include breakpoint-1680 { font-size : 16px; }
    @include breakpoint-1440 { font-size : 15px; }
    @include breakpoint-1280 { font-size : 14px; }
}

.cheatsheet__dialog-error-wrapper {
    position        : absolute;
    bottom          : 20px;
    left            : 20px;
    margin-top      : 3px;
    display         : flex;
    justify-content : flex-end;
    flex-direction  : column;
}

.cheatsheet__dialog-error {
    color      : $cinnabar;
    font-style : italic;
    font-size  : 20px;

    @include breakpoint-2560 { font-size : 16px; }
    @include breakpoint-1920 { font-size : 15px; }
    @include breakpoint-1680 { font-size : 14px; }
    @include breakpoint-1440 { font-size : 13px; }
    @include breakpoint-1280 { font-size : 12px; }
}

.cheatsheet__dialog-button-wrapper {
    position : absolute;
    bottom   : 20px;
    right    : 20px;
    display  : flex;
}

.cheatsheet__dialog-button {
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

.cheatsheet__dialog-button_save {
    margin-right     : 10px;
    background-color : $green;
}

.cheatsheet__dialog-button_save:hover { filter: brightness(90%); }

.cheatsheet__dialog-button_remove {
    margin-right     : 10px;
    background-color : $curious-blue;
}

.cheatsheet__dialog-button_remove:hover { background-color: $mariner; }

.cheatsheet__dialog-button_cancel { background-color: $cinnabar; }

.cheatsheet__dialog-button_cancel:hover { filter: brightness(90%); }
</style>

<template>
    <div class="cheatsheet">
        <!-- loader -->
        <img class="cheatsheet__loader" src="/images/loader.svg" v-show="loading"/>

        <!-- grid -->
        <div class="cheatsheet__grid" :class="{ 'cheatsheet__grid--blur': dialog.opened.add || dialog.opened.edit || dialog.opened.remove }" v-show="!loading">
            <div class="cheatsheet__grid-item" :class="{ 'cheatsheet__grid-item--fade': codeDetails.opened }" v-for="(item, position) in data.knowledgePieces" @mouseenter="item.active = true" @mouseleave="item.active = false">
                <template v-if="item.taken">
                    <div class="cheatsheet__grid-item-content">
                        <div class="cheatsheet__grid-item-description">
                            {{ item.data.description }}
                        </div>
                        <pre class="cheatsheet__grid-item-code" v-highlightjs="item.data.code" @mouseenter="codeMouseEnter($event, item.data)" @mouseleave="codeMouseLeave">
                            <code :class="item.data.language.highlight"></code>
                        </pre>
                    </div>
                    <template v-if="item.active">
                        <div class="cheatsheet__grid-item-command cheatsheet__grid-item-command_edit">
                            <icon class="cheatsheet__grid-item-icon" name="pencil" @click.native="openEditDialog(item.data)"></icon>
                        </div>
                        <div class="cheatsheet__grid-item-command cheatsheet__grid-item-command_remove">
                            <icon class="cheatsheet__grid-item-icon" name="remove" @click.native="openRemoveDialog(item.data)"></icon>
                        </div>
                    </template>
                </template>
                <div class="cheatsheet__plus" v-else @click="openAddDialog(position)"></div>
            </div>
        </div>

        <!-- code details -->
        <div class="cheatsheet__code-details" v-if="codeDetails.opened" @mouseenter="codeDetailsMouseEnter" @mouseleave="codeDetailsMouseLeave">
            <pre class="cheatsheet__code-details-code" v-highlightjs="codeDetails.knowledgePiece.code">
                <code :class="codeDetails.knowledgePiece.language.highlight"></code>
            </pre>
        </div>

        <!-- dialog add -->
        <div class="cheatsheet__dialog cheatsheet__dialog_add" v-if="dialog.opened.add">
            <icon class="cheatsheet__dialog-close-icon" name="close" @click.native="closeDialog"></icon>
            <div class="cheatsheet__dialog-title">{{ dialog.title.add | uppercase }}</div>
            <div class="cheatsheet__dialog-content">
                <div class="cheatsheet__dialog-content-row">
                    <div class="cheatsheet__dialog-content-label cheatsheet__dialog-content--font">Description: </div>
                    <input class="cheatsheet__dialog-content-input cheatsheet__dialog-content--font" type="text" v-model="dialog.knowledgePiece.description"/>
                </div>
                <div class="cheatsheet__dialog-content-row">
                    <div class="cheatsheet__dialog-content-label cheatsheet__dialog-content--font">Language: </div>
                    <select class="cheatsheet__dialog-content-select cheatsheet__dialog-content--font" v-model="dialog.knowledgePiece.language">
                        <option class="cheatsheet__dialog-content-option cheatsheet__dialog-content--font" v-for="language in data.languages" :value="language.id">
                            {{ language.name }}
                        </option>
                    </select>
                </div>
                <textarea class="cheatsheet__dialog-content-textarea" v-model="dialog.knowledgePiece.code" @paste="paste" @keydown.enter.exact="enter" @keydown.tab.exact="tab" @keydown.shift.tab.exact="untab"></textarea>
            </div>
            <div class="cheatsheet__dialog-error-wrapper">
                <div class="cheatsheet__dialog-error" v-for="error in dialog.errors">
                    {{ error }}
                </div>
            </div>
            <div class="cheatsheet__dialog-button-wrapper">
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_save" @click="createNewKnowledgePiece">{{ dialog.buttonText.save | uppercase }}</div>
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_cancel" @click="closeDialog">{{ dialog.buttonText.cancel | uppercase }}</div>
            </div>
        </div>

        <!-- dialog edit -->
        <div class="cheatsheet__dialog cheatsheet__dialog_edit" v-if="dialog.opened.edit">
            <icon class="cheatsheet__dialog-close-icon" name="close" @click.native="closeDialog"></icon>
            <div class="cheatsheet__dialog-title">{{ dialog.title.edit | uppercase }}</div>
            <div class="cheatsheet__dialog-content">
                <div class="cheatsheet__dialog-content-row">
                    <div class="cheatsheet__dialog-content-label cheatsheet__dialog-content--font">Description: </div>
                    <input class="cheatsheet__dialog-content-input cheatsheet__dialog-content--font" type="text" v-model="dialog.knowledgePiece.description"/>
                </div>
                <div class="cheatsheet__dialog-content-row">
                    <div class="cheatsheet__dialog-content-label cheatsheet__dialog-content--font">Language: </div>
                    <select class="cheatsheet__dialog-content-select cheatsheet__dialog-content--font" v-model="dialog.knowledgePiece.language">
                        <option class="cheatsheet__dialog-content-option cheatsheet__dialog-content--font" v-for="language in data.languages" :value="language.id">
                            {{ language.name }}
                        </option>
                    </select>
                </div>
                <textarea class="cheatsheet__dialog-content-textarea" v-model="dialog.knowledgePiece.code" @paste="paste" @keydown.enter.exact="enter" @keydown.tab.exact="tab" @keydown.shift.tab.exact="untab"></textarea>
            </div>
            <div class="cheatsheet__dialog-error-wrapper">
                <div class="cheatsheet__dialog-error" v-for="error in dialog.errors">
                    {{ error }}
                </div>
            </div>
            <div class="cheatsheet__dialog-button-wrapper">
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_save" @click="updateExistingKnowledgePiece">{{ dialog.buttonText.save | uppercase }}</div>
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_cancel" @click="closeDialog">{{ dialog.buttonText.cancel | uppercase }}</div>
            </div>
        </div>

        <!-- dialog remove -->
        <div class="cheatsheet__dialog cheatsheet__dialog_remove" v-if="dialog.opened.remove">
            <icon class="cheatsheet__dialog-close-icon" name="close" @click.native="closeDialog"></icon>
            <div class="cheatsheet__dialog-title">{{ dialog.title.remove | uppercase }}</div>
            <div class="cheatsheet__dialog-content">
                <div class="cheatsheet__dialog-content-row">
                    <div class="cheatsheet__dialog-content-text cheatsheet__dialog-content--font">{{ dialog.text.remove }}</div>
                </div>
            </div>
            <div class="cheatsheet__dialog-error-wrapper">
                <div class="cheatsheet__dialog-error" v-for="error in dialog.errors">
                    {{ error }}
                </div>
            </div>
            <div class="cheatsheet__dialog-button-wrapper">
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_remove" @click="removeExistingKnowledgePiece">{{ dialog.buttonText.remove | uppercase }}</div>
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_cancel" @click="closeDialog">{{ dialog.buttonText.cancel | uppercase }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import Icon from 'vue-awesome/components/Icon'
import VueClipboard from 'vue-clipboard2'

Vue.use(VueClipboard)

export default {
    data () {
        return {
            loading: false,
            data: {
                cheatsheet: null,
                knowledgePieces: [],
                languages: []
            },
            pagination: {
                perPage: 15,
                currentPage: 1
            },
            order: {
                by: 'updated_at',
                direction: 'desc'
            },
            codeDetails: {
                opened: false,
                timeout: null,
                delay: 0,
                knowledgePiece: null
            },
            dialog: {
                opened: {
                    add: false,
                    edit: false,
                    remove: false
                },
                title: {
                    add: 'add knowledge piece',
                    edit: 'edit knowledge piece',
                    remove: 'remove knowledge piece'
                },
                text: {
                    add: '',
                    edit: '',
                    remove: 'Do you really want to remove the selected knowledge piece from the cheatsheet?'
                },
                buttonText: {
                    save: 'save',
                    add: 'add',
                    remove: 'remove',
                    cancel: 'cancel'
                },
                knowledgePiece: null,
                errors: []
            },
            TAB: '    '
        }
    },
    created () {
        this.loading = true
        this.loadCheatsheetAndKnowledgePieces()
        window.addEventListener('keyup', this.handleKeyup)
    },
    methods: {
        loadCheatsheetAndKnowledgePieces () {
            let params = {
                page: this.pagination.currentPage,
                per_page: this.pagination.perPage,
                order_by: this.order.by,
                order_direction: this.order.direction
            }

            axios.all([
                axios.get('/api/cheatsheets/' + this.$route.params.id),
                axios.get('/api/cheatsheets/' + this.$route.params.id + '/knowledgepieces', { params: params })
            ])
            .then(axios.spread((cheatsheet, knowledgePieces) => {
                this.setCheatsheet(cheatsheet.data)
                this.setKnowledgePieces(knowledgePieces.data)
                this.loading = false
            }))
            .catch(error => console.log(error))
        },
        mapCheatsheet (cheatsheet) {
            return { id: cheatsheet.id, name: cheatsheet.name, language: cheatsheet.language.id, knowledgePieces: cheatsheet.knowledge_piece_ids ? cheatsheet.knowledge_piece_ids : [] }
        },
        setCheatsheet (cheatsheet) {
            this.data.cheatsheet = this.mapCheatsheet(cheatsheet)
        },
        mapKnowledgePiece (knowledgePiece) {
            return { id: knowledgePiece.id, description: knowledgePiece.description, code: knowledgePiece.code, language: knowledgePiece.language.id, position: knowledgePiece.pivot.position }
        },
        setKnowledgePieces (knowledgePieces) {
            let data = knowledgePieces.data.map(knowledgePiece => this.mapKnowledgePiece(knowledgePiece))

            let sortedData = []
            for (let i = 0; i < data.length; i++) {
                let knowledgePiece = data[i]
                if (knowledgePiece) {
                    sortedData[knowledgePiece.position] = { data: knowledgePiece, taken: true, active: false }
                }
            }

            for (let i = 0; i < 15; i++) {
                if (!sortedData[i]) {
                    sortedData[i] = { data: null, taken: false, active: false }
                }
            }

            this.data.knowledgePieces = sortedData
        },
        loadLanguages (languageId) {
            let params = {
                per_page: 0
            }

            axios.get('/api/languages', { params: params })
                .then(response => {
                    let data = response.data
                    this.setLanguages(data)
                    this.dialog.knowledgePiece.language = languageId
                })
                .catch(error => console.log(error))
        },
        mapLanguage (language) {
            return { id: language.id, name: language.name, image: language.image }
        },
        setLanguages (languages) {
            this.data.languages = languages.map(language => this.mapLanguage(language))
        },
        codeMouseEnter (event, knowledgePiece) {
            this.codeDetails.timeout = setTimeout(() => this.openCodeDetails(event, knowledgePiece), this.codeDetails.delay)
        },
        codeMouseLeave () {
            clearTimeout(this.codeDetails.timeout)
        },
        codeDetailsMouseEnter () {
            window.addEventListener('keyup', this.handleKeyupCodeDetails)
        },
        codeDetailsMouseLeave () {
            window.removeEventListener('keyup', this.handleKeyupCodeDetails)
            this.closeCodeDetails()
        },
        handleKeyupCodeDetails: function (event) {
            if (event.keyCode === 67 && event.altKey) {
                this.copyKnowledgePieceCodeToClipboard()
            }
        },
        copyKnowledgePieceCodeToClipboard: function (event) {
            this.$copyText(this.codeDetails.knowledgePiece.code)
        },
        openCodeDetails (event, knowledgePiece) {
            let pre = event.target
            let code = pre.children[0]

            let preRect = pre.getBoundingClientRect()
            let codeRect = code.getBoundingClientRect()

            if (codeRect.bottom > preRect.bottom) {
                this.codeDetails.knowledgePiece = knowledgePiece
                this.codeDetails.opened = true

                this.$nextTick(() => {
                    let codeDetails = $(this.$el.querySelector('.cheatsheet__code-details'))
                    let pre = codeDetails.find('pre')
                    let code = codeDetails.find('code')

                    let height = code.height()
                    let marginTop = this.extractPixels(code.css('marginTop'))

                    codeDetails.offset({ top: codeRect.top, left: codeRect.left })
                    codeDetails.height(height - marginTop)

                    pre.height(height - marginTop)

                    let screenWidth = document.documentElement.clientWidth
                    let screenHeight = document.documentElement.clientHeight
                    let boxWidth = codeDetails.width()
                    let boxHeight = codeDetails.height()
                    let left = codeDetails.offset().left
                    let top = codeDetails.offset().top
                    let horizontalDiff = (left + boxWidth) - (screenWidth - 20)
                    let verticalDiff = (top + boxHeight) - (screenHeight - 20)

                    codeDetails.offset({ left: horizontalDiff > 0 ? left - horizontalDiff : left, top: verticalDiff > 0 ? top - verticalDiff : top })

                    if (codeDetails.width() < preRect.width) {
                        codeDetails.width(preRect.width)
                    }
                })
            }
        },
        closeCodeDetails () {
            this.codeDetails.knowledgePiece = null
            this.codeDetails.opened = false
        },
        handleKeyup: function (event) {
            if (event.keyCode === 65 && event.altKey) {
                let newKnowledgePiecePosition = this.getFirstFreeKnowledgepiecePosition()
                if (newKnowledgePiecePosition != null) {
                    this.openAddDialog(newKnowledgePiecePosition)
                }
            }
        },
        getFirstFreeKnowledgepiecePosition () {
            for (var i = 0; i < this.data.knowledgePieces.length; i++) {
                if (this.data.knowledgePieces[i].data === null) {
                    return i
                }
            }
            return null
        },
        openAddDialog (position) {
            let knowledgePiece = {
                description: '',
                code: '',
                language: this.data.cheatsheet.language,
                position: position
            }
            this.dialog.knowledgePiece = this.copyObject(knowledgePiece)
            if (this.data.languages.length === 0) {
                this.loadLanguages(knowledgePiece.language)
            } else {
                this.dialog.knowledgePiece.language = knowledgePiece.language
            }
            this.dialog.errors = []
            this.dialog.opened.add = true
            window.addEventListener('keyup', this.handleKeyupCloseDialog)
        },
        openEditDialog (knowledgePiece) {
            this.dialog.knowledgePiece = this.copyObject(knowledgePiece)
            if (this.data.languages.length === 0) {
                this.loadLanguages(knowledgePiece.language)
            } else {
                this.dialog.knowledgePiece.language = knowledgePiece.language
            }
            this.dialog.errors = []
            this.dialog.opened.edit = true
            window.addEventListener('keyup', this.handleKeyupCloseDialog)
        },
        openRemoveDialog (knowledgePiece) {
            this.dialog.knowledgePiece = this.copyObject(knowledgePiece)
            this.dialog.errors = []
            this.dialog.opened.remove = true
            window.addEventListener('keyup', this.handleKeyupCloseDialog)
        },
        handleKeyupCloseDialog: function (event) {
            if (event.keyCode === 27) {
                this.closeDialog()
                window.removeEventListener('keyup', this.handleKeyupCloseDialog)
            }
        },
        addExistingKnowledgePiece () {
            let cheatsheet = this.data.cheatsheet
            let knowledgePiece = this.copyObject(this.dialog.knowledgePiece)
            cheatsheet.knowledgePieces.push(knowledgePiece.id)

            axios.put('/api/cheatsheets/' + cheatsheet.id, { knowledge_pieces: cheatsheet.knowledgePieces })
                .then(response => {
                    // TODO: add and verify
                    let addedKnowledgePiece = this.data.knowledgePieces[knowledgePiece.position]
                    addedKnowledgePiece.data = this.mapKnowledgePiece(response.data)
                    addedKnowledgePiece.taken = true
                    addedKnowledgePiece.active = false
                    this.closeDialog()
                })
                .catch(error => {
                    this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                })
        },
        createNewKnowledgePiece () {
            let knowledgePiece = this.copyObject(this.dialog.knowledgePiece)
            knowledgePiece.cheatsheets = { [this.data.cheatsheet.id]: { 'position': knowledgePiece.position } }

            this.dialog.errors = []

            if (!knowledgePiece.code) {
                this.dialog.errors.push('Code is required.')
                return
            }

            if (this.dialog.errors.length === 0) {
                axios.post('/api/knowledgepieces', knowledgePiece)
                    .then(response => {
                        let createdKnowledgePiece = this.data.knowledgePieces[knowledgePiece.position]
                        createdKnowledgePiece.data = this.mapKnowledgePiece(response.data)
                        createdKnowledgePiece.taken = true
                        createdKnowledgePiece.active = false
                        this.closeDialog()
                    })
                    .catch(error => {
                        this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                    })
            }
        },
        updateExistingKnowledgePiece () {
            let knowledgePiece = this.copyObject(this.dialog.knowledgePiece)

            this.dialog.errors = []

            if (!knowledgePiece.code) {
                this.dialog.errors.push('Code is required.')
                return
            }

            axios.put('/api/knowledgepieces/' + knowledgePiece.id, knowledgePiece)
                .then(response => {
                    let editedKnowledgePiece = this.data.knowledgePieces[knowledgePiece.position]
                    editedKnowledgePiece.data = knowledgePiece
                    this.closeDialog()
                })
                .catch(error => {
                    this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                })
        },
        removeExistingKnowledgePiece () {
            let cheatsheet = this.data.cheatsheet
            let knowledgePiece = this.copyObject(this.dialog.knowledgePiece)

            let index = cheatsheet.knowledgePieces.indexOf(knowledgePiece.id)
            cheatsheet.knowledgePieces.splice(index, 1)

            axios.put('/api/cheatsheets/' + cheatsheet.id, { knowledge_pieces: cheatsheet.knowledgePieces })
                .then(response => {
                    let removedKnowledgePiece = this.data.knowledgePieces[knowledgePiece.position]
                    removedKnowledgePiece.data = null
                    removedKnowledgePiece.taken = false
                    this.closeDialog()
                })
                .catch(error => {
                    this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                })
        },
        closeDialog () {
            this.dialog.opened.add = false
            this.dialog.opened.edit = false
            this.dialog.opened.remove = false
        },
        setCaretPosition (el, start, end) {
            el.selectionStart = start
            el.selectionEnd = end
            el.blur()
            el.focus()
        },
        paste (e) {
            e.preventDefault()

            let text = this.dialog.knowledgePiece.code

            let el = e.target

            let start = el.selectionStart
            let end = el.selectionEnd

            let lines = text.split('\n')
            let startLineTabs = 0
            let sum = 0
            for (let i = 0; i < lines.length; i++) {
                sum += lines[i].length + 1
                if (sum > start) {
                    let spacesAvailable = lines[i].search(/\S/)
                    let n = spacesAvailable === -1 ? lines[i].length : spacesAvailable
                    startLineTabs = Math.ceil(n / this.TAB.length)
                    if (spacesAvailable >= 0 && sum - lines[i].length - 1 !== start) {
                        startLineTabs++
                    }
                    break
                }
            }

            let pastedLines = e.clipboardData.getData('Text').split('\n')
            let pastedLineSpaces = pastedLines.map(x => x.search(/\S/))
            let n = Number.MAX_SAFE_INTEGER
            for (let i = 1; i < pastedLineSpaces.length; i++) {
                if (pastedLineSpaces[i] >= 0 && pastedLineSpaces[i] < n) {
                    n = pastedLineSpaces[i]
                }
            }
            for (let i = 1; i < pastedLines.length; i++) {
                pastedLines[i] = this.TAB.repeat(startLineTabs) + pastedLines[i].substring(n)
            }
            let pastedText = pastedLines.join('\n')
            let charactersAdded = pastedText.length

            this.dialog.knowledgePiece.code = text.substring(0, start) + pastedText + text.substring(end)

            this.$nextTick(() => {
                this.setCaretPosition(el, start + charactersAdded, start + charactersAdded)
            })
        },
        enter (e) {
            e.preventDefault()

            let text = this.dialog.knowledgePiece.code

            let el = e.target

            let start = el.selectionStart
            let end = el.selectionEnd

            let lines = text.split('\n')

            let spacesAdded = []

            let sum = 0
            for (let i = 0; i < lines.length; i++) {
                sum += lines[i].length + 1
                if (sum >= start) {
                    let spacesAvailable = lines[i].search(/\S/)
                    let n = spacesAvailable === -1 ? lines[i].length : spacesAvailable
                    spacesAdded.push(n)
                    lines.splice(i + 1, 0, ' '.repeat(n))
                    break
                }
            }
            this.dialog.knowledgePiece.code = lines.join('\n')

            this.$nextTick(() => {
                this.setCaretPosition(el, start + spacesAdded[0] + 1, end + spacesAdded[0] + 1)
            })
        },
        tab (e) {
            e.preventDefault()

            let text = this.dialog.knowledgePiece.code

            let el = e.target

            let start = el.selectionStart
            let end = el.selectionEnd

            let lines = text.split('\n')
            let selectedLines = text.substring(start, end).split('\n')

            let spacesAdded = []

            if (selectedLines.length > 1) {
                let sum = 0
                for (let i = 0; i < lines.length; i++) {
                    sum += lines[i].length + 1
                    if (sum >= start) {
                        let n = this.TAB.length
                        spacesAdded.push(n)
                        lines[i] = this.TAB + lines[i]
                    }
                    if (end < sum) {
                        break
                    }
                }
                this.dialog.knowledgePiece.code = lines.join('\n')
            } else {
                let n = this.TAB.length
                spacesAdded.push(n)
                this.dialog.knowledgePiece.code = text.substring(0, start) + this.TAB + text.substring(end)
            }

            this.$nextTick(() => {
                if (selectedLines.length > 1) {
                    this.setCaretPosition(el, start + spacesAdded[0], end + spacesAdded.reduce((a, b) => a + b, 0))
                } else {
                    this.setCaretPosition(el, start + spacesAdded[0], start + spacesAdded[0])
                }
            })
        },
        untab (e) {
            e.preventDefault()

            let text = this.dialog.knowledgePiece.code

            let el = e.target

            let start = el.selectionStart
            let end = el.selectionEnd

            let lines = text.split('\n')
            let selectedLines = text.substring(start, end).split('\n')

            let spacesRemoved = []

            if (selectedLines.length > 1) {
                let sum = 0
                for (let i = 0; i < lines.length; i++) {
                    sum += lines[i].length + 1
                    if (sum >= start) {
                        let spacesAvailable = lines[i].search(/\S/)
                        let n = spacesAvailable < this.TAB.length ? spacesAvailable : this.TAB.length
                        spacesRemoved.push(n)
                        lines[i] = lines[i].substring(n)
                    }
                    if (end < sum) {
                        break
                    }
                }
                this.dialog.knowledgePiece.code = lines.join('\n')
            } else if (start === end) {
                let sum = 0
                for (let i = 0; i < lines.length; i++) {
                    let spacesAvailable = lines[i].search(/\S/)
                    let n = spacesAvailable === -1 ? lines[i].length : spacesAvailable
                    if (start >= sum && start <= sum + n) {
                        n = n < this.TAB.length ? n : this.TAB.length
                        spacesRemoved.push(n)
                        lines[i] = lines[i].substring(n)
                        break
                    }
                    sum += lines[i].length + 1
                }
                this.dialog.knowledgePiece.code = lines.join('\n')
            }

            this.$nextTick(() => {
                if (selectedLines.length > 1) {
                    this.setCaretPosition(el, start - spacesRemoved[0], end - spacesRemoved.reduce((a, b) => a + b, 0))
                } else {
                    this.setCaretPosition(el, start - spacesRemoved[0], end - spacesRemoved[0])
                }
            })
        },
        copyObject (obj) {
            return JSON.parse(JSON.stringify(obj))
        },
        extractPixels (value) {
            return parseInt(value.replace('px', ''))
        }
    },
    components: {
        icon: Icon
    }
}
</script>
