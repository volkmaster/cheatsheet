import './bootstrap'
import VueRouter from 'vue-router'
import './utils/vueHelpers'

import Icon from 'vue-awesome/icons'
import App from './components/App.vue'
import News from './components/News.vue'
// import Flag from './components/Flag.vue'
// import Tackle from './components/Tackle.vue'
// import Association from './components/Association.vue'

Vue.component('icon', Icon)
Vue.component('app', App)
Vue.component('news', News)
// Vue.component('flag', Flag)
// Vue.component('tackle', Tackle)
// Vue.component('association', Association)

const router = new VueRouter({
    routes: [
        { path: '/', component: News }
        // { path: '/flag', component: Flag },
        // { path: '/tackle', component: Tackle },
        // { path: '/association', component: Association }
    ]
})

new Vue({ // eslint-disable-line no-new
    router,
    el: '#app'
})
