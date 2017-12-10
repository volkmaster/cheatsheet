<style lang="scss" scoped>
@import '../../sass/app';
// @import '~highlight.js/styles/atelier-plateau-dark.css';
@import '~highlight.js/styles/darcula.css';

.cheatsheet {
    width            : 100%;
    height           : 100%;
    display          : flex;
    justify-content  : center;
    background-color : $pickled-bluewood;

    align-items: center;
    flex-direction: column;
}

.cheatsheet__loader {
    position : absolute;
    top      : 40%;
    width    : 100px;
    height   : 100px;
}

.cheatsheet__grid {
    display   : flex;
    flex-wrap : wrap;
}

.cheatsheet__grid-item {
    width  : calc(100vw / 5);
    height : calc(100vh / 3);
    padding: 2px;
}

.text {
    width       : 700px;
    height      : 300px;
    font-family : Courier;
    font-size   : 13px;
}

.code {
    margin  : 0;
    padding : 0;
}
</style>

<template>
    <div class="cheatsheet">
        <img class="cheatsheet__loader" src="/images/loader.svg" v-show="loading"/>
        <div class="cheatsheet__grid" v-show="!loading">
            <div class="cheatsheet__grid-item" v-for="item in data.knowledgePieces">
                <template v-if="item.taken">
                    <div>{{ item.data.description }}</div>
                    <!-- <img class="cheatsheet__grid-item-image" :src="item.language.image"> -->
                    <!-- <textarea class="text" v-model="text" @paste="paste" @keydown.enter.exact="enter" @keydown.tab.exact="tab" @keydown.shift.tab.exact="untab"></textarea> -->
                    <pre v-highlightjs="item.data.code" class="code"><code :class="item.data.language.highlight"></code></pre>
                </template>
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
            text: '',
            TAB: '    '
        }
    },
    created () {
        this.loading = true
        this.loadCheatsheetAndKnowledgePieces()
    },
    mounted () {
        this.$nextTick(() => { })
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
            let data = { id: cheatsheet.id, name: cheatsheet.name, language: cheatsheet.language, count: cheatsheet.knowledge_piece_ids.length, created: cheatsheet.created_at, modified: cheatsheet.updated_at }

            this.data.cheatsheet = data
        },
        setKnowledgePieces (knowledgePieces) {
            let data = knowledgePieces.data.map(knowledgePiece => {
                return { id: knowledgePiece.id, description: knowledgePiece.description, code: knowledgePiece.code, language: knowledgePiece.language, position: knowledgePiece.pivot.position }
            })

            let sortedData = []
            for (let i = 0; i < data.length; i++) {
                let knowledgePiece = data[i]
                if (knowledgePiece) {
                    sortedData[knowledgePiece.position] = { data: knowledgePiece, taken: true }
                }
            }

            for (let i = 0; i < 15; i++) {
                if (!sortedData[i]) {
                    sortedData[i] = { data: null, taken: false }
                }
            }

            this.data.knowledgePieces = sortedData
        },
        setCaretPosition (el, start, end) {
            el.selectionStart = start
            el.selectionEnd = end
        },
        paste (e) {
            e.preventDefault()

            let el = e.target

            let start = el.selectionStart
            let end = el.selectionEnd

            let lines = this.text.split('\n')
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

            this.text = this.text.substring(0, start) + pastedText + this.text.substring(end)

            this.$nextTick(() => {
                // correct caret positions
                this.setCaretPosition(el, start + charactersAdded, start + charactersAdded)
            })
        },
        enter (e) {
            e.preventDefault()

            let el = e.target

            let start = el.selectionStart
            let end = el.selectionEnd

            let lines = this.text.split('\n')

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
            this.text = lines.join('\n')

            this.$nextTick(() => {
                // correct caret positions
                this.setCaretPosition(el, start + spacesAdded[0] + 1, end + spacesAdded[0] + 1)
            })
        },
        tab (e) {
            e.preventDefault()

            let el = e.target

            let start = el.selectionStart
            let end = el.selectionEnd

            let lines = this.text.split('\n')
            let selectedLines = this.text.substring(start, end).split('\n')

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
                this.text = lines.join('\n')
            } else {
                let n = this.TAB.length
                spacesAdded.push(n)
                this.text = this.text.substring(0, start) + this.TAB + this.text.substring(end)
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

            let el = e.target

            let start = el.selectionStart
            let end = el.selectionEnd

            let lines = this.text.split('\n')
            let selectedLines = this.text.substring(start, end).split('\n')

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
                this.text = lines.join('\n')
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
                this.text = lines.join('\n')
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
