<template>
  <article v-if="post" class="article-item" :class="classNames">
    <ArticleItemThumbnail
      :slug="getSlug"
      :title="post.title.rendered"
      :thumbnail="post.featured_media_url"
    />
    <div class="article-item__content">
      <ArticleItemCategories v-if="isShowCategories" />
      <ArticleItemStats v-if="isShowCategories" />
      <ArticleItemTitle
        :slug="getSlug"
        :title="post.title.rendered"
      />
      <ArticleItemDesc :desc="post.excerpt.rendered" v-if="isShowDesc" />
      <ArticleItemInfor
        :isShowAvatar="isShowAvatar"
        :created="post.date"
        :userId="post.author"
        :nickname="post.author_data.nickname"
        :avatar="post.author_data.avatar"
      />
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
    },
    getSlug() {
      return '/post/' + this.post.slug
    }
  },
}
</script>

<style>
  @import url('~/assets/css/article-item.css');
</style>
