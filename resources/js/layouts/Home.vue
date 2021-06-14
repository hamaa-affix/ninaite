<template>
    <v-container fluid>
      <v-row>
        <v-col cols="12" 	md="12">
          <v-img
            elevation="5"
            max-height="500"
            max-width="auto"
            src="https://aws-ninaite-prod.s3-ap-northeast-1.amazonaws.com/1-min.png"
          ></v-img>
        </v-col>
      </v-row>
      <v-row>
        <v-col cols="12" md="4">
          <SideContent
            :tags="tagData"

          />
        </v-col>
        <v-col cols="12" md="8">
          <CenterContent
            :recuitments="recuitmentData"
          />
        </v-col>
      </v-row>
      <!-- <div>
        <ul v-for="data in tagData" :key="data.id">
          <li>{{data.id}}</li>
          <li>{{data.value}}</li>
        </ul>
      </div> -->
    </v-container>
</template>

<script>
import axios from "axios";
import SideContent from "../components/home_commponents/SideContent";
import CenterContent from "../components/home_commponents/CenterContent";

//homecomenponetに求める要件はrecuretment,tagデータの取得と一覧
//computedでデータを関ししてリアクティブにレンダリングする
export default {
  components: {
    SideContent,
    CenterContent
  },
  data () {
    return {
      recuitmentData: [],
      tagData: []
    };
  },
  methods: {
    async fetchIndexOfHomeData() {
      try {
        const respose = await axios.get('api/home');
        this.recuitmentData = respose.data[0];
        this.tagData = respose.data[1];
      } catch (err) {
        console.log(err);
      }
    },

  },
  mounted() {
    this.fetchIndexOfHomeData()
  }
}
</script>
