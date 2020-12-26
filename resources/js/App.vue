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
  }
</script>
