<template>
  <div class="root">
    <header><h1>Header</h1></header>
    <ul>
      <li><nuxt-link to="/scroll/long-page">Long Page</nuxt-link></li>
      <li><nuxt-link to="/scroll/another-long-page">Another Long Page</nuxt-link></li>
      <li><nuxt-link to="/custom-loading">Custom Loading</nuxt-link></li>
    </ul>
    <Nuxt />
    <footer><h1>Footer</h1></footer>
    <notifications group="foo" />
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
export default {
  scrollToTop: true,
}
</script>

<style>
.root {
  padding: 50px;
}
html {
  font-family:
    'Source Sans Pro',
    -apple-system,
    BlinkMacSystemFont,
    'Segoe UI',
    Roboto,
    'Helvetica Neue',
    Arial,
    sans-serif;
  font-size: 16px;
  word-spacing: 1px;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  box-sizing: border-box;
}

  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease;
  }
  .fade-leave-active {
    opacity: 0;
  }

  .fade-enter-active {
    opacity: 1;
  }

  .slide-left-enter-active,
  .slide-left-leave-active {
    transition: all 0.3s ease;
  }

  .slide-left-leave-active {
    opacity: 0;
    transform: translate(-30px, 0);
  }
  .slide-left-enter-active {
    opacity: 1;
    transform: translate(30px, 0);
  }

</style>
