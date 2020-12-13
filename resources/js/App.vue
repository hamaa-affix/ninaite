<template>
  <v-app>
    <Header :data="logiData"/>
    <v-main>
      <v-container fluid>
        <router-view />
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Header from './layouts/Header';
import TheChat from './components/TheChat';

  export default {
    components: {
      Header,
      TheChat,
    },
    data () {
      return {
        loginData: false
      }
    },
    watch: {
    },
    methods: {
      isLogin() {
        //axios getLoginData
        //login状態を取得してloginDataのデータを書き換える処理
      }
    }
  }
</script>
