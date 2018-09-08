import Vue from 'vue'
import App from '../components/App.vue'
import Datetime from 'vue-datetime'
import Multiselect from 'vue-multiselect'
import Simplert from 'vue2-simplert'

Vue.component('multiselect', Multiselect);
Vue.use(Datetime);
Vue.component('simplert', Simplert);

new Vue({
    el: '#cargo-calc',
    render: h => h(App)
});
