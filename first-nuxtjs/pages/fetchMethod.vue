<template>
  <div>
    <h1>Demo Fetch Method</h1>
    <nuxt-link to="/">Trang Chu</nuxt-link>
    <ul>
      <li v-for="item in listCategories" v-bind:key="item.id">{{ item.name }}</li>
    </ul>
    <DemoFetchComponent />
  </div>
</template>

<script>
import DemoFetchComponent from '@/components/DemoFetchComponent';
export default {
  layout: 'fetch-data',
  components: {
    DemoFetchComponent,
  },
  data() {
    return {
      listCategories: []
    }
  },
  async asyncData({ store, $axios }) {
    // console.log("asyncData run", Object.keys(store));
    const data = await $axios.$get("http://localhost/wp-api-test/wp-json/wp/v2/posts")
    store.dispatch('posts/actSetListPosts', data)
  },
  created() {
    console.log("created run");
  },
  async fetch() {
    /*
    console.log("fetch run", this.$store.dispatch);
    const data = await this.$axios.$get("http://localhost/wp-api-test/wp-json/wp/v2/categories")
    this.$store.dispatch('posts/actSetListPosts', data);
    */
  }
}
</script>

<style>

</style>
