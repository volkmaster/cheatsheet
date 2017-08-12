<style lang="scss" scoped>
@import '../../sass/app';

.content-wrapper {
    .content {
        .title .label { color: $blue; }

        .table {
            .header .item { border-color: $blue; }

            .id          { width : 10%; }
            .description { width : 25%; }
            .code        { width : 35%; }
            .date        { width : 15%; }
        }
    }
}
</style>

<template>
    <div class="content-wrapper">
        <div class="content">
            <div class="title">
                <h2 class="label">{{ title | uppercase }}</h2>
            </div>
            <table class="table">
                <thead class="header">
                    <th class="item" :class="item.align" v-for="item in header">{{ item.label | uppercase }}</th>
                </thead>
                <tbody class="data">
                    <tr class="row" v-for="item in data">
                        <td class="item id">{{ item.id }}</td>
                        <td class="item description">{{ item.description }}</td>
                        <td class="item code">{{ item.code }}</td>
                        <td class="item date right">{{ item.created | date }}</td>
                        <td class="item date right">{{ item.modified | date }}</td>
                    </tr>
                </tbody>
            </table>
            <pagination
                :current-page="currentPage"
                :last-page="lastPage"
                @select-page="selectPage">
            </pagination>
        </div>
    </div>
</template>

<script>
import Pagination from './Pagination.vue'

export default {
    data () {
        return {
            title: '',
            header: [
                { label: 'id', align: 'left' },
                { label: 'description', align: 'left' },
                { label: 'code', align: 'left' },
                { label: 'created', align: 'right' },
                { label: 'modified', align: 'right' }
            ],
            data: [],
            currentPage: 1
        }
    },
    created () {
        let cheatsheet = this.$store.getters.getCheatsheetById(this.$route.params.id)
        this.title = cheatsheet.name
        this.setData(cheatsheet.knowledge_pieces)
    },
    computed: {
        lastPage () {
            return 0
        }
    },
    methods: {
        setData (data) {
            this.data = data.map(knowledgePiece => {
                return { id: knowledgePiece.id, description: knowledgePiece.description, code: knowledgePiece.code, created: knowledgePiece.created_at, modified: knowledgePiece.updated_at }
            })
        },
        selectPage (target) {
            if (this.currentPage !== target) {
                this.currentPage = target
            }
        }
    },
    components: {
        pagination: Pagination
    }
}
</script>
