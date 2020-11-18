<template>
  <div class="post-author" v-if="post">
    <div class="post-author__bg-avatar">
      <nuxt-link v-bind:to="authorLink" class="post-author__avatar">
        <img
          v-bind:src="getAvatar"
          v-bind:alt="post.author_data.nickname"
        />
      </nuxt-link>
    </div>
    <div class="post-author__nickname">
      <nuxt-link v-bind:to="authorLink">{{ post.author_data.nickname }}</nuxt-link>
    </div>
      <p class="post-author__desc">Lorem ipsum, dolor sit amet conse ctetur adipi sicing elit.
      Necessitatibus, vel vero vel vero vel vero vel vero!</p>
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
  computed: {
    ...mapState({
      post: state => state.posts.postDetail
    }),
    authorLink() {
      return `/user/${this.post.author}`;
    },
    getAvatar() {
      if (this.post.author_data.avatar) {
        return this.post.author_data.avatar;
      }

      const userId = this.post.author;
      return `/assets/images/avatar${userId % 4 + 1}.jpg`;
    }
  },
}
</script>

<style>
  @import '~/assets/css/post-author.css';
</style>
