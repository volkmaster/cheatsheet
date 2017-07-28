import './bootstrap'
import './utils/vueHelpers'
import Icon from 'vue-awesome/icons'

Vue.component(
    'app',
    require('./components/App.vue')
)

Vue.component('icon', Icon)

new Vue({ // eslint-disable-line no-new
    el: '#app'
})
