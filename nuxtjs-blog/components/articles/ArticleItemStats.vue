<template>
  <ul class="article-item__stats">
    <li>
      <i class="icons ion-ios-eye"></i>
      <span class="text">{{ viewCount }}</span>
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    viewCount: {
      type: Number,
      default: 0
    },
  },
}
</script>

<style>

</style>
