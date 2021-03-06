import './bootstrap'
import Vue from 'vue';
import router from './routes/index';
import store from './store/store.js'

import App from './App.vue';
// import BootstrapVue from 'bootstrap-vue';
// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap-vue/dist/bootstrap-vue.css';
import '../sass/app.scss';
import vuetify from '../plugins/vuetify';
// import Vuetify from 'vuetify/lib';
// import 'vuetify/dist/vuetify.min.css';
// Vue.use(Vuetify);

//Vueインスタン生成時にloginUserを確認する
const createApp = async () => {
  await store.dispatch('auth/currentUser');
}

require('./bootstrap');


window.Vue = require('vue');
// Vue.use(BootstrapVue);


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
    store,
    vuetify
});

//Vueインスタンス生成後にcreateApp methodを呼び出す
createApp();
