<template>
  <div class="latest-news__card" v-if="post">
    <ArticleItem :post="post" />
  </div>
</template>

<script>
export default {
  props: {
    post: {
      type: Object,
      default: null
    },
  }
}
</script>

<style>

</style>
