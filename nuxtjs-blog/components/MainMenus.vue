<template>
  <ul :class="classRoot">
    <li v-for="item in menuItems" :key="item.id">
      <a href="#">{{ item.title }}</a>
      <main-menus
        v-if="item.child_items.length !== 0"
        :isRoot="false"
        :menuItems="item.child_items"
      />
    </li>
  </ul>
</template>

<script>
export default {
  name: 'main-menus',
  props: {
    isRoot: {
      type: Boolean,
      default: false
    },
    menuItems: {
      type: Array,
      default: []
    },
  },
  computed: {
    classRoot() {
      return {
        'header-nav__lists': this.isRoot === true
      }
    }
  },
}
</script>

<style>

</style>
