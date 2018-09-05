import Vue from 'vue'
import App from '../components/App.vue'
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);

new Vue({
    el: '#cargo-calc',
    render: h => h(App)
});
