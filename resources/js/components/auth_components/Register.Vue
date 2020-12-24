<template>
  <v-container fluid >
    <v-row justify="center">
      <v-col col="12" md="6">
        <v-card  class="mx-auto" >
          <v-col>
            <v-card-title >Register</v-card-title>
          </v-col>

          <v-form v-model="valid" @submit.prevent="register">
            <v-container>
              <v-row justify="center">
                <v-col
                  cols="12"
                  md="8"
                >

                  <v-text-field
                    v-model="registerForm.name"
                    label="name"
                    required
                  ></v-text-field>
                  {{registerForm.name}}
                </v-col>

                <v-col
                  cols="12"
                  md="8"
                >
                  <v-text-field
                    v-model="registerForm.email"
                    label="E-mail"
                    required
                  ></v-text-field>
                </v-col>

                <v-col
                  cols="12"
                  md="8"
                >
                  <v-text-field
                    v-model="registerForm.password"
                    label="pasward"
                    required
                  ></v-text-field>
                </v-col>
                <v-col
                  cols="12"
                  md="8"
                >
                <v-text-field
                    v-model="registerForm.password_confirmation"
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
                    Register
                  </v-btn>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>

export default {
  data() {
    return {
      valid: false,
      registerForm: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }
    }
  },
  methods: {
    toLogin() {
      this.$router.push("login");
    },
    async register() {
      console.log('start register');
      await this.$store.dispatch('auth/register', this.registerForm);
      this.$router.push('/')
    }
  }
}
</script>
