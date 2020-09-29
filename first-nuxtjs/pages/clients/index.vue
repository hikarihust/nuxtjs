<template>
  <h1>Client Page</h1>
</template>

<script>
export default {
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
