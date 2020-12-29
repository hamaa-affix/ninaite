<template>
  <div>
    <v-btn icon @click="logout">
      <v-icon>mdi-email</v-icon>
    </v-btn>
  </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex'

export default {
  computed: {
    ...mapState({
      apiStatus: state => state.auth.apiStatus
    }),
    ...mapGetters({
      isLogin: 'auth/check'
    })
  },
  methods: {
    async logout() {
      await this.$store.dispatch('auth/logout');
      
      if (this.apiStatus) {
        this.$router.push('/login');
      }
    }
  }
}
</script>

<style>

</style>
