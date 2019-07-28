<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#59ffa4" />
      </div>
    </div>
    <div class="signin">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="signin-container">
              <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-6 col-sm-12">
                  <div class="signin-box">
                    <br />
                    <h4 class="text-center">Log in or Create an Account</h4>
                    <h6 v-if="error" class="invalid text-center">Username or password is incorrect</h6>
                    <form v-on:submit.prevent="login">
                      <label>Email</label>
                      <input
                        type="text"
                        v-model="email"
                        name="email"
                        v-validate="'email|required'"
                        :class="errors.first('email') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                      />
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
                      />
                      <small
                        class="invalid-feedback"
                        v-if="errors.first('password')"
                      >{{ errors.first('password') }}</small>
                      <br />
                      <div class="text-center">
                        <button type="submit" class="text-center btn btn-outline-dark btn-sm">Login</button>
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
                      <br />
                      <br />
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
import { RadarSpinner } from "epic-spinners";
export default {
  props: ["auth"],
  data() {
    return {
      email: "",
      password: "",
      loading: false,
      error: false,
      cartCount: ""
    };
  },
  components: {
    RadarSpinner
  },
  created() {
    this.countCart();
  },
  methods: {
    login: function() {
      this.$validator.validateAll().then(async result => {
        if (result) {
          this.loading = true;
          await axios
            .post("/login", {
              email: this.email,
              password: this.password
            })
            .then(response => {
              if (response.data == "ok") {
                this.loading = false;
                this.error = false;
                window.location.href = "/";
              } else {
                this.loading = false;
                this.error = true;
              }
            });
        } else {
        }
      });
    },
    countCart: async function() {
      axios.get("/countCart").then(response => {
        this.cartCount = response.data;
        // console.log(response.data);
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

.invalid {
  color: red;
}
</style>
