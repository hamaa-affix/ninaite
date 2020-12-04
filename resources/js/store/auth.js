import Axios from "axios";

const state = {
  user: null
}

const getters = {

}

const mutations = {
  setUser(state, user) {
    state.user = user;
  }
}

const actions = {
  //会員登録
  async register(context, data) {
    const response = await axios.post('api/register', data);
    context.commit('setUser', response.data);
  },
  //logout
  async login(context, data) {
    const response = await axios.post('api/login', data);
    context.commit('setUser', response.data);
  },
  //logout
  async logout(context, data) {
    const response = await axios.post('api/logout', data);
    context.commit('setUser', null);
  },
  //get login user
  async currentUser(context) {
    const response = await axios.get('api/user');

    // axiosで取得したデータが存在いれば、そのまま代入、無ければnull
    const user = response.data || null;
    context.commit('setUser', user);
  }
}

export default {
  namespace: true,
  state,
  getters,
  mutations,
  actions
}
