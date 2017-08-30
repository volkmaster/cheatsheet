<style lang="scss" scoped>
@import '../../sass/app';

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
                background-color : $green;
                cursor           : pointer;

                &:hover { filter: brightness(80%); }

                .row { display: flex; }

                .square {
                    width        : 10px;
                    height       : 10px;
                    border-style : solid;
                    border-color : $very-light-gray;

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
    <div class="content-wrapper">
        <div class="loader-wrapper" v-show="loading">
            <img class="loader" src="/images/loader.svg"/>
        </div>
        <div class="content" :class="{ blur: dialogOpened }" v-show="!loading">
            <div class="title-wrapper">
                <h2 class="label">{{ title | uppercase }}</h2>
                <div class="new-wrapper" @click="openDialog">
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
            </div>
            <div class="filter-wrapper">
                <h4 class="filter-label">Search</h4>
                <input type="text" class="filter-input" :placeholder="filter.placeholder" v-model="filter.search"/>
                <div class="filter-icon-wrapper">
                    <icon class="filter-icon" name="search" @click.native="search"></icon>
                    <icon class="filter-icon clear" :class="{ 'with-search': filter.search !== '' }" name="times" @click.native="clear"></icon>
                </div>
            </div>
            <table class="table">
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
            </table>
        </div>
        <div class="dialog" v-if="dialogOpened">
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
        </div>
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
                data = this.cheatsheets.data.map(cheatsheet => {
                    return { id: cheatsheet.id, name: cheatsheet.name, count: cheatsheet.knowledge_piece_ids.length, created: cheatsheet.created_at, modified: cheatsheet.updated_at }
                })
            }

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
