<style lang="scss" scoped>
@import '../../sass/app';
//@import '~highlight.js/styles/atelier-plateau-dark.css';
//@import '~highlight.js/styles/darcula.css';
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
    top      : 40%;
    width    : 100px;
    height   : 100px;
}

.cheatsheet__grid {
    position        : relative;
    display   : flex;
    flex-wrap : wrap;
}

.cheatsheet__grid--blur {
    filter         : blur(4px);
    pointer-events : none;
}

.cheatsheet__grid-item {
    padding    : 0 5px;
    position   : relative;
    width      : calc(100vw / 5);
    height     : calc(100vh / 3);
    box-shadow : 0 0 10px rgba(0, 0, 0, 0.75);
}

.cheatsheet__grid-item-content {
    height     : 100%;
    transition : filter 0.1s linear;
}

.cheatsheet__grid-item:hover .cheatsheet__grid-item-content { filter: brightness(200%); }

.cheatsheet__grid-item-description {
    max-height  : 24%;
    padding-top : 5px;
    color       : $cornflower;
    font-size   : 40px;
    font-family : $font-title;
}

.cheatsheet__grid-item-code {
    max-height : 76%;
    margin     : 0;
    padding    : 0;
    overflow   : hidden;
}

.cheatsheet__grid-item-command {
    position         : absolute;
    bottom           : 12px;
    width            : 50px;
    height           : 50px;
    display          : flex;
    align-items      : center;
    justify-content  : center;
    cursor           : pointer;
}

.cheatsheet__grid-item-command_edit   { right : 62px; }
.cheatsheet__grid-item-command_remove { right : 12px; }

.cheatsheet__grid-item-icon {
    width      : 30px;
    height     : 30px;
    color      : $mariner;
    opacity    : 0.5;
    transition : opacity 0.1s linear;
}

.cheatsheet__grid-item-command:hover .cheatsheet__grid-item-icon { opacity: 1; }

.cheatsheet__dialog {
    position         : absolute;
    top              : 50%;
    left             : 50%;
    width            : 600px;
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

    @include breakpoint-2560 { width : 600px; }
    @include breakpoint-1920 { width : 500px; }
    @include breakpoint-1680 { width : 400px; }
    @include breakpoint-1440 { width : 400px; }
    @include breakpoint-1280 { width : 400px; }
}

.cheatsheet__dialog_edit {
    height : 500px;

    @include breakpoint-2560 { height : 500px; }
    @include breakpoint-1920 { height : 500px; }
    @include breakpoint-1680 { height : 500px; }
    @include breakpoint-1440 { height : 500px; }
    @include breakpoint-1280 { height : 500px; }
}

