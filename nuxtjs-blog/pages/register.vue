<template>
  <main class="login">
    <div class="spacing"></div>
    <div class="tcl-container">
      <div class="tcl-row">
        <div class="tcl-col-12 tcl-col-sm-6 block-center">
          <h1 class="form-title text-center">Register</h1>
          <div class="form-login-register">
            <form action="">
              <div class="form-control">
                <label for="">Username</label>
                <input
                  v-model="username"
                  type="text"
                  placeholder="Enter Username ..."
                />
              </div>
              <div class="form-control">
                <label for="">Email</label>
                <input
                  v-model="email"
                  type="text"
                  placeholder="Enter email ..."
                />
              </div>
              <div class="form-control">
                <label for="">Nickname</label>
                <input
                  v-model="nickname"
                  type="text"
                  placeholder="Enter nickname ..."
                />
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
                  placeholder="Enter Password ..."
                />
              </div>
              <div class="d-flex tcl-jc-between tcl-ais-center">
                <AppButton
                  isSizeLarge
                  type="primary"
                  v-bind:isLoading="isLoading"
                  v-on:click.native="handleSubmit"
                >Đăng ký</AppButton>
                <nuxt-link to="/login">Đã có tài khoản?</nuxt-link>
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
      email: '',
      nickname: '',
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
      actRegister: 'auth/actRegister'
    }),
    handleSubmit(e) {
      e.preventDefault();
      this.isLoading = true;
      if (this.username && this.password) {
        this.actRegister({
          email: this.email,
          username: this.username,
          password: this.password,
          nickname: this.nickname
        })
        .then(res => {
          if (res.ok) {
            alert('Dang ky thanh cong');
            this.$router.push('/');
          } else {
            alert("Dang ky that bai." +  res.error); // TO DO:
          }
          this.isLoading = false;
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
