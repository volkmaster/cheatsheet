import * as constants from './constants'

window._ = require('lodash')

window.$ = window.jQuery = require('jquery')

window.Vue = require('vue')

window.axios = require('axios')
window.axios.defaults.baseURL = constants.API_URL
window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
}
