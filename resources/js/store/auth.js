import { OK, CREATED, UNPROCESSABLE_ENTITY } from '../util';

const state = {
  user: null,
  apiStatus: null,
  loginErrorMessages: null,
  registerErrorMessages: null
}

const getters = {
  check: state => !! state.user,
  username: state => state.user ? state.user.name : '',
}

const mutations = {
  setUser(state, user) {
    state.user = user;
  },
  setApiStatus(state, status) {
    state.apiStatus = status;
  },
  setLoginErrorMessages(state,message) {
    state.loginErrorMessages = message;
  },
  setRegisterErrorMessages(state, message) {
    state.registerErrorMessages = message;
  },
}

const actions = {
  //会員登録
  async register(context, data) {
    context.commit('setApiStatus', null);
    const response = await axios.post('/api/register', data)
      .catch(err => err.response || err);

    if(response.status === OK) {
      context.commit('setApiStatus', true);
      context.commit('setUser', response.data);
      return false;
    }

    context.commit('setApiStatus', false);
    if(response.status === UNPROCESSABLE_ENTITY) {
      context.commit('setRegisterErrorMessages', response.data.errors);
    } else {
      context.commit('error/setCode', response.status, { root: true });
    }
  },
  //login
  async login(context, data) {
    context.commit('setApiStatus', null)
    const response = await axios.post('/api/login', data)
      .catch(err => err.response || err)

    if (response.status === OK) {
      context.commit('setApiStatus', true)
      context.commit('setUser', response.data)
      return false
    }

    context.commit('setApiStatus', false)
    if (response.status === UNPROCESSABLE_ENTITY) {
      context.commit('setLoginErrorMessages', response.data.errors)
    } else {
      context.commit('error/setCode', response.status, { root: true })
    }
  },
  //logout
  async logout(context) {
    context.commit('setApiStatus', null);
    const response = await axios.post('api/logout');

    if(response.status === OK) {
      context.commit('setApiStatus', true);
      context.commit('setUser', null);
      return false;
    }

    context.commit('setApiStatus', false);
    context.commit('error/setCode', response.status, { root: true });
  },
  //login状態を確認する
  async currentUser(context) {
    context.commit('setApiStatus', null);
    const response = await axios.get('/api/current_user');
    const user = response.data || null;

    if(response.status === OK) {
      context.commit('setApiStatus', true);
      context.commit('setUser', user);
    }

    context.commit('setApiStatus', false);
    context.commit('error/setCode', response.status, { root: true })
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
