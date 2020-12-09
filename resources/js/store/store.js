import Vue from 'vue';
import Vuex from 'vuex';

//import to stores
import auth from './auth';

Vue.use(Vuex);

const store = new Vuex.Store({
  
  modules: {
    auth,
  }
})

export default store
