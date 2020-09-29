<template>
  <div class="long-page">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <div class="box"></div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <div class="box"></div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <div class="center">
      <nuxt-link to="/scroll/another-long-page">Another Long Page</nuxt-link>
    </div>
  </div>
</template>

<script>
export default {
  transition: 'slide-left'
}
</script>

<style scoped>
  .box {
    height: 100vh;
    background-color: aquamarine;
  }
  .long-page {
    padding: 50px;
  }
  .center {
    text-align: center;
    padding: 30px;
  }
</style>
