<template>
  <h1>Client Page</h1>
</template>

<script>
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
}
</script>

<style>

</style>
