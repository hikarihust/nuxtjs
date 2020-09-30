<template>
  <div>
    <h1>Demo Fetch Components - Tags: {{ listTags.length }}</h1>
  </div>
</template>

<script>
export default {
  data() {
    return {
      listTags: []
    }
  },
  created () {
    console.log("created demo fetch component run");
  },
  async fetch() {
    console.log("fetch demo fetch component run");
    const data = await this.$axios.$get("http://localhost/wp-api-test/wp-json/wp/v2/tags")
    this.listTags = data;
  }
}
</script>

<style>

</style>
