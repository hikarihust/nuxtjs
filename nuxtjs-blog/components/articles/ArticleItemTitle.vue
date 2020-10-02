<template>
  <h2 class="article-item__title">
    <nuxt-link v-bind:to="slug">{{ title }}</nuxt-link>
  </h2>
</template>

<script>
export default {
  props: {
    slug: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    }
  },
}
</script>

<style>

</style>
