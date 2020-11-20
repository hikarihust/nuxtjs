<template>
  <div class="tcl-col-6">
    <!-- Nav -->
    <div class="header-nav">
      <main-menus
        :isRoot="true"
        :menuItems="mainMenuItems"
        />
      <ul class="header-nav__lists">

        <li v-if="isLogin" class="user">
          <nuxt-link to="/dashboard">
            <i class="icons ion-person"></i> {{ currentUser.name }}</nuxt-link>
        </li>
        <li v-else class="user">
          <nuxt-link to="/login"><i class="icons ion-person"></i> Tài khoản</nuxt-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapState } from 'vuex';
export default {
  computed: {
    ...mapGetters([
      'mainMenuItems'
    ]),
    ...mapGetters({
      isLogin: 'auth/isLogin'
    }),
    ...mapState({
      currentUser: state => state.auth.currentUser
    })
  },
}
</script>

<style>

</style>
