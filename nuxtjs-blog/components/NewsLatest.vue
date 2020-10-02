<template>
  <div class="latest-news section">
    <div class="tcl-container">
      <MainTitle title="Bài viết mới nhất" />
      <div class="latest-news__list spacing">
        <NewsLatestCard
          v-for="item in posts"
          :post="item"
          :key="item.id"
        />
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
  computed: {
    ...mapState({
      posts: state => state.posts.latestList
    })
  },
}
</script>

<style>
  @import url('~/assets/css/latest-news-list.css');
</style>
