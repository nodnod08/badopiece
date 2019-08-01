<template>
  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-form">
          <div class="text-center mb-3">
            <img height="100" class="align-content" :src="'storage/img/core-img/logo3.png'" alt />
          </div>
          <form>
            <div class="form-group">
              <label>Username</label>
              <input type="email" class="form-control form-control-sm" placeholder="Username" />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control form-control-sm" placeholder="Password" />
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" /> Remember Me
              </label>
              <label class="pull-right">
                <a href="#">Forgotten Password?</a>
              </label>
            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {};
  },
  methods: {},
  created() {}
};
</script>
<style>
</style>