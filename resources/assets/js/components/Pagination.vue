<style lang="scss" scoped>
@import '../../sass/app';

.pagination {
     @if ($debug) { border: 1px solid blue; }

    display         : flex;
    align-items     : center;
    justify-content : flex-end;
    flex-grow       : 1;
}

.pagination__page {
     @if ($debug) { border: 1px solid red; }

    width           : 25px;
    padding         : 0 5px;
    display         : flex;
    justify-content : center;
    color           : $dark-gray;
    font-size       : 18px;
    cursor          : pointer;
    transition      : color 0.2s linear, opacity 0.5s linear;
}

.pagination__page:hover, .pagination__page--selected { color: $black; }

.pagination__page:first-child { padding-left  : 0; }
.pagination__page:last-child  { padding-right : 0; }

.pagination__page--disabled {
    opacity        : 0;
    pointer-events : none;
    cursor         : auto;
}
</style>

<template>
    <div class="pagination" v-if="pages.length > 1">
        <div class="pagination__page" :class="{ 'pagination__page--disabled': isFirstPage }" @click="selectPage(1)"><<</div>
        <div class="pagination__page" :class="{ 'pagination__page--disabled': isFirstPage }" @click="selectPage(currentPage - 1)"><</div>
        <div class="pagination__page" :class="{ 'pagination__page--selected': page.id === currentPage }" v-for="page in pages" @click="selectPage(page.id)">{{ page.label }}</div>
        <div class="pagination__page" :class="{ 'pagination__page--disabled': isLastPage }" @click="selectPage(currentPage + 1)">></div>
        <div class="pagination__page" :class="{ 'pagination__page--disabled': isLastPage }" @click="selectPage(pages.length)">>></div>
    </div>
</template>

<script>
import { numberProp } from '../utils/propValidators'

export default {
    props: {
        currentPage: numberProp(),
        lastPage: numberProp()
    },
    computed: {
        pages () {
            let pages = []

            for (let i = 1; i <= this.lastPage; i++) {
                pages.push({ id: i, label: i })
            }

            return pages
        },
        isFirstPage () {
            return this.currentPage === 1
        },
        isLastPage () {
            return this.currentPage === this.pages.length
        }
    },
    methods: {
        selectPage (target) {
            if (this.currentPage !== target) {
                this.$emit('select-page', target)
            }
        }
    }
}
</script>
