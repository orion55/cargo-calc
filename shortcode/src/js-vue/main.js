import Vue from 'vue'
import App from '../components/App.vue'
import Datetime from 'vue-datetime'
import Multiselect from 'vue-multiselect'
import Simplert from 'vue2-simplert'
import VeeValidate, { Validator } from 'vee-validate'

Vue.component('multiselect', Multiselect)
Vue.use(Datetime)
Vue.component('simplert', Simplert)
Vue.use(VeeValidate)

new Vue({
  el: '#cargo-calc',
  render: h => h(App)
})
