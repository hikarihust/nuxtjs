<template>
  <div>
    <ul>
      <li>
        <nuxt-link
          activeClass="active"
          exactActiveClass="exact-active"
          to="/users">Users Page</nuxt-link></li>
      <li>
        <nuxt-link
          activeClass="active"
          exactActiveClass="exact-active"
          to="/users/20" tag="button">User Detail</nuxt-link></li>
      <li>
        <nuxt-link
          activeClass="active"
          exactActiveClass="exact-active"
          to="/users/settings">Users Settings</nuxt-link></li>
    </ul>
    <h1>Users Page - users.vue</h1>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi ipsa beatae molestiae
      quidem facere adipisci, omnis veniam iste similique non obcaecati, quos magnam cum asperiores,
      consequuntur necessitatibus modi cumque! Quae?
    </p>
    <nuxt-child />
  </div>
</template>

<script>
export default {
  middleware: [ 'check-visit' ],
  layout(context) {
    console.log("[layout users.vue]", Object.keys(context));
    return context.isMobile ? 'mobile' : 'admin';
  }
}
</script>

<style>
  .exact-active {
    color: red;
  }
</style>
