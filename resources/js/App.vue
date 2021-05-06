<template>
  <v-app>
    <Header :data="logiData"/>
    <v-main>
      <v-container fluid>
        <router-view />
      </v-container>
    </v-main>
    <Footer />
  </v-app>
</template>

<script>
import { INTERNAL_SERVER_ERROR } from './util';
import Header from './layouts/Header';
import TheChat from './components/TheChat';
import Footer from './layouts/Footer'

  export default {
    components: {
      Header,
      Footer,
      TheChat,
    },
    data () {
      return{}
    },
    computed: {
      errorCode () {
        return this.$store.state.error.code;
      }
    },
    watch: {
      errorCode: {
        handler (val) {
          if (val === INTERNAL_SERVER_ERROR) {
            this.$router.push('/500')
          }
        },
        immediate: true,
      },
      $route () {
        this.$store.commit('error/setCode', null);
      }
    }
  }
</script>
