<style lang="scss" scoped>
@import '../../sass/app';

$cols : (5, 5);

.dashboard {
    width            : 100%;
    height           : 100%;
    display          : flex;
    justify-content  : center;
    background-color : $pickled-bluewood;
}

.dashboard--blur {
    filter         : blur(5px);
    pointer-events : none;
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
    position  : relative;
    margin    : 20px;
    display   : flex;
    flex-wrap : wrap;
}

.dashboard__grid-item {
    position: relative;
    height           : calc((100% / #{length($cols)}) - 40px);
    margin           : 20px;
    background-color : $porcelain;
    box-shadow       : 5px 5px 3px rgba(0, 0, 0, 0.3);
    cursor           : pointer;
}

.dashboard__grid-item--narrow { width : calc((100% / (#{nth($cols, 1)} + 1)) - 40px); }
.dashboard__grid-item--wide   { width : calc((100% / #{nth($cols, 2)}) - 40px);       }

.dashboard__plus {
    height          : 100%;
    display         : flex;
    align-items     : center;
    justify-content : center;
}

.dashboard__plus::before {
    content     : '+';
    color       : $pickled-bluewood;
    font-size   : 270px;
    font-family : $font-title;
}

.dashboard__grid-item-title {
    padding     : 5px;
    color       : $cinnabar;
    font-size   : 40px;
    font-family : $font-title;
}

.dashboard__grid-item-description {
    position  : absolute;
    top       : 50%;
    left      : 50%;
    transform : translate(-50%, -50%);
    color     : $mariner;
}

.dashboard__grid-item-number {
    width       : 100%;
    font-size   : 25px;
    font-family : $font-regular;
    text-align  : center;
}

.dashboard__grid-item-text {
    width       : 100%;
    font-size   : 20px;
    font-family : $font-light;
    text-align  : center;
}

.dashboard__grid-item-language {
    position        : absolute;
    bottom          : 5px;
    width           : 100%;
    padding-right   : 5px;
    display         : flex;
    justify-content : flex-end;
}

.dashboard__grid-item-image {
    max-width  : 100px;
    max-height : 100px;
}

.content-wrapper {
    .content {
        .title-wrapper {
            .label { color: $green; }

            .new-wrapper {
                width            : 30px;
                height           : 30px;
                display          : flex;
                align-items      : center;
                justify-content  : center;
                flex-direction   : column;
                background-color : $porcelain;
                cursor           : pointer;

                &:hover { filter: brightness(80%); }

                .row { display: flex; }

                .square {
                    width        : 10px;
                    height       : 10px;
                    border-style : solid;
                    border-color : $cinnabar;

                    &.top-left     { border-width : 0 2px 2px 0; }
                    &.top-right    { border-width : 0 0 2px 2px; }
                    &.bottom-left  { border-width : 2px 2px 0 0; }
                    &.bottom-right { border-width : 2px 0 0 2px; }
                }
            }
        }

        .filter-wrapper {
            width       : 100%;
            display     : flex;
            align-items : center;

            .filter-label {
                color  : $dark-gray;
                margin : 12px 0;
            }

            .filter-input {
                margin      : 0 15px;
                padding     : 5px;
                font-size   : 15px;
                font-family : $font-regular;
                border      : 0;
                outline     : 0;
            }

            .filter-icon-wrapper {
                display         : flex;
                justify-content : flex-end;

                .filter-icon {
                    margin-right : 10px;
                    color        : $dark-gray;
                    cursor       : pointer;

                    &.clear {
                        opacity: 0;

                        &.with-search { opacity: 1; }
                    }

                    &:hover { color: $black; }
                }
            }
        }

        .table {
            .header .item { border-color: $green; }

            .id    { width : 10%; }
            .name  { width : 35%; }
            .count { width : 25%; }
            .date  { width : 15%; }
        }
    }

    .dialog {
        position         : absolute;
        top              : 50%;
        left             : 50%;
        width            : 400px;
        padding          : 10px 0 0 20px;
        transform        : translate3d(-50%, -50%, 0);
        box-shadow       : 0 1px 3px 0 rgba(0, 0, 0, 0.3);
        background-color : $white;
        overflow         : hidden;

        .close-btn {
            position : absolute;
            top      : 10px;
            right    : 10px;
            width    : 30px;
            height   : 30px;
            cursor   : pointer;

            &:hover .square { border-color: $black; }

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
        }

        .dialog-title {
            height      : 30px;
            display     : flex;
            align-items : center;
            color       : $green;
            font-size   : 18px;
        }

        .dialog-content {
            padding    : 10px 40px 10px 0;
            max-height : 375px;
            overflow-y : scroll;

            .name {
                height      : 40px;
                display     : flex;
                align-items : center;
                color       : $black;
                font-size   : 16px;

                .name-label {
                    width  : 25%;
                    height : 20px;
                }

                .name-input {
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
            }

            .save-btn-wrapper {
                margin-top: 10px;
                display: flex;
                justify-content: flex-end;

                .save-btn {
                    width            : 100px;
                    height           : 40px;
                    display          : flex;
                    align-items      : center;
                    justify-content  : center;
                    background-color : $green;
                    cursor           : pointer;

                    &:hover { filter: brightness(80%); }
                }
            }
        }
    }
}
</style>

<template>
    <div class="dashboard" :class="{ 'dashboard--blur': dialogOpened }">
        <div class="dashboard__loader" v-show="loading">
            <img class="dashboard__loader-image" src="/images/loader.svg"/>
        </div>
        <div class="dashboard__grid" v-show="!loading">
            <div class="dashboard__grid-item dashboard__grid-item--narrow">
                <div class="dashboard__plus"></div>
            </div>
            <template v-for="row in data">
                <div class="dashboard__grid-item" :class="'dashboard__grid-item--' + row.itemType" v-for="item in row.items" @click="openCheatsheet(item.id)">
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
            </template>
        </div>
                <!-- <div class="new-wrapper" @click="openDialog">
                    <div class="row">
                        <div class="square top-left"></div>
                        <div class="square top-right"></div>
                    </div>
                    <div class="row">
                        <div class="square bottom-left"></div>
                        <div class="square bottom-right"></div>
                    </div>
                </div>
                <pagination
                    :current-page="currentPage"
                    :last-page="lastPage"
                    @select-page="selectPage">
                </pagination>
            </div> -->
            <!-- <div class="filter-wrapper">
                <h4 class="filter-label">Search</h4>
                <input type="text" class="filter-input" :placeholder="filter.placeholder" v-model="filter.search"/>
                <div class="filter-icon-wrapper">
                    <icon class="filter-icon" name="search" @click.native="search"></icon>
                    <icon class="filter-icon clear" :class="{ 'with-search': filter.search !== '' }" name="times" @click.native="clear"></icon>
                </div>
            </div> -->
            <!-- <table class="table">
                <thead class="header">
                    <th class="item" :class="item.align" v-for="item in header">{{ item.label | uppercase }}</th>
                </thead>
                <tbody class="data">
                    <tr v-if="!data">
                        <td class="no-data" colspan="5">{{ noDataMsg }}</td>
                    </tr>
                    <tr class="row" v-for="item in data" @click="openCheatsheet(item.id)">
                        <td class="item id">{{ item.id }}</td>
                        <td class="item name">{{ item.name }}</td>
                        <td class="item count">{{ item.count }}</td>
                        <td class="item date right">{{ item.created | date }}</td>
                        <td class="item date right">{{ item.modified | date }}</td>
                    </tr>
                </tbody>
            </table> -->
        <!-- <div class="dialog" v-if="dialogOpened">
            <div class="close-btn" @click="closeDialog">
                <div class="square top"></div>
                <div class="square bottom"></div>
            </div>
            <div class="dialog-title">{{ dialogTitle | uppercase }}</div>
            <div class="dialog-content">
                <div class="name">
                    <div class="name-label">Name: </div>
                    <input class="name-input" type="text" v-model="cheatsheetName"/>
                </div>
                <div class="save-btn-wrapper" @click="saveCheatsheet">
                    <div class="save-btn">{{ dialogBtnText | uppercase }}</div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import Icon from 'vue-awesome/components/Icon'
import Pagination from './Pagination.vue'

export default {
    data () {
        return {
            loading: false,
            title: 'cheatsheets',
            header: [
                { label: 'id', align: 'left' },
                { label: 'name', align: 'left' },
                { label: 'no. of knowledge pieces', align: 'left' },
                { label: 'created', align: 'right' },
                { label: 'modified', align: 'right' }
            ],
            cheatsheets: null,
            filter: {
                placeholder: 'Filter by name...',
                search: '',
                isFiltered: false
            },
            currentPage: 1,
            noDataMsg: 'No cheatsheets found. Create the first one.',
            dialogOpened: false,
            dialogTitle: 'new cheatsheet',
            dialogBtnText: 'save',
            cheatsheetName: ''
        }
    },
    created () {
        this.loadData()
    },
    computed: {
        data () {
            let data = []

            if (this.cheatsheets) {
                let cheatsheets = this.cheatsheets.data.map(cheatsheet => {
                    return { id: cheatsheet.id, name: cheatsheet.name, language: cheatsheet.language, count: cheatsheet.knowledge_piece_ids.length, created: cheatsheet.created_at, modified: cheatsheet.updated_at }
                })

                let cols = [5, 5]
                let k = 0
                for (let i = 0; i < cols.length; i++) {
                    let items = []
                    for (let j = 0; j < cols[i] && k < cheatsheets.length; j++) {
                        items.push(cheatsheets[k++])
                    }
                    data.push({ items: items, itemType: i % 2 === 0 ? 'narrow' : 'wide' })
                }
            }
            console.log(data)
            return data
        },
        lastPage () {
            return this.cheatsheets ? this.cheatsheets.last_page : 0
        }
    },
    methods: {
        loadData () {
            this.loading = true

            let params = {
                per_page: this.$store.state.perPage,
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
        saveData () {
            let params = {
                name: this.cheatsheetName
            }

            axios.post('/api/cheatsheets', params)
                .then(response => {
                    this.closeDialog()
                    this.currentPage = 1
                    this.loadData()
                })
                .catch(error => console.log(error))
        },
        openDialog () {
            this.cheatsheetName = ''
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
                this.loadData()
            }
        },
        clear () {
            if (this.filter.isFiltered) {
                this.filter.search = ''
                this.filter.isFiltered = false
                this.currentPage = 1
                this.loadData()
            }
        },
        selectPage (target) {
            if (this.currentPage !== target) {
                this.currentPage = target
                this.loadData()
            }
        },
        openCheatsheet (id) {
            this.$router.push({ name: 'cheatsheet', params: { id: id } })
        },
        saveCheatsheet () {
            if (this.cheatsheetName) {
                this.saveData()
            }
        }
    },
    components: {
        icon: Icon,
        pagination: Pagination
    }
}
</script>
