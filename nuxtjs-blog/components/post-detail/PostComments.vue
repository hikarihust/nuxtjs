<template>
  <div class="post-detail__comments">
    <div class="comments__form">
      <div class="comments__form--control">
        <div class="comments__section--avatar">
          <a href="#">
            <img src="/assets/images/avatar1.jpg" alt="">
          </a>
        </div>
        <textarea name=""></textarea>
      </div>
      <div class="text-right">
        <button class="btn btn-default">Submit</button>
      </div>
    </div>
    <p>{{ comment_count }} Comments</p>
    <ul class="comments">
      <PostCommentItem
         v-for="item in comments"
         v-bind:key="item.id"
         v-bind:comment="item"
      />
    </ul>
    <div class="text-center">
      <AppButton
        type="primary"
        v-if="hasMoreComments"
        v-bind:isLoading="isLoading"
        v-on:click.native="handleLoadMore"
      >Tải thêm bình luận</AppButton>

    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
export default {
  props: {
    comment_count: {
      type: Number,
      default: 0
    },
    postId: {
      type: Number,
      default: 0
    }
  },
  data() {
    return {
      isLoading: false
    }
  },
  computed: {
    ...mapState({
      wpTotal: state => state.comment.commentsPaging.wpTotal,
      curPage: state => state.comment.commentsPaging.curPage,
      comments: state => state.comment.commentsPaging.comments,
      wpTotalPages: state => state.comment.commentsPaging.wpTotalPages,
    }),
    hasMoreComments() {
      return this.curPage < this.wpTotalPages
    }
  },
  methods: {
    ...mapActions({
      actFetchCommentsList: 'comment/actFetchCommentsList',
    }),
    handleLoadMore() {
      if (this.isLoading || !this.hasMoreComments) {
        return;
      }

      this.isLoading = true;
      this.actFetchCommentsList({
        curPage: this.curPage + 1,
        post: this.postId
      })
      .then(() => {
        this.isLoading = false
      })
    },
  }
}
</script>

<style>
  @import '~/assets/css/comments.css';
</style>
