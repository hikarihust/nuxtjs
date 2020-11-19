<template>
  <div class="comments__form" v-if="currentUser">
    <div class="comments__form--control">
      <div class="comments__section--avatar">
        <nuxt-link v-bind:to="authorLink">
          <img v-bind:src="avatar" v-bind:alt="currentUser.name">
        </nuxt-link>
      </div>
      <textarea v-bind:placeholder="placeholder"></textarea>
    </div>
    <div class="text-right">
      <button class="btn btn-default">Submit</button>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex';
export default {
  props: {
    placeholder: {
      type: String,
      default: 'Để lại bình luận của bạn ...'
    },
  },
  computed: {
    ...mapGetters({
      avatar: 'auth/avatar'
    }),
    ...mapState({
      currentUser: state => state.auth.currentUser
    }),
    authorLink() {
      return `/user/${this.currentUser.id}`;
    },
  }
}
</script>

<style>

</style>
