import Vue from 'vue'
import App from '../components/App.vue'
// import BootstrapVue from 'bootstrap-vue'
// Vue.use(BootstrapVue);

import vSelect from 'vue-select'

Vue.component('v-select', vSelect);

import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

new Vue({
    el: '#cargo-calc',
    render: h => h(App)
});
