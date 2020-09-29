<template>
  <h1>UserId Page</h1>
</template>

<script>
export default {
  validate({ params }) {
    // '20a' -> NaN -> false -> !false -> true
    if(!Number(params.userId)) {
      return false;
    }
    return true;
  }
}
</script>

<style>

</style>
