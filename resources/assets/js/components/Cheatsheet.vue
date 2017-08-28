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
        <div class="loader-wrapper" v-show="loading">
            <img class="loader" src="/images/loader.svg"/>
        </div>
        <div class="content" v-show="!loading">
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
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            loading: true,
            header: [
                { label: 'id', align: 'left' },
                { label: 'description', align: 'left' },
                { label: 'code', align: 'left' },
                { label: 'created', align: 'right' },
                { label: 'modified', align: 'right' }
            ],
            cheatsheet: null
        }
    },
    created () {
        this.loadData()
    },
    computed: {
        title () {
            return this.cheatsheet ? this.cheatsheet.name : ''
        },
        data () {
            let data = []

            if (this.cheatsheet) {
                data = this.cheatsheet.knowledge_pieces.map(knowledgePiece => {
                    return { id: knowledgePiece.id, description: knowledgePiece.description, code: knowledgePiece.code, created: knowledgePiece.created_at, modified: knowledgePiece.updated_at }
                })
            }

            return data
        }
    },
    methods: {
        loadData () {
            axios.get('/api/cheatsheets/' + this.$route.params.id, { params: { fields: 'id,name,created_at,updated_at,knowledge_pieces' } })
                .then(response => {
                    this.cheatsheet = response.data
                    this.loading = false
                })
                .catch(error => console.log(error))
        }
    }
}
</script>
