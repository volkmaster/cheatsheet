<style lang="scss" scoped>
@import '../../sass/app';

.content-wrapper {
    .content {
        .title-wrapper {
            display         : flex;
            justify-content : space-between;

            .label { color: $green; }
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
}
</style>

<template>
    <div class="content-wrapper">
        <div class="loader-wrapper" v-show="loading">
            <img class="loader" src="/images/loader.svg"/>
        </div>
        <div class="content" v-show="!loading">
            <div class="title-wrapper">
                <h2 class="label">{{ title | uppercase }}</h2>
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
            currentPage: 1
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
        search () {
            this.filter.isFiltered = true
            this.loadData()
        },
        clear () {
            if (this.filter.isFiltered) {
                this.filter.search = ''
                this.filter.isFiltered = false
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
        }
    },
    components: {
        icon: Icon,
        pagination: Pagination
    }
}
</script>
