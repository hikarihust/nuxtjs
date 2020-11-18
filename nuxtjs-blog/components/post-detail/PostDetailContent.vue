<template>
  <div class="post-detail__content">
    <div class="thumbnail">
      <img src="/assets/images/blog-detail.jpg" alt="blog-title">
    </div>

    <div class="content-padding">
      <!-- Post Detail rich text editor -->
      <div class="rte">
        <p>Markdown is a lightweight markup language with plain-text-formatting syntax. Its design allows it to be converted to many output formats, but the original tool by the same name only supports HTML. Markdown is often used to format readme files, for writing messages in online discussion forums, and to create rich text using a plain text editor.</p>
        <h2>Emphasis</h2>
        <p>Emphasis, aka <i>italics</i>, with asterisks or <u>underscores</u>.</p>
        <p>Strong emphasis, aka bold, with <strong>asterisks</strong> or <strong>underscores</strong>.</p>
        <p>Strikethrough uses two tildes. <del>Scratch this</del>.</p>
        <h2>Code and Syntax Highlighting</h2>
        <p>Inline <code>code</code> has <code>back-ticks around</code> it.</p>
        <p>Blocks of code are either fenced by lines with three back-ticks ```, or are indented with four spaces.
          I recommend only using the fenced code blocks — they’re easier and only they support syntax highlighting.</p>
      </div>
      <!-- End Post Detail rich text editor -->

      <!-- Post Detail Tags -->
      <PostDetailTags />
      <!-- End Post Detail Tags -->

      <!-- Post Detail Comments -->
      <PostComments />
      <!-- End Post Detail Comments -->

    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
