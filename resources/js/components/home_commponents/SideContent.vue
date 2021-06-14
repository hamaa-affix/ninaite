<template>
  <v-container>
    <v-row align="center"
        justify="center">
      <v-cols clos="12" md="4">
        <v-text-field
            label="検索"
            v-model="keyword"
        ></v-text-field>
        {{keyword}}
        <v-btn
          color="green darken-1"
          class="mr-4 white--text"
          block
          @click="serachRecruitment"
        >
          検索
        </v-btn>
      </v-cols>
    </v-row>
    <br />
    <v-row
      align="center"
      justify="center"
    >
      <v-cols clos="12" md="4" >
        <v-chip-group
          v-for="tag in tags"
          :key="tag.id"
        >
          <v-chip
            color="green darken-1"
            class="white--text"
          >
            <v-icon left>
              fa fa-seedling
            </v-icon>
            {{ tag.value }}
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
    tags: {
      required: true,
    }
  },
  data () {
    return {
      keyword: '',
      resultData:[]
    }
  },
  methods: {
    async serachRecruitment() {
      try {
        const response = await axios.get('api/recruitments/search', { search: this.resultData } );
        console.log(response);
        this.resultData = response.data;
        //console.log(this.resultData);
        //this.$emit('search-result', this.resultData);
      } catch (err) {
        console.log(err);
      }
    },
    //async serachRecruitment() {
  //     // const response = await axios.get('api', this.keyword);
  //     //responseに格納されたデータ型の確認 [ {} ] 配列としてobjectに格納されていはず。
  //     //なのでここで求められることは配列を回しながら、データを格納する・
  //     // props.recruitment = {

  //     // }
  //     //格納したデータをhomeに渡す
  //     //this.$emit('snd-recuruitment-value',props.data );
  //     //最後にキーワードを空にする
  //     //this.keyword = "";
  //   }
  // }
  }
};
</script>

<style>
</style>
