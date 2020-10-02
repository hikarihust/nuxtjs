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
    await store.dispatch('posts/actFetchLatestPost');
  }
}
</script>

<style>
</style>
