<template>
  <div>
    <h1>Clients Page <strong>{{ JSON.stringify(listPosts) }}</strong></h1>
    <button v-on:click="handleAddItem">Add Item</button>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
export default {
  head: {
    title: 'Clients Page'
  },
  mounted () {
    setTimeout(() => {
      this.$notify({
        group: 'foo', //
        title: 'Important message',
        text: 'Hello user! This is a notification!'
      });
      console.log(this.$abc('Hello world.'));
      // hello('Hello world')
    }, 2000);
  },
  computed: {
    ...mapState({
      listPosts: state => state.posts.list
    })
  },
  methods: {
    ...mapActions({
      'actAddPosts': 'posts/actAddPosts'
    }),
    handleAddItem() {
      this.actAddPosts('Item 2');
    }
  },
}
</script>

<style>

</style>
