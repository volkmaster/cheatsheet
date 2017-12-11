import './bootstrap'
import './utils/vueHelpers'

import VueRouter from 'vue-router'
import Icon from 'vue-awesome/icons'
import VueHighlightJS from 'vue-highlightjs'

import App from './components/App.vue'
import Dashboard from './components/Dashboard.vue'
import Cheatsheet from './components/Cheatsheet.vue'

Vue.component('icon', Icon)
Vue.component('app', App)
Vue.component('dashboard', Dashboard)
Vue.component('cheatsheet', Cheatsheet)

Vue.use(VueHighlightJS)

const router = new VueRouter({
    mode: 'history',
    routes: [
        { name: 'dashboard', path: '/', component: Dashboard },
        { name: 'cheatsheet', path: '/cheatsheet/:id', component: Cheatsheet }
    ]
})

new Vue({ // eslint-disable-line no-new
    router,
    el: '#app'
})
