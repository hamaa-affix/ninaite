<template>
    <v-container>
      <SideContent />
      <CenterContent />
    </v-container>
</template>

<script>
import SideContent from "../components/home_commponents/SideContent";
import CenterContent from "../components/home_commponents/CenterContent";

export default {
  components: {
    SideContent,
    CenterContent
  }
}
</script>
