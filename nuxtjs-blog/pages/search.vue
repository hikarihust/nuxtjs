<template>
  <div class="articles-list section">
    <div class="tcl-container">
      <div class="main-title main-title__search spacing">
        <h2>4 Results found for "search query"</h2>
      </div>

      <!-- Article List -->
      <div class="tcl-row tcl-jc-center">
        <div class="tcl-col-12 tcl-col-md-8">
          <ArticleItem
            isShowDesc
            isShowCategories
            :isStyleRow="isStyleRow"
            :isStyleCard="isStyleCard"
          />
        </div>
      </div>

      <div class="text-center">
        <AppButton
          isSizeLarge
          type="primary"
          :isLoading="true"
          v-on:click.native="()=>{}"
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
