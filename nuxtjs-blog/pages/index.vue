<template>
  <div class="wrapper-content">
    <NewsLatest />
    <NewsPopular />
    <ArticlesList />
  </div>
</template>

<script>
export default {
  async asyncData({ store }) {
    await Promise.all([
      store.dispatch('posts/actFetchLatestPost'),
      store.dispatch('posts/actFetchPopularPost'),
      store.dispatch('posts/actFetchArticlesList')
    ])
  }
}
</script>

<style>
</style>
