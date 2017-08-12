import './bootstrap'
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import './utils/vueHelpers'

import Icon from 'vue-awesome/icons'
import App from './components/App.vue'
import Dashboard from './components/Dashboard.vue'
import Cheatsheet from './components/Cheatsheet.vue'

Vue.component('icon', Icon)
Vue.component('app', App)
Vue.component('dashboard', Dashboard)
Vue.component('cheatsheet', Cheatsheet)

const router = new VueRouter({
    mode: 'history',
    routes: [
        { name: 'dashboard', path: '/', component: Dashboard },
        { name: 'cheatsheet', path: '/cheatsheet/:id', component: Cheatsheet }
    ]
})

const store = new Vuex.Store({
    state: {
        cheatsheets: null
    },
    getters: {
        getCheatsheetById: (state, getters) => (id) => {
            return state.cheatsheets.data.find(cheatsheet => cheatsheet.id === id)
        }
    },
    mutations: {
        setCheatsheets (state, cheatsheets) {
            state.cheatsheets = cheatsheets
        }
    }
})

new Vue({ // eslint-disable-line no-new
    router,
    el: '#app',
    store
})
