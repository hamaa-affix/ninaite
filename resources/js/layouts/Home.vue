<template>
  <main>
    <section>メイン画面</section>
    <SideContent />
    <CenterContent />
  </main>
</template>

<script>
import SideContent from "./components/home_commponents/SideContent";
import CenterContent from "./components/home_commponents/CenterContent";

export default {
  components: {
    SideContent,
    CenterContent
  }
}
</script>
