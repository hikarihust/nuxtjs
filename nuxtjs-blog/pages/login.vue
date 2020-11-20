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
                <input type="text" placeholder="Enter Username ...">
              </div>
              <div class="form-control">
                <label for="">Password</label>
                <i class="toggle-password ion-eye"></i>
                <input type="password" placeholder="Enter Password ...">
              </div>
              <div class="d-flex tcl-jc-between tcl-ais-center">
                <button class="btn btn-primary btn-size-large">Submit</button>
                <a href="register.html">Regiter</a>
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
export default {
  middleware: 'notAuthenticated',
}
</script>

<style>
  @import '~/assets/css/login.css';
</style>
