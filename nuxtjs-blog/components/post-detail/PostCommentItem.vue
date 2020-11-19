<template>
  <li class="item" v-if="comment">
    <PostCommentSection
      v-bind:comment="comment"
    />
    <div class="comments__hidden" v-if="comment.comment_reply_count !== 0">
      <a href="#">
        <i class="icons ion-ios-undo"></i>
        Xem thêm {{ comment.comment_reply_count }} câu trả lời
      </a>
    </div>

    <div class="comments__hidden" v-else>
      <a href="#">
        <i class="icons ion-ios-undo"></i>
        Trả lời bình luận
      </a>
    </div>
    <!-- Reply Comments -->
    <!-- <ul class="comments">
      <li class="item">
        <PostCommentSection />
      </li>
      <li class="item">
        <PostCommentSection />
      </li>
    </ul> -->

    <!-- Reply form -->
    <!-- <div class="comments__form">
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
    </div> -->
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
      if(this.parentId === 0) {
        return null;
      }
      const key = "reply-parent-" + this.parentId;

      if (this.hashCommentsReplyPaging.hasOwnProperty(key)) {
        return this.hashCommentsReplyPaging[key];
      }

      return {
        curPage: 1,
        wpTotal: 0,
        wpTotalPages: 0,
        commentsReply: [],
      };
    },
  }
}
</script>

<style>

</style>
