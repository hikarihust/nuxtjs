<template>
  <div class="articles-list section">
    <div class="tcl-container">
      <MainTitle
        isSearchTitle
        v-bind:title="title"
      />

      <div
        v-for="item in articles"
        v-bind:key="item.id"
        class="tcl-row tcl-jc-center"
      >
        <div class="tcl-col-12 tcl-col-md-8">
          <ArticleItem
            isShowDesc
            isShowCategories
            isStyleCard
            v-bind:post="item"
          />
        </div>
      </div>

      <div class="text-center">
        <AppButton
          isSizeLarge
          type="primary"
          v-if="hasMoreArticles"
          v-bind:isLoading="isLoading"
          v-on:click.native="handleLoadMore"
        >Tải thêm</AppButton>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from 'vuex';
export default {
  validate ({ params, query }) {
    if(!params.slug || !params.slug.trim()) {
      return false;
    }
    return true;
  },
  async asyncData({ params, store }) {
    const slug = params.slug;
    const res = await store.dispatch('category/actGetCategoryBySlug', { slug });

    if(res && res.ok) {
      await store.dispatch('posts/actFetchArticlesList', {
        categories: [res.data.id]
      });
      return {
        category: res.data
      }
    }
  },
  data() {
    return {
      isLoading: false,
      category: null,
    }
  },
  computed: {
    ...mapState({
      wpTotal: state => state.posts.articlesPaging.wpTotal,
      curPage: state => state.posts.articlesPaging.curPage,
      wpTotalPages: state => state.posts.articlesPaging.wpTotalPages,
    }),
    ...mapGetters({
      articles: 'posts/getArticleList'
    }),
    hasMoreArticles() {
      return this.curPage < this.wpTotalPages
    },
    title() {
      if(this.category) {
        return `Có ${this.wpTotal || 0} kết quả với danh mục "${this.category.name}"`
      }
      return "Trang này không tồn tại";
    }
  },
  methods: {
    ...mapActions({
      actFetchArticlesList: 'posts/actFetchArticlesList'
    }),
    handleLoadMore() {
      if (this.isLoading || !this.hasMoreArticles) {
        return;
      }

      this.isLoading = true;
      this.actFetchArticlesList({
        curPage: this.curPage + 1,
        categories: [this.category.id]
      })
      .then(() => {
        this.isLoading = false
      })
    }
  },
}
</script>

<style>

</style>
