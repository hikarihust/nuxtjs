<template>
  <div class="post-detail__content" v-if="post">
    <div class="thumbnail">
      <img v-bind:src="post.featured_media_url" alt="blog-title">
    </div>

    <div class="content-padding">
      <!-- Post Detail rich text editor -->
      <div class="rte" v-html="post.content.rendered">
      </div>
      <!-- End Post Detail rich text editor -->

      <!-- Post Detail Tags -->
      <PostDetailTags v-bind:post="post" />
      <!-- End Post Detail Tags -->

      <!-- Post Detail Comments -->
      <PostComments />
      <!-- End Post Detail Comments -->

    </div>
  </div>
</template>

<script>
export default {
  props: {
    post: {
      type: Object,
      default: null
    },
  },
}
</script>

<style>

</style>
