<template>
  <div class="tcl-col-6">
    <!-- Nav -->
    <div class="header-nav">
      <main-menus
        :isRoot="true"
        :menuItems="mainMenuItems"
        />
      <ul class="header-nav__lists">
        <li class="user"><a href="login.html"><i class="icons ion-person"></i> Tài khoản</a></li>
      </ul>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  computed: {
    ...mapGetters([
      'mainMenuItems'
    ])
  },
}
</script>

<style>

</style>
