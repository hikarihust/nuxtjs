<template>
  <h2>Custom Loading Page</h2>
</template>

<script>
export default {
  asyncData () {
    return new Promise((resolve, reject) => {
      setTimeout(function () {
        resolve({})
        // reject({ error: 'Co loi xay ra' })
      }, 5000)
    })
  }
}
</script>

<style>

</style>
