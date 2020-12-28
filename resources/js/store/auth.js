import { OK } from '../util';

const state = {
  user: null,
  apiStatus: null,
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
  }
}

const actions = {
  //会員登録
  async register(context, data) {
    const response = await axios.post('/api/register', data);
    context.commit('setUser', response.data);
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
    context.commit('error/setCode', response.status, { root: true })
  },
  //logout
  async logout(context) {
    const response = await axios.post('api/logout');
    context.commit('setUser', null);
  },
  //login状態を確認する
  async currentUser(context) {
    const response = await axios.get('/api/current_user');
    const user = response.data || null;
    context.commit('setUser', user);
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
