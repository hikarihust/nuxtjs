<template>
  <div class="post-detail__head" v-if="post">
    <div class="tcl-container">
      <h1 class="post-detail__title">{{ post.title.rendered }}</h1>
      <ul class="post-detail__info">
        <li class="item author">
           Đăng bởi <a href="#"><strong>{{ post.author_data.nickname }}</strong></a>
        </li>
        <li class="item date">
          {{ formatDay }}
        </li>
        <li class="item views">
          {{ post.view_count }} <i class="icons ion-ios-eye"></i>
        </li>
        <li class="item comments">
          {{ post.comment_count }} <i class="icons ion-ios-chatbubble"></i>
        </li>
      </ul>
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
  computed: {
    formatDay() {
      let created = this.post.date;
      let createdDayjs = this.$dayjs(created);
      return createdDayjs.format('HH:mm:ss DD/MM/YYYY');
    }
  },
}
</script>

<style>

</style>
