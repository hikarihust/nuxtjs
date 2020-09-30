<template>
  <div>
    <h1>Demo Fetch Method</h1>
    <nuxt-link to="/">Trang Chu</nuxt-link>
    <ul>
      <li v-for="item in listCategories" v-bind:key="item.id">{{ item.name }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  layout: 'fetch-data',
  data() {
    return {
      listCategories: []
    }
  },
  async asyncData({ store, $axios }) {
    // console.log("asyncData run", this);
  },
  created() {
    // console.log("created run", this);
  },
  async fetch() {
    // console.log("fetch run", this);
    const data = await this.$axios.$get("http://localhost/wp-api-test/wp-json/wp/v2/categories")
    this.listCategories = data
  }
}
</script>

<style>

</style>
