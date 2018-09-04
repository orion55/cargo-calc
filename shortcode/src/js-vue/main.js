import Vue from 'vue'
import App from '../components/App.vue'
import vSelect from 'vue-select'
Vue.component('v-select', vSelect)

new Vue({
    el: '#cargo-calc',
    render: h => h(App)
});
