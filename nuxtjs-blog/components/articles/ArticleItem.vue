<template>
  <article v-if="post" class="article-item" :class="classNames">
    <ArticleItemThumbnail />
    <div class="article-item__content">
      <ArticleItemCategories v-if="isShowCategories" />
      <ArticleItemStats v-if="isShowCategories" />
      <ArticleItemTitle />
      <ArticleItemDesc v-if="isShowDesc" />
      <ArticleItemInfor :isShowAvatar="isShowAvatar" />
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
    isShowDesc: {
      type: Boolean,
      default: false
    },
    isShowCategories: {
      type: Boolean,
      default: false
    },
    isShowAvatar: {
      type: Boolean,
      default: true,
    },
    post: {
      type: Object,
      default: null
    }
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
