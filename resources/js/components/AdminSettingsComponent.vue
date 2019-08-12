<template>
  <div class="content">
    <div class="animated fadeIn">
      <div class="all-in bg-white">
        <div class="row">
          <div class="col-lg-6">
            <h4>Change your Password</h4>
            <div class="mt-5">
              <label for>Old password</label>
              <br />
              <input
                type="password"
                v-validate="'required'"
                v-model="opassword"
                name="opassword"
                data-vv-as="Old password"
                :class="errors.first('opassword') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('opassword')"
              >{{ errors.first('opassword') }}</small>
              <label for>New password</label>
              <br />
              <input
                type="password"
                ref="password"
                v-validate="'required'"
                v-model="npassword"
                name="npassword"
                data-vv-as="New password"
                :class="errors.first('npassword') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('npassword')"
              >{{ errors.first('npassword') }}</small>
              <label for>Confirm password</label>
              <br />
              <input
                type="password"
                v-validate="'required|confirmed:password'"
                v-model="cpassword"
                name="cpassword"
                data-vv-as="Confirm password"
                :class="errors.first('cpassword') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('cpassword')"
              >{{ errors.first('cpassword') }}</small>
              <br />
              <br />
              <button
                :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                type="submit"
                v-on:click="updatePassword"
              >Update Password</button>
            </div>
          </div>
          <div class="col-lg-6">
            <h4>Add Administrator</h4>
            <div class="mt-5">
              <label for>Username</label>
              <br />
              <input
                type="text"
                v-validate="'required'"
                v-model="username"
                name="username"
                data-vv-as="username"
                :class="errors.first('username') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('username')"
              >{{ errors.first('username') }}</small>
              <label for>First name</label>
              <br />
              <input
                type="text"
                v-validate="'required'"
                v-model="firstname"
                name="firstname"
                data-vv-as="firstname"
                :class="errors.first('firstname') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('firstname')"
              >{{ errors.first('firstname') }}</small>
              <label for>Last name</label>
              <br />
              <input
                type="text"
                v-validate="'required'"
                v-model="lastname"
                name="lastname"
                data-vv-as="lastname"
                :class="errors.first('lastname') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('lastname')"
              >{{ errors.first('lastname') }}</small>
              <label for>Email</label>
              <br />
              <input
                type="email"
                v-validate="'required'"
                v-model="email"
                @blur="checkEmail()"
                name="email"
                data-vv-as="email"
                :class="(errors.first('email') || already) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('email')"
              >{{ errors.first('email') }}</small>
              <small v-if="already" class="invalid-feedback">Email is already exist.</small>
              <label for>Password</label>
              <br />
              <input
                type="password"
                ref="adminpassword"
                v-validate="'required'"
                v-model="adminpassword"
                name="adminpassword"
                data-vv-as="password"
                :class="errors.first('adminpassword') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('adminpassword')"
              >{{ errors.first('adminpassword') }}</small>
              <label for>Confirm password</label>
              <br />
              <input
                type="password"
                v-validate="'required|confirmed:adminpassword'"
                v-model="adminpasswordc"
                name="adminpasswordc"
                data-vv-as="Confirm password"
                :class="errors.first('adminpasswordc') ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              />
              <small
                class="invalid-feedback"
                v-if="errors.first('adminpasswordc')"
              >{{ errors.first('adminpasswordc') }}</small>
              <br />
              <br />
              <button
                :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                type="submit"
                v-on:click="add()"
              >Add New Administrator</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DatePicker from "vuejs-datepicker";
import moment from "moment";
import _ from "lodash";
export default {
  components: {
    datepicker: DatePicker
  },
  data() {
    return {
      opassword: "",
      npassword: "",
      adminpassword: "",
      adminpasswordc: "",
      cpassword: "",
      firstname: "",
      lastname: "",
      already: false,
      email: "",
      username: ""
    };
  },
  created() {},
  methods: {
    checkEmail: async function() {
      //   alert();
      await axios
        .post("/admin/checkEmail", {
          email: this.email
        })
        .then(response => {
          console.log(response.data);
          if (response.data == "already") {
            this.already = true;
          } else {
            this.already = false;
          }
        });
    },
    updatePassword: async function() {
      this.$validator.validateAll().then(async result => {
        if (result) {
          axios
            .post("/admin/updatePassword", {
              opassword: this.opassword,
              npassword: this.npassword
            })
            .then(response => {
              if (response.data) {
                swal("", "Your password has been updated.", "success");
              } else {
                swal(
                  "",
                  "Your old password incorrect. Please try again.",
                  "error"
                );
              }
            });
        } else {
        }
      });
    },
    add: async function() {
      this.$validator
        .validateAll([
          "username",
          "adminpassword",
          "adminpasswordc",
          "firstname",
          "lastname",
          "email"
        ])
        .then(async result => {
          if (result && this.already == false) {
            axios
              .post("/admin/addUser", {
                username: this.username,
                password: this.adminpassword,
                firstname: this.firstname,
                lastname: this.lastname,
                email: this.email
              })
              .then(response => {
                if (response.data) {
                  swal("", "New Administrator has been added", "success");
                  this.username = "";
                  this.firstname = "";
                  this.lastname = "";
                  this.email = "";
                  this.adminpassword = "";
                  this.adminpasswordc = "";
                } else {
                  swal("", "Somethins error. Please try again.", "error");
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
.all-in {
  padding: 2%;
}
.error {
  color: red;
}
</style>