<template>
  <div class="articles-list section">
    <div class="tcl-container">
      <MainTitle
        title="Danh sách bài viết"
        isViewMore
        viewMoreLink="/login"
        viewMoreText="Xem thêm"
      />
      <div class="tcl-row">
        <div v-for="item in articles" :key="item.id" class="tcl-col-12 tcl-col-md-6">
          <ArticleItem
            isStyleCard
            :post="item"
            :isShowAvatar="false"
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
        curPage: this.curPage + 1
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
