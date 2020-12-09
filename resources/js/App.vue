<template>
  <v-app>
    <v-container fluid>
      <v-row>
        <v-col>
          <Header />
        </v-col>
      </v-row>
      <v-main>
        <router-view />
      </v-main>
    </v-container>
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
  }
</script>
