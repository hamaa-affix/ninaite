import Vue from 'vue';

import App from './App';

require('./bootstrap');

window.Vue = require('vue');


const app = new Vue({
    el: '#app-child',
    render: h => h(App)
});
