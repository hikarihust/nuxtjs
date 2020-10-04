<template>
  <div class="articles-list section">
    <div class="tcl-container">
      <MainTitle
        isSearchTitle
        :title="title"
      />
      <!-- Article List -->
      <div v-for="item in articles" :key="item.id" class="tcl-row tcl-jc-center">
        <div class="tcl-col-12 tcl-col-md-8">
          <ArticleItem
            isShowDesc
            isShowCategories
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
import { mapState, mapActions, mapGetters } from 'vuex';
export default {
  watchQuery: ['q'],
  validate ({ query }) {
    if (!query.q || !query.q.trim()) {
      return false;
    }
    return true;
  },
  async asyncData({ store, query }) {
    const queryStr = query.q;
    await store.dispatch('posts/actFetchArticlesList', {
      search: queryStr
    })

    return {
      querySearch: queryStr
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
      return `Khoảng ${this.wpTotal} kết quả tới từ khóa "${this.querySearch}"`;
    }
  },
  data() {
    return {
      isLoading: false,
      querySearch: '',
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
        search: this.querySearch
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
