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
            :recruitment="recruitmentDada"
            :tags="tagData"
          />
        </v-col>
        <v-col cols="12" md="8">
          <CenterContent />
        </v-col>
      </v-row>
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
      recruitmentDada: [],
      //   id: "",
      //   img_name: "",
      //   summary: "",
      //   content: "",
      //   farm: {
      //     id: ""
      //   }
      tagData: [{
        id: "",
        value: "",
      }]
    };
  },
  methods: {
    async fetchRecruitment() {
      const respose = await axios.get('api/any');
      //取得した一覧表示を配列としてデータが格納しているか確認が必要。
      this.recruitmentDada = response.data;
    }
  },
}
</script>
