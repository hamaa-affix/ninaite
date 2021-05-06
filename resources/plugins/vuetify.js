import Vue from 'vue';
import Vuetify from 'vuetify/lib';
import colors from 'vuetify/lib/util/colors';
// mdiを利用する場合
import '@mdi/font/css/materialdesignicons.css';
import '@fortawesome/fontawesome-free/css/all.css'
Vue.use(Vuetify);

const opts = {
  //mdiを利用する場合
  icons: {
    //iconfont: 'mdi',
    iconfont: ['fa', 'mdi']
  },
};

export default new Vuetify(opts);
