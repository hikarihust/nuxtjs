<template>
  <main class="post-detail">
    <div class="spacing"></div>

    <!-- Post Detail Head -->
    <PostDetailHead />
    <!-- End Post Detail Head -->

    <div class="spacing"></div>

    <!-- Post Detail Wrapper Content -->
    <div class="post-detail__fluid">
      <div class="tcl-container">
        <div class="post-detail__wrapper">

          <!-- Post Detail Content -->
          <PostDetailContent />
          <!-- EndPost Detail Content -->

          <!-- Post Detail Sidebar -->
          <PostDetailSidebar />
          <!-- End Post Detail Sidebar -->

        </div>
      </div>
    </div>
    <!-- End Post Detail Wrapper Content -->

  </main>
</template>

<script>

export default {

}
</script>

<style>
  @import '~/assets/css/post-detail.css';
</style>
