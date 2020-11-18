<template>
  <main class="post-detail">
    <div class="spacing"></div>

    <!-- Post Detail Head -->
    <PostDetailHead v-bind:post="post" />
    <!-- End Post Detail Head -->

    <div class="spacing"></div>

    <!-- Post Detail Wrapper Content -->
    <div class="post-detail__fluid">
      <div class="tcl-container">
        <div class="post-detail__wrapper">

          <!-- Post Detail Content -->
          <PostDetailContent v-bind:post="post" />
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
import { mapState } from 'vuex';
export default {
  validate ({ params, query }) {
    if(!params.slug || !params.slug.trim()) {
      return false;
    }
    return true;
  },
  async asyncData({ params, store }) {
    const slug = params.slug;
    const res = await store.dispatch('posts/actFetchArticleBySlug', { slug });

    if (res.ok) {
      const postDetail= res.post;
      const post = postDetail.id; // postId, authorId
      const authorId = postDetail.author;

      await Promise.all([
        store.dispatch('comment/actFetchCommentsList', { post }),
        store.dispatch('posts/actFetchRelatedPosts', { authorId })
      ]);
    }
  },
  computed: {
    ...mapState({
      post: state => state.posts.postDetail
    })
  },
}
</script>

<style>
  @import '~/assets/css/post-detail.css';
</style>
