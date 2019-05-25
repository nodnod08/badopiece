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
                    <h4 class="text-center">Create your Account</h4>
                    <br>
                    <form v-on:submit.prevent="login" autocomplete="off">
                      <div class="row">
                        <div class="col-lg-6">
                          <label>Firstname</label>
                          <input
                            type="text"
                            v-model="firstname"
                            name="firstname"
                            v-validate="'required'"
                            :class="errors.first('firstname') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                          >
                          <small
                            class="invalid-feedback"
                            v-if="errors.first('firstname')"
                          >{{ errors.first('firstname') }}</small>
                        </div>
                        <div class="col-lg-6">
                          <label>Lastname</label>
                          <input
                            type="text"
                            v-model="lastname"
                            name="lastname"
                            v-validate="'required'"
                            :class="errors.first('lastname') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                          >
                          <small
                            class="invalid-feedback"
                            v-if="errors.first('lastname')"
                          >{{ errors.first('lastname') }}</small>
                        </div>
                        <div class="col-lg-6">
                          <label>Username</label>
                          <input
                            type="text"
                            v-model="username"
                            name="username"
                            v-validate="'required'"
                            :class="errors.first('username') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                          >
                          <small
                            class="invalid-feedback"
                            v-if="errors.first('username')"
                          >{{ errors.first('username') }}</small>
                        </div>
                        <div class="col-lg-6">
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
                        </div>
                        <div class="col-lg-6">
                          <label>Password</label>
                          <input
                            type="password"
                            v-model="password"
                            name="password"
                            v-validate="'required'"
                            ref="password"
                            :class="errors.first('password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                          >
                          <small
                            class="invalid-feedback"
                            v-if="errors.first('password')"
                          >{{ errors.first('password') }}</small>
                        </div>
                        <div class="col-lg-6">
                          <label>Confirm Password</label>
                          <input
                            type="password"
                            v-model="cpassword"
                            name="confirm_password"
                            v-validate="'required|confirmed:password'"
                            data-vv-as="password"
                            :class="errors.first('confirm_password') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
                          >
                          <small
                            class="invalid-feedback"
                            v-if="errors.first('confirm_password')"
                          >{{ errors.first('confirm_password') }}</small>
                        </div>
                      </div>
                      <br>
                      <div class="text-center">
                        <button
                          type="submit"
                          class="text-center btn btn-outline-dark btn-sm"
                        >Create Account</button>
                      </div>
                    </form>
                    <div class="col-lg-12 col-md-12">
                      <p>
                        Do you already have an Account?
                        <a :href="'/signin'">click</a> here to signin.
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
    <footer-component></footer-component>
  </div>
</template>

<script>
export default {
  props: ["auth"],
  data() {
    return {
      firstname: "",
      lastname: "",
      email: "",
      username: "",
      cpassword: "",
      password: ""
    };
  },
  methods: {
    login: function() {
      this.$validator.validateAll().then(async result => {
        if (result) {
          await axios
            .post("/register", {
              firstname: this.firstname,
              lastname: this.lastname,
              username: this.username,
              email: this.email,
              password: this.password
            })
            .then(response => {
              // console.log(response.data)
              this.firstname = "";
              this.lastname = "";
              this.username = "";
              this.email = "";
              this.password = "";
              if (response.data) {
                swal("", "Successfully registered", "success");
              } else {
                swal("", "Something error", "error");
              }
              // console.log(response.data);
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
