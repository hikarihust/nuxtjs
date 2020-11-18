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
    <p>20 Comments</p>
    <ul class="comments">
      <PostCommentItem />
      <PostCommentItem />
      <PostCommentItem />
    </ul>
    <div class="text-center">
      <AppButton
        type="primary"
        v-bind:isLoading="true"
      >Tải thêm bình luận</AppButton>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>
  @import '~/assets/css/comments.css';
</style>
