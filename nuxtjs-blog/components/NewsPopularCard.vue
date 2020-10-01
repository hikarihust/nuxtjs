<template>
  <div class="popular-news__list--card">
    <ArticleItem
      :isStyleRow="isStyleRow"
      :isStyleCard="isStyleCard"
    />
  </div>
</template>

<script>
export default {
  props: {
    isStyleCard: {
      type: Boolean,
      default: false
    },
    isStyleRow: {
      type: Boolean,
      default: false
    }
  },
}
</script>

<style>

</style>
