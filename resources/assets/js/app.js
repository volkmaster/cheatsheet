import './bootstrap'

Vue.component(
    'app',
    require('./components/App.vue')
)

new Vue({ // eslint-disable-line no-new
    el: '#app'
})
