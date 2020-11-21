<template>
  <div>
    <h1>Layout Admin</h1>
    <Nuxt />
  </div>
</template>

<script>
import antDesignVue from '@/plugins/ant-design-vue';
export default {
  beforeCreate() {
    antDesignVue();
  },
}
</script>

<style>

</style>
