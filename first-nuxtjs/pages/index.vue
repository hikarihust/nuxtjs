<template>
  <div class="container">
    <Logo />
    <ul>
      <li v-for="item in listCategories" v-bind:key="item.id">{{ item.name }} - slug: {{ item.slug }}</li>
    </ul>
  </div>
</template>

<script>
import Logo from '@/components/Logo';
export default {
  components: {
    Logo,
  },
  data() {
    return {
      listCategories: []
    }
  },
  created () {
    // console.log("this.$axios", this.$axios)
    this.$axios.$get('http://localhost/wp-api-test/wp-json/wp/v2/categories')
      .then(data => {
        console.log("res = ", data);
      })

    /*
    fetch('http://localhost/wp-api-test/wp-json/wp/v2/categories')
      .then(res => {
        return res.json()
      })
      .then(data => {
        this.listCategories = data
      })
    */
  }
}
</script>

<style>
</style>
