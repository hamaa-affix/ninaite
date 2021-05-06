<template>
  <v-conainer fluid>
      <v-app-bar
        color="green darken-1"
      >
      <v-row>
        <v-col cols="10" left>
          <v-toolbar-title class="ml-5 mt-2">
            <router-link to="/" class="header__link" >

              <p class="font-weight-bold white--text">
                <v-icon  color="white">fa fa-seedling</v-icon>ninaite
              </p>
            </router-link>
          </v-toolbar-title>
        </v-col>
        <v-col cols="2" rigth>
          <div v-if="isLogin">
            <v-col>
              <v-btn
                icon
                class="mr-15 white--text"
              >
                <v-icon>fa fa-user</v-icon>{{ username }}
              </v-btn>

              <v-btn
                icon
                @click="toMessage"
                class="white--text"
              >
                <v-icon>mdi-email</v-icon>message
              </v-btn>
            </v-col>
          </div>
          <div v-else>
            <v-btn
              icon
              class="mr-15"
              @click="toLogin"
            >
              login
            </v-btn>
          </div>
        </v-col>
      </v-row>
      </v-app-bar>
  </v-conainer>
</template>

<script>
  export default {
    data () {
      return {
        appBar: {
          drawer: false,
          group: null,
        },
      }
    },
    computed: {
      //computedにてstateを監視 = 認証状態を関ししている。
      isLogin() {
        return this.$store.getters['auth/check'];
      },
      username() {
        return this.$store.getters['auth/username'];
      }
   },
    methods: {
      toProfile () {
        this.$router.push
      },
      toMessage() {},
      toLogin() {
        this.$router.push("login");
      }
    }
  }
</script>
