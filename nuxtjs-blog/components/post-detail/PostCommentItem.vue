<template>
  <li class="item" v-if="comment">
    <PostCommentSection
      v-bind:comment="comment"
      v-bind:isParent="true"
      v-on:replyEvent="handleReplyEvent"
    />
    <!-- Reply Comments -->
    <ul class="comments">
      <li
        class="item"
        v-for="item in commentsReplyPaging.commentsReply"
        v-bind:key="item.id"
      >
        <PostCommentSection v-bind:comment="item" />
      </li>
    </ul>

    <div class="comments__hidden" v-if="comment.comment_reply_count - commentsReplyPaging.commentsReply.length > 0">
      <a href="#" v-on:click.prevent="handleLoadReplyComments">
        <i class="icons ion-ios-undo"></i>
        Xem thêm {{ comment.comment_reply_count - commentsReplyPaging.commentsReply.length }} câu trả lời
      </a>
    </div>
    <!-- Reply form -->
    <PostCommentsForm
      v-if="isShowFormReply"
      v-on:postCommentEvent="handlePostReplyComment"
      v-bind:placeholder="
        'Trả lời bình luận của ' + comment.author_data.nickname
      "
    />
  </li>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  props: {
    comment: {
      type: Object,
      default: null,
    },
  },
  data() {
    return {
      isShowFormReply: false,
      isLoading: false,
    };
  },
  computed: {
    ...mapState({
      hashCommentsReplyPaging: (state) => state.comment.hashCommentsReplyPaging,
    }),
    parentId() {
      if (!this.comment) {
        return 0;
      }
      return this.comment.id;
    },
    commentsReplyPaging() {
      const key = "reply-parent-" + this.parentId;

      if (this.hashCommentsReplyPaging.hasOwnProperty(key)) {
        return this.hashCommentsReplyPaging[key];
      }

      return {
        curPage: 0,
        wpTotal: 0,
        wpTotalPages: 1,
        commentsReply: [],
      };
    },
    hasMoreCommentsReply() {
      return (
        this.commentsReplyPaging.curPage < this.commentsReplyPaging.wpTotalPages
      );
    },
  },
  methods: {
    ...mapActions({
      actPostNewComment: 'comment/actPostNewComment',
      actFetchCommentsList: "comment/actFetchCommentsList",
    }),
    handleLoadReplyComments() {
      if (this.isLoading || !this.hasMoreCommentsReply) {
        return;
      }

      this.isLoading = true;
      this.actFetchCommentsList({
        curPage: this.commentsReplyPaging.curPage + 1,
        post: this.comment.post,
        parent: this.parentId
      }).then(() => {
        this.isLoading = false;
      });
    },
    handleReplyEvent() {
      this.isShowFormReply = !this.isShowFormReply;
    },
    handlePostReplyComment({ content }) {
      this.actPostNewComment({
        content,
        post: this.comment.post,
        parent: this.parentId,
      })
      .then(res => {
        if (res.ok) {
          this.commentsExclude.push(res.comment.id);
        }
      })
    }
  }
}
</script>

<style>

</style>
