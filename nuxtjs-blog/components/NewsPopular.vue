<template>
  <div class="popular-news section bg-white-blue">
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
            <NewsPopularCard isStyleCard />
            <NewsPopularCard isStyleCard />
          </div>
        </div>
        <div class="popular-news__list--right">
          <div class="popular-news__list--row">
            <NewsPopularCard isStyleCard isStyleRow />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>
  @import url('~/assets/css/popular-news-list.css');
</style>
