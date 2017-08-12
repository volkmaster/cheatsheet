import moment from 'moment'

Vue.filter('capitalize', (value) => value[0].toUpperCase() + value.slice(1))
Vue.filter('uppercase', (value) => value.toUpperCase())
Vue.filter('date', (value) => moment(value).format('M/D/YY'))
Vue.directive('focus', { inserted: (el) => el.focus() })
