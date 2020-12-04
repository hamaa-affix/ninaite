import Vue from 'vue';
import Vuex from 'vuex';

//import to stores
import chat_user from './chat_user';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    chat_user
  }
})

export default store
