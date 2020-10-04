<template>
  <div class="articles-list section">
    <div class="tcl-container">
      <!-- <div class="main-title main-title__search spacing">
        <h2>4 Results found for "search query"</h2>
      </div> -->
      <MainTitle
        isSearchTitle
        :title="'4 Results found for search query'"
      />
      <!-- Article List -->
      <div v-for="item in articles" :key="item.id" class="tcl-row tcl-jc-center">
        <div class="tcl-col-12 tcl-col-md-8">
          <ArticleItem
            isShowDesc
            isShowCategories
            isStyleRow
            isStyleCard
            :post="item"
          />
        </div>
      </div>

      <div class="text-center">
        <AppButton
          isSizeLarge
          type="primary"
          v-if="hasMoreArticles"
          :isLoading="isLoading"
          v-on:click.native="handleLoadMore"
        >Tải thêm</AppButton>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
export default {
  computed: {
    ...mapState({
      wpTotal: state => state.posts.articlesPaging.wpTotal,
      curPage: state => state.posts.articlesPaging.curPage,
      articles: state => state.posts.articlesPaging.articles,
      wpTotalPages: state => state.posts.articlesPaging.wpTotalPages,
    }),
    hasMoreArticles() {
      return this.curPage < this.wpTotalPages
    }
  },
  data() {
    return {
      isLoading: false
    }
  },
  methods: {
    ...mapActions({
      actFetchArticlesList: 'posts/actFetchArticlesList'
    }),
    handleLoadMore(e) {
      if (this.isLoading || !this.hasMoreArticles) {
        return;
      }

      this.isLoading = true;
      this.actFetchArticlesList({
        curPage: this.curPage + 1,
        search: 'reactjs'
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
