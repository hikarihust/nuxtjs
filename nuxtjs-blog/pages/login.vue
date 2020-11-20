<template>
  <main class="login">
    <div class="spacing"></div>
    <div class="tcl-container">
      <div class="tcl-row">
        <div class="tcl-col-12 tcl-col-sm-6 block-center">
          <h1 class="form-title text-center">Login</h1>
          <div class="form-login-register">
            <form action="">
              <div class="form-control">
                <label for="">Username</label>
                <input
                  v-model="username"
                  type="text"
                  placeholder="Enter Username ...">
              </div>
              <div class="form-control">
                <label for="">Password</label>
                <i
                  class="toggle-password"
                  v-bind:class="togglePassword"
                  v-on:click="handleShowPassword"
                ></i>
                <input
                  v-model="password"
                  v-bind:type="typePassword"
                  placeholder="Enter Password ...">
              </div>
              <div class="d-flex tcl-jc-between tcl-ais-center">
                <AppButton
                  isSizeLarge
                  type="primary"
                  v-bind:isLoading="isLoading"
                  v-on:click.native="handleSubmit"
                >Đăng nhập</AppButton>
                <nuxt-link to="/register">Đăng ký</nuxt-link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="spacing"></div>
  </main>
</template>

<script>
import { mapActions } from 'vuex';
export default {
  middleware: 'notAuthenticated',
  data() {
    return {
      isLoading: false,
      username: '',
      password: '',
      isShowPassword: false
    }
  },
  computed: {
    typePassword() {
      if (this.isShowPassword) {
        return 'text';
      }
      return 'password';
    },
    togglePassword() {
      return {
        'ion-eye': !this.isShowPassword,
        'ion-eye-disabled': this.isShowPassword
      }
    }
  },
  methods: {
    ...mapActions({
      actLogin: 'auth/actLogin'
    }),
    handleSubmit(e) {
      e.preventDefault();

      if (this.username && this.password) {
        this.actLogin({
          username: this.username,
          password: this.password
        })
        .then(res => {
          if (res.ok) {
            alert('Dang nhap thanh cong');
            this.$router.push('/');
          } else {
            alert("Dang nhap that bai.");
            // switch (res.error) {
            //   case "[jwt_auth] incorrect_password":
            //     alert("Mat khau khong hop le!");
            //     break;
            //   case "[jwt_auth] invalid_username":
            //     alert("Username khong hop le");
            //     break;
            //   default:
            //     alert("Dang nhap that bai.")
            //     break;
            // }
          }
        })
      }
    },
    handleShowPassword() {
      this.isShowPassword = !this.isShowPassword
    }
  }
}
</script>

<style>
  @import '~/assets/css/login.css';
</style>
