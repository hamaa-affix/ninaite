import Vue from 'vue';
import Vuetify from 'vuetify/lib';
import colors from 'vuetify/lib/util/colors';
// mdiを利用する場合
import '@mdi/font/css/materialdesignicons.css';

Vue.use(Vuetify);

const opts = {
  //mdiを利用する場合
  icons: {
    iconfont: 'mdi',
  },
};

export default new Vuetify(opts);
