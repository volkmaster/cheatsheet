Vue.filter('capitalize', (value) => value[0].toUpperCase() + value.slice(1))
Vue.filter('uppercase', (value) => value.toUpperCase())
Vue.directive('focus', { inserted: (el) => el.focus() })
