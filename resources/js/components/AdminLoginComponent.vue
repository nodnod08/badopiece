<template>
  <div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
      <div class="login-content">
        <div class="login-form">
          <div class="text-center mb-3">
            <img height="100" class="align-content" :src="'storage/img/core-img/logo3.png'" alt />
          </div>
          <form v-on:submit.prevent="attempt">
            <div class="text-center">
              <small v-if="error" class="error">Your username or password is incorrect.</small>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input
                v-model="username"
                v-validate="'required'"
                name="username"
                type="username"
                @keyup.enter="attempt()"
                :class="(errors.first('username')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                placeholder="Username"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('username')"
              >{{ errors.first('username') }}</small>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input
                v-model="password"
                v-validate="'required'"
                name="password"
                type="password"
                @keyup.enter="attempt()"
                :class="(errors.first('password')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                placeholder="Password"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('password')"
              >{{ errors.first('password') }}</small>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" /> Remember Me
              </label>
              <label class="pull-right">
                <a href="#">Forgotten Password?</a>
              </label>
            </div>
            <button
              v-on:click="attempt()"
              type="submit"
              class="btn btn-success btn-flat m-b-30 m-t-30"
            >Sign in</button>
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
    return {
      username: "",
      password: "",
      error: false
    };
  },
  methods: {
    attempt: async function() {
      this.$validator.validateAll().then(async result => {
        if (result) {
          axios
            .post("/admin_attempt", {
              username: this.username,
              password: this.password
            })
            .then(response => {
              if (response.data == 1) {
                console.log(response.data);
                this.error = false;
                window.location.href = "/admin_port";
              } else {
                this.error = true;
              }
            });
        }
      });
    }
  },
  created() {}
};
</script>
<style>
.error {
  color: red;
}
</style>