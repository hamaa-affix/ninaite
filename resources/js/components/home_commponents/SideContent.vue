<template>
  <v-container>
    <v-row>
      <v-cols clos="12" md="4">
        <v-text-field
            label="検索"
            v-model="keyword"
        ></v-text-field>
        <v-btn
          color="green darken-1"
          class="mr-4 white--text"
          @click="serachRecruitment"
        >
          検索
        </v-btn>
      </v-cols>
    </v-row>
    <br />
    <v-row>
      <v-cols clos="12" md="4">
        <v-chip-group>
          <v-chip
            v-for="tag in tags"
            :key="tag.id"
          >
          タグです
            <!-- {{ tag.value }} -->
          </v-chip>
        </v-chip-group>
      </v-cols>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios';

//ここで求められる要件はキーワードを元にrecrumtmentのデータを取得してくること。
//tagデータを元にタグの一覧表示を行う。
export default {
  props: {
    recruitment: {
      type: String,
      required: true
    },
    tags: {
      type: String,
      required: true,
    }
  },
  data () {
    return {
      keyword: "",
    }
  },
  methods: {
    async serachRecruitment() {
      const response = await axios.get('api', this.keyword);
      //responseに格納されたデータ型の確認 [ {} ] 配列としてobjectに格納されていはず。
      //なのでここで求められることは配列を回しながら、データを格納する・
      // props.recruitment = {

      // }
      //格納したデータをhomeに渡す
      //this.$emit('snd-recuruitment-value',props.data );
      //最後にキーワードを空にする
      //this.keyword = "";
    }
  }
};
</script>

<style>
</style>
