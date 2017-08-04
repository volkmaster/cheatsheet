import './bootstrap'
import VueRouter from 'vue-router'
import './utils/vueHelpers'

import Icon from 'vue-awesome/icons'
import App from './components/App.vue'
import Dashboard from './components/Dashboard.vue'

Vue.component('icon', Icon)
Vue.component('app', App)
Vue.component('dashboard', Dashboard)

const router = new VueRouter({
    routes: [
        { path: '/', component: Dashboard }
    ]
})

new Vue({ // eslint-disable-line no-new
    router,
    el: '#app'
})
