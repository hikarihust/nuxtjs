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
        <div class="tcl-col-12 tcl-col-md-6">
          <ArticleItem
            isStyleCard
            :isShowAvatar="false"
          />
        </div>
        <div class="tcl-col-12 tcl-col-md-6">
          <ArticleItem
            isStyleCard
            :isShowAvatar="false"
          />
        </div>
        <div class="tcl-col-12 tcl-col-md-6">
          <ArticleItem
            isStyleCard
            :isShowAvatar="false"
          />
        </div>
        <div class="tcl-col-12 tcl-col-md-6">
          <ArticleItem
            isStyleCard
            :isShowAvatar="false"
          />
        </div>
      </div>
      <div class="text-center">
        <AppButton
          isSizeLarge
          type="primary"
          :isLoading="false"
        >Tải thêm</AppButton>
      </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