.cheatsheet__dialog_remove {
    height : 350px;

    @include breakpoint-2560 { height : 275px; }
    @include breakpoint-1920 { height : 275px; }
    @include breakpoint-1680 { height : 275px; }
    @include breakpoint-1440 { height : 275px; }
    @include breakpoint-1280 { height : 275px; }
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

.cheatsheet__dialog-content-textarea {
    width       : 100%;
    height      : 275px;
    font-family : monospace;
    font-size   : 13px;
    resize      : none;
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
        <img class="cheatsheet__loader" src="/images/loader.svg" v-show="loading"/>
        <div class="cheatsheet__grid" :class="{ 'cheatsheet__grid--blur': dialog.opened.edit || dialog.opened.remove }" v-show="!loading">
            <div class="cheatsheet__grid-item" v-for="(item, position) in data.knowledgePieces" @mouseenter="item.active = true" @mouseleave="item.active = false">
                <template v-if="item.taken">
                    <div class="cheatsheet__grid-item-content">
                        <div class="cheatsheet__grid-item-description">
                            {{ item.data.description }}
                        </div>
                        <pre class="cheatsheet__grid-item-code" v-highlightjs="item.data.code">
                            <code :class="item.data.language.highlight"></code>
                        </pre>
                    </div>
                    <template v-if="item.active">
                        <div class="cheatsheet__grid-item-command cheatsheet__grid-item-command_edit">
                            <icon class="cheatsheet__grid-item-icon" name="pencil" @click.native="editKnowledgePiece(item.data, position)"></icon>
                        </div>
                        <div class="cheatsheet__grid-item-command cheatsheet__grid-item-command_remove">
                            <icon class="cheatsheet__grid-item-icon" name="remove" @click.native="removeKnowledgePiece(item.data, position)"></icon>
                        </div>
                    </template>
                </template>
            </div>
        </div>
        <div class="cheatsheet__dialog cheatsheet__dialog_edit" v-if="dialog.opened.edit">
            <icon class="cheatsheet__dialog-close-icon" name="close" @click.native="closeDialog"></icon>
            <div class="cheatsheet__dialog-title">{{ dialog.title.edit | uppercase }}</div>
            <div class="cheatsheet__dialog-content">
                <div class="cheatsheet__dialog-content-row">
                    <div class="cheatsheet__dialog-content-label cheatsheet__dialog-content--font">Description: </div>
                    <input class="cheatsheet__dialog-content-input cheatsheet__dialog-content--font" type="text" v-model="dialog.knowledgePiece.data.description"/>
                </div>
                <textarea class="cheatsheet__dialog-content-textarea" v-model="dialog.knowledgePiece.data.code" @paste="paste" @keydown.enter.exact="enter" @keydown.tab.exact="tab" @keydown.shift.tab.exact="untab"></textarea>
            </div>
            <div class="cheatsheet__dialog-error-wrapper">
                <div class="cheatsheet__dialog-error" v-for="error in dialog.errors">
                    {{ error }}
                </div>
            </div>
            <div class="cheatsheet__dialog-button-wrapper">
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_save" @click="saveKnowledgePiece">{{ dialog.buttonText.save | uppercase }}</div>
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_cancel" @click="closeDialog">{{ dialog.buttonText.cancel | uppercase }}</div>
            </div>
        </div>
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
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_remove" @click="updateCheatsheet">{{ dialog.buttonText.remove | uppercase }}</div>
                <div class="cheatsheet__dialog-button cheatsheet__dialog-button_cancel" @click="closeDialog">{{ dialog.buttonText.cancel | uppercase }}</div>
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
            data: {
                cheatsheet: null,
                knowledgePieces: []
            },
            pagination: {
                perPage: 15,
                currentPage: 1
            },
            order: {
                by: 'updated_at',
                direction: 'desc'
            },
            dialog: {
                opened: {
                    edit: false,
                    remove: false
                },
                title: {
                    edit: 'edit knowledge piece',
                    remove: 'remove knowledge piece'
                },
                text: {
                    edit: '',
                    remove: 'Do you really want to remove the selected knowledge piece from the cheatsheet?'
                },
                buttonText: {
                    save: 'save',
                    remove: 'remove',
                    cancel: 'cancel'
                },
                knowledgePiece: {
                    data: null,
                    position: 0
                },
                errors: []
            },
            TAB: '    '
        }
    },
    created () {
        this.loading = true
        this.loadCheatsheetAndKnowledgePieces()
    },
    computed: {
        title () {
            return this.data.cheatsheet ? this.data.cheatsheet.name : ''
        }
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
        setCheatsheet (cheatsheet) {
            this.data.cheatsheet = { id: cheatsheet.id, name: cheatsheet.name, language: cheatsheet.language, count: cheatsheet.knowledge_piece_ids.length, created: cheatsheet.created_at, modified: cheatsheet.updated_at }
        },
        setKnowledgePieces (knowledgePieces) {
            let data = knowledgePieces.data.map(knowledgePiece => {
                return { id: knowledgePiece.id, description: knowledgePiece.description, code: knowledgePiece.code, language: knowledgePiece.language, position: knowledgePiece.pivot.position }
            })

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
        editKnowledgePiece (knowledgePiece, position) {
            this.dialog.knowledgePiece.data = JSON.parse(JSON.stringify(knowledgePiece))
            this.dialog.knowledgePiece.position = position
            this.dialog.errors = []
            this.dialog.opened.edit = true
        },
        removeKnowledgePiece (knowledgePiece, position) {
            this.dialog.knowledgePiece.data = JSON.parse(JSON.stringify(knowledgePiece))
            this.dialog.knowledgePiece.position = position
            this.dialog.errors = []
            this.dialog.opened.remove = true
        },
        saveKnowledgePiece () {
            let knowledgePiece = JSON.parse(JSON.stringify(this.dialog.knowledgePiece.data))
            let position = this.dialog.knowledgePiece.position

            knowledgePiece.language = knowledgePiece.language.id

            axios.put('/api/knowledgepieces/' + knowledgePiece.id, knowledgePiece)
                .then(response => {
                    this.data.knowledgePieces[position].data = this.dialog.knowledgePiece.data
                    this.closeDialog()
                })
                .catch(error => {
                    this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                })
        },
        updateCheatsheet () {
            let knowledgePiece = this.dialog.knowledgePiece.data
            let position = this.dialog.knowledgePiece.position

            axios.get('/api/knowledgepieces/' + knowledgePiece.id)
                .then(response => {
                    let cheatsheets = response.data.cheatsheet_ids

                    let index = cheatsheets.indexOf(this.data.cheatsheet.id)
                    cheatsheets.splice(index, 1)

                    axios.put('/api/knowledgepieces/' + knowledgePiece.id, { cheatsheets: cheatsheets })
                        .then(response => {
                            this.data.knowledgePieces[position].data = null
                            this.data.knowledgePieces[position].taken = false
                            this.closeDialog()
                        })
                        .catch(error => {
                            this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                        })
                })
                .catch(error => {
                    this.dialog.errors = Object.values(error.response.data.errors).map(val => val[0])
                })
        },
        closeDialog () {
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

            let text = this.dialog.knowledgePiece.data.code

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

            this.dialog.knowledgePiece.data.code = text.substring(0, start) + pastedText + text.substring(end)

            this.$nextTick(() => {
                // correct caret positions
                this.setCaretPosition(el, start + charactersAdded, start + charactersAdded)
            })
        },
        enter (e) {
            e.preventDefault()

            let text = this.dialog.knowledgePiece.data.code

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
            this.dialog.knowledgePiece.data.code = lines.join('\n')

            this.$nextTick(() => {
                // correct caret positions
                this.setCaretPosition(el, start + spacesAdded[0] + 1, end + spacesAdded[0] + 1)
            })
        },
        tab (e) {
            e.preventDefault()

            let text = this.dialog.knowledgePiece.data.code

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
                this.dialog.knowledgePiece.data.code = lines.join('\n')
            } else {
                let n = this.TAB.length
                spacesAdded.push(n)
                this.dialog.knowledgePiece.data.code = text.substring(0, start) + this.TAB + text.substring(end)
            }

            this.$nextTick(() => {
                // correct caret positions
                if (selectedLines.length > 1) {
                    this.setCaretPosition(el, start + spacesAdded[0], end + spacesAdded.reduce((a, b) => a + b, 0))
                } else {
                    this.setCaretPosition(el, start + spacesAdded[0], start + spacesAdded[0])
                }
            })
        },
        untab (e) {
            e.preventDefault()

            let text = this.dialog.knowledgePiece.data.code

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
                this.dialog.knowledgePiece.data.code = lines.join('\n')
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
                this.dialog.knowledgePiece.data.code = lines.join('\n')
            }

            this.$nextTick(() => {
                // correct caret positions
                if (selectedLines.length > 1) {
                    this.setCaretPosition(el, start - spacesRemoved[0], end - spacesRemoved.reduce((a, b) => a + b, 0))
                } else {
                    this.setCaretPosition(el, start - spacesRemoved[0], end - spacesRemoved[0])
                }
            })
        }
    },
    components: {
        icon: Icon
    }
}
</script>
