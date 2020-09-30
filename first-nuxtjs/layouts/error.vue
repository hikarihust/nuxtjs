<template>
  <div class="container">
    <h1 v-if="error.statusCode === 404">Page not  {{ error.statusCode }}</h1>
    <h1 v-else-if="error.statusCode === 405">Method Not Allowed  {{ error.statusCode }}</h1>
    <h1 v-else>An error occurred</h1>
    <p>{{ error.message }}</p>
    <NuxtLink to="/">Home page</NuxtLink>
  </div>
</template>

<script>
export default {
  props: ['error'],
}
</script>
