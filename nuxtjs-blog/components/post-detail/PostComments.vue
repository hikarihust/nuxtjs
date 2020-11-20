<template>
  <div class="post-detail__comments">
    <PostCommentsForm
      v-if="isLogin"
      v-on:postCommentEvent="handlePostParentComment"
    />
    <div v-else>
      <p>Vui lòng <nuxt-link to="/login">đăng nhập</nuxt-link> để đăng bình luận mới</p>
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
import { mapState, mapActions, mapGetters } from 'vuex';
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
      isLoading: false,
      commentsExclude: []
    }
  },
  computed: {
    ...mapGetters({
      isLogin: 'auth/isLogin'
    }),
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
      actPostNewComment: 'comment/actPostNewComment',
      actFetchCommentsList: 'comment/actFetchCommentsList',
    }),
    handleLoadMore() {
      if (this.isLoading || !this.hasMoreComments) {
        return;
      }

      this.isLoading = true;
      this.actFetchCommentsList({
        curPage: this.curPage + 1,
        post: this.postId,
        exclude: this.commentsExclude
      })
      .then(() => {
        this.isLoading = false
      })
    },
    handlePostParentComment({ content, callback }) {
      this.actPostNewComment({
        content,
        post: this.postId
      })
      .then(res => {
        callback();
        if (res.ok) {
          this.commentsExclude.push(res.comment.id);
        } else {
          switch (res.error) {
            case "comment_duplicate":
              alert("Bình luận bị trùng, vui lòng kiểm tra lại!");
              break;
            case "comment_flood":
              alert("Nghi vấn spam, vui lòng bình luận chậm lại!");
              break;
            default:
              alert(res.error);
              break;
          }
        }
      })
    }
  }
}
</script>

<style>
  @import '~/assets/css/comments.css';
</style>
