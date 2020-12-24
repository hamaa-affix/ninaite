<template>
  <div>
    <v-btn icon @click="logout">
      <v-icon>mdi-email</v-icon>
    </v-btn>
  </div>
</template>

<script>
export default {
  methods: {
    async logout() {
      await this.$store.dispatch('auth/logout');
      this.$router.push('/');
    }
  }
}
</script>

<style>

</style>
