<template>
  <article class="article-item" :class="classNames">
    <ArticleItemThumbnail />
    <div class="article-item__content">
      <ArticleItemCategories v-if="isStyleCard" />
      <ArticleItemStats v-if="isStyleCard" />
      <ArticleItemTitle />
      <ArticleItemDesc v-if="isStyleCard" />
      <ArticleItemInfor />
    </div>
  </article>
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
    },
  },
  computed: {
    classNames() {
      return {
        'style-card': this.isStyleCard,
        'style-row': this.isStyleRow,
      }
    }
  },
}
</script>

<style>
  @import url('~/assets/css/article-item.css');
</style>
