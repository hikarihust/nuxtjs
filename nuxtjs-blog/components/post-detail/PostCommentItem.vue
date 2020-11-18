<template>
  <li class="item">
    <PostCommentSection />
    <!-- Reply Comments -->
    <ul class="comments">
      <li class="item">
        <PostCommentSection />
      </li>
      <li class="item">
        <PostCommentSection />
      </li>
    </ul>

    <!-- Reply form -->
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
  </li>
</template>

<script>
export default {

}
</script>

<style>

</style>
