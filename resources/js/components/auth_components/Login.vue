<template>
  <v-container fluid >
    <v-row justify="center">
      <v-col col="12" md="6">
        <v-card  class="mx-auto" >
          <v-col>
            <v-card-title >login</v-card-title>
          </v-col>

          <v-form v-model="valid"  @submit.prevent="login">
            <v-container>
              <v-row justify="center">
                <v-col
                  cols="12"
                  md="8"
                >
                  <v-text-field
                    v-model="loginForm.email"
                    :rules="nameRules"
                    :counter="10"
                    label="E-mail"
                    required
                  ></v-text-field>
                  {{loginForm.email}}
                </v-col>

                <v-col
                  cols="12"
                  md="8"
                >
                  <v-text-field
                    v-model="loginForm.password"
                    label="pasward"
                    required
                  ></v-text-field>
                </v-col>
                <v-col
                  cols="12"
                  md="8"
                >
                  <v-btn
                  color="green darken-1"
                  class="mr-4 white--text"
                  type="submit"
                  >
                    Login
                  </v-btn>
                  <v-btn color="primary" text @click="toRegister">初めての方はこちらを</v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
    <div v-if="loginErrors" >
      <ul v-if="loginErrors.email">
        <li v-for="msg in loginErrors.email" :key="msg">{{ msg }}</li>
      </ul>
      <ul v-if="loginErrors.password">
        <li v-for="msg in loginErrors.password" :key="msg">{{ msg }}</li>
      </ul>
    </div>
  </v-container>
</template>

<script>
import { mapState } from 'vuex'
export default {
  data () {
    return {
      valid: false,
      loginForm: {
        email: "",
        password: "",
      }
    }
  },
  computed: mapState({
    apiStatus: state => state.auth.apiStatus,
    loginErrors: state => state.auth.loginErrorMessages,
  }),
  methods: {
    toRegister() {
      this.$router.push("/register");
    },
    async login() {
      //$dispathでvuexのactionsメソッドにアクセスしている。
      await this.$store.dispatch('auth/login', this.loginForm);
      if (this.apiStatus) {
        // トップページに移動する
        this.$router.push('/');
      }
    },
    clearError() {
      //clear validation
      this.$store.commit('auth/setLoginErrorMessages', null);
    }
  },
  created: () => {
    // validation表示後他のcomponent移動時にvalidation messageを削除する
    this.clearError();
  }
}
</script>
