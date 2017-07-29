import * as constants from './utils/constants'

window._ = require('lodash')

window.$ = window.jQuery = require('jquery')

window.Vue = require('vue')

window.axios = require('axios')
window.axios.defaults.baseURL = constants.BASE_URL
window.axios.defaults.headers.common = {
    'Accept': 'application/json',
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
}
