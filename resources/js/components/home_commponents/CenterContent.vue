<template>
  <v-container fluid>
    <v-row>
      <v-col cols="12" md="12">
        <v-card
          class="mx-auto"
          align="center"
          elevation="11"
        >
          <v-row>
            <v-col cols="4">
              <v-img src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>
            </v-col>
            <v-col cols="8">
              <v-card-title>求人title</v-card-title>
              <v-card-text >
                <v-row
                  align="center"
                  class="mx-0"
                >
                  <p>
                    詳細fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffhhhhhhhhh
                  </p>
                </v-row>
              </v-card-text>
              <v-spacer></v-spacer>
              <v-btn
                elevation="5"
                color="green darken-1"
                class="white--text"
              >
                詳細をみる
              </v-btn>
            </v-col>
          </v-row>
        </v-card>
        <button to="/login">login</button>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props: [],
  data: () => {
    img: {
      name: ""
    }
  }
};
</script>

<style>
</style>
