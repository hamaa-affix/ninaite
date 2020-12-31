<template>
  <v-container fluid>
    <v-row>
      <v-col
        cols="12"
        md="12"
        v-for="recuitment in recuitments"
        :key="recuitment.id"
      >
        <v-card
          class="mx-auto"
          align="center"
          elevation="11"
        >
          <v-row>
            <v-col cols="4">
              <v-img
                :src="recuitment.img_name"
                height="250"
                max-width="250"
              >
              </v-img>
            </v-col>
            <v-col cols="8">
              <v-card-title>{{recuitment.title}}</v-card-title>
              <v-card-text >
                <v-row
                  align="center"
                  class="mx-0"
                >
                  <p>
                    {{recuitment.content}}
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
        <br />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props: {
    recuitments: {
      requierd: true,
      type: Array,
    }
  }
};
</script>

<style>
</style>
