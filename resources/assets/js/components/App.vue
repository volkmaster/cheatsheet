<style lang="sass">
.blue { color: #0000ff; }
.red  { color: #ff0000; }
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
                        <span>{{ user }}</span>
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
                user: ''
            }
        },
        created () {
            axios.get('me')
                .then(response => {
                    console.log(response.data)
                    this.user = JSON.stringify(response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        mounted () {
            console.log('App Component mounted.')
        }
    }
</script>
