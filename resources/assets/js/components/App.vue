<style lang="sass">
.blue { color: #0000ff; }
.red  { color: #ff0000; }
.paint { background-color: green; }
.pointer { cursor: pointer; }
</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="blue">App Component</span>
                    </div>
                    <div class="panel-body">
                        <span class="red">This is App Component.</span>
                        <br />
                        <span v-for="el in arr">
                            <p v-if="el.id >= 1" class="pointer" :class="{ 'paint': paintBackground }" @click="doSomething()">
                                {{ el.text }}
                            </p>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                arr: [
                    { id: 0, text: 'bla' },
                    { id: 1, text: 'blabla' },
                    { id: 2, text: 'blablabla' }
                ],
                paintBackground: false
            }
        },
        computed: {
            text () {
                return this.user + '!!!!!!!!!!!!!!!!'
            }
        },
        created () {
            // axios.get('/api/users')
            //     .then(response => {
            //         console.log(response.data)
            //         this.user = JSON.stringify(response.data)
            //     })
            //     .catch(error => {
            //         console.log(error)
            //     })
        },
        mounted () {
            this.$nextTick(() => {
                console.log('App Component mounted.')
            })
        },
        methods: {
            doSomething () {
                this.paintBackground = !this.paintBackground
            }
        }
    }
</script>
