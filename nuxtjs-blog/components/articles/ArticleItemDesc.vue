<template>
  <div class="article-item__desc" v-html="getDesc"></div>
</template>

<script>
export default {
  props: {
    desc: {
      type: String,
      default: ''
    },
  },
  computed: {
    getDesc() {
      const text = this.desc.substring(0, 120);

      if (text.indexOf("</p>") === -1) {
        return this.desc.substring(0, 120) + "...</p>";
      }

      return text;
    }
  },
}
</script>

<style>
  .article-item__desc p {
    margin-bottom: 0;
  }
</style>
