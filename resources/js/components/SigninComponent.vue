<template>
  <div>
    <navbar-component :username="auth"></navbar-component>
    <div class="signin">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="signin-container">
              <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-6 col-sm-12">
                  <div class="signin-box">
                    <br>
                    <h4 class="text-center">Log in or Create an Account</h4>
                    <br>
                    <form v-on:submit.prevent="login">
                      <label>Email</label>
                      <input
                        type="text"
                        v-model="email"
                        name="email"
                        v-validate="'email|required'"
                        :class="errors.first('email') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                      >
                      <small
                        class="invalid-feedback"
                        v-if="errors.first('email')"
                      >{{ errors.first('email') }}</small>
                      <label>Password</label>
                      <input
                        type="password"
                        v-model="password"
                        name="password"
                        v-validate="'required'"
                        :class="errors.first('password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                      >
                      <small
                        class="invalid-feedback"
                        v-if="errors.first('password')"
                      >{{ errors.first('password') }}</small>
                      <br>
                      <div class="text-center">
                        <button ttype="submit" class="text-center btn btn-outline-dark btn-sm">Login</button>
                      </div>
                    </form>
                    <h6 class="text-center">or</h6>
                    <div class="row social-box">
                      <div class="col-lg-6 col-md-6">
                        <a :href="'/redirect/google'">
                          <button class="social g text-center">
                            <i class="fab fa-google-plus-g"></i> Login with Google
                          </button>
                        </a>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <button class="social fb text-center">
                          <i class="fab fa-facebook-square"></i> Login with Facebook
                        </button>
                      </div>
                      <br>
                      <br>
                      <div class="col-lg-12 col-md-12">
                        <p>
                          Don't have an account?
                          <a :href="'/signup'">click</a> here to create.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
export default {
  props: ["auth"],
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    login: function() {
      this.$validator.validateAll().then(async result => {
        if (result) {
          await axios
            .post("/login", {
              email: this.email,
              password: this.password
            })
            .then(response => {
              if (response.data == "ok") {
                window.location.href = "/";
              } else {
              }
            });
        } else {
        }
      });
    }
  }
};
</script>

<style>
.signin {
  margin-top: 90px;
  width: 100%;
}
li {
  list-style: none;
}
.signin-container {
  margin-top: 50px;
  margin-bottom: 50px;
}

.signin-box {
  border: 0.5px solid #404040;
}

form,
.social-box {
  padding: 3%;
}

.social {
  width: 100%;
  border: 0.5px solid #fff;
  padding: 4px 7px;
}

.social:focus {
  border: none;
  outline: none;
}

.g {
  background: #db4437;
  color: #fff;
}

.fb {
  background: #4267b2;
  color: #fff;
}
</style>
