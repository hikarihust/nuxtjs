<template>
  <div>
    <h1>Demo AsyncData {{ counter }}</h1>
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
      counter: 10,
      listPosts: [],
      listCategories: []
    }
  },
  /*
  asyncData({$axios}) {
    // console.log(Object.keys(context));
    // console.log($axios);
    return $axios.$get("http://localhost/wp-api-test/wp-json/wp/v2/categories")
      .then(data => {
        console.log(data);
        return {
          listCategories: data
        }
      })

    // return new Promise((resolve, reject) => {
    //   setTimeout(() => {
    //     resolve({
    //       listNumber: [1, 4, 3, 10]
    //     })
    //   }, 2000);
    // })
  }
  */
  async asyncData({ $axios }) {
      const promiseCategories = $axios.get("http://localhost/wp-api-test/wp-json/wp/v2/categories") // 2
      const promisePosts = $axios.get("http://localhost/wp-api-test/wp-json/wp/v2/posts") // 3

      const [resPosts, resCategories] = await Promise.all([
        promisePosts,
        promiseCategories,
      ])

      return {
        listPosts: resPosts.data,
        listCategories: resCategories.data
      }
  }
}
</script>

<style>

</style>
