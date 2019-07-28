<template>
  <div>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#59ffa4" />
      </div>
    </div>
    <div class="third-second">
      <div class="container center-align">
        <div class="row">
          <div class="col s12 m12 center-align">
            <div class="card card-sub">
              <div class="card-content white-text">
                <span class="card-title">Subscribe Now</span>
                <form autocomplete="off">
                  <div>
                    <div class="input-field col s12">
                      <i class="material-icons prefix">email</i>
                      <input
                        v-validate="'required|email'"
                        id="icon_prefix"
                        type="text"
                        name="email"
                        v-model="email"
                        v-bind:class="errors.has('email') ? 'invalid white-text' : 'white-text'"
                      />
                      <small
                        v-show="errors.has('email')"
                        class="red-text"
                      >{{ errors.first('email') }}</small>
                      <label for="icon_prefix">Enter your email</label>
                    </div>
                    <button
                      @click.prevent="subscribe"
                      class="waves-effect white black-text btn"
                    >Submit</button>
                  </div>
                </form>
              </div>
              <br />
              <br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import { RadarSpinner } from "epic-spinners";
export default {
  components: {
    RadarSpinner
  },
  data() {
    return {
      loading: false,
      email: ""
    };
  },
  methods: {
    subscribe: function() {
      this.$validator.validateAll().then(async result => {
        if (result) {
          this.loading = true;

          await axios
            .post("/subscribe", {
              email: this.email
            })
            .then(response => {
              // console.log(response.data)
              if (response.data) {
                swal("", "Subscribe successfully", "success");
              } else {
                swal("", "Something error", "error");
              }
            });

          this.loading = false;
        }
      });
    }
  }
};
</script>
