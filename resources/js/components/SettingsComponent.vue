<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#59ffa4" />
      </div>
    </div>
    <div class="settings container mb-5">
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
      </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";

export default {
  props: ["auth"],
  components: {
    RadarSpinner
  },
  data() {
    return {
      loading: false,
      cartCount: "",
      opassword: "",
      npassword: "",
      cpassword: ""
    };
  },
  created() {
    this.countCart();
  },
  methods: {
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
        // console.log(response.data);
      });
    },
    updatePassword: async function() {
      this.$validator.validateAll().then(async result => {
        if (result) {
          axios
            .post("/updatePassword", {
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
    }
  }
};
</script>

<style>
.settings {
  margin-top: 150px;
}
</style>

