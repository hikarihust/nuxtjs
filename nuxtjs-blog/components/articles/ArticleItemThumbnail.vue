<template>
  <div class="article-item__thumbnail">
    <nuxt-link v-bind:to="slug">
      <img v-bind:src="thumbnail" v-bind:alt="title">
    </nuxt-link>
  </div>
</template>

<script>
export default {
  props: {
    slug: {
      type: String,
      default: ''
    },
    thumbnail: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    }
  }
}
</script>

<style>

</style>
