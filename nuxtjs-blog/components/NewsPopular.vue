<template>
  <div class="popular-news section bg-white-blue" v-if="posts.length !== 0">
    <div class="tcl-container">
      <MainTitle
        title="Bài viết phổ biến"
        isViewMore
        viewMoreLink="/login"
        viewMoreText="Xem thêm"
      />
      <div class="popular-news__list spacing">
        <div class="popular-news__list--left">
          <div class="popular-news__list--row">
            <NewsPopularCard :post="posts[0]" isStyleCard />
            <NewsPopularCard :post="posts[1]" isStyleCard />
          </div>
        </div>
        <div class="popular-news__list--right">
          <div class="popular-news__list--row">
            <NewsPopularCard :post="posts[2]" isStyleCard isStyleRow />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex';
export default {
  computed: {
    ...mapState({
      posts: state => state.posts.popularList
    })
  },
}
</script>

<style>
  @import url('~/assets/css/popular-news-list.css');
</style>
