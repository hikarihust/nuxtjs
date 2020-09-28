<template>
  <h1>Client Page - Id: {{ $route.params.clientId }}</h1>
</template>

<script>
export default {
  mounted () {
    console.log(this.$route.params.clientId);
  },
}
</script>

<style>

</style>
