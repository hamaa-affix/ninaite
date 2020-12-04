import Vue from 'vue';
import router from './routes/index';
import store from './store/store.js'

import App from './App.vue';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import '../sass/app.scss';

require('./bootstrap');


window.Vue = require('vue');
Vue.use(BootstrapVue);


const app = new Vue({
    el: '#app-child',
    render: h => h(App),
    router,
    store,
});
