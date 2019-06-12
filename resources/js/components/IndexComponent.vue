<template>
  <div>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#18ffff"/>
      </div>
    </div>
    <navbar-component :username="auth"></navbar-component>
    <div class="showcase">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="message-intro text-white">
              <h1>Gives you a lot of Choice</h1>
              <h3>We make our customers comportable on our products.</h3>
              <br>
              <a :href="'/redirect/google'">
                <button class="button-social" type="button">
                  <i class="fab fa-google-plus-g"></i> Sign in with Google
                </button>
              </a>
              <p>Easily sign in with your google.</p>
              <p>
                Register
                <a href="/signup">here</a> to get updated about new products.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center text-black">
            <h4>WHY CHOOSE US?</h4>
          </div>
          <br>
          <br>
          <br>
        </div>
      </div>
      <div class="container">
        <div class="row text-black text-center">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card choose-us">
              <div class="text-center">
                <img height="150" width="160" :src="'storage/img/bg-img/save.png'" alt>
              </div>
              <div class="card-body">
                <h5 class="card-title">GUARANTEE SAVE YOUR MONEY</h5>
                <small>A lot of choice from our products that applicable to your budgets and save your money for purchasing.</small>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 text-center">
            <div class="card choose-us">
              <div class="text-center">
                <img height="150" class :src="'storage/img/bg-img/durable.png'" alt>
              </div>
              <div class="card-body">
                <h5 class="card-title">PRODUCTS DURABILITY ARE PERFECT</h5>
                <small>Durability of all clothes and accessories are good to our some and previous customers.</small>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 text-center">
            <div class="card choose-us">
              <div class="text-center">
                <img height="150" class :src="'storage/img/bg-img/support.png'" alt>
              </div>
              <div class="card-body">
                <h5 class="card-title">GOOD CUSTOMERS ASSIST</h5>
                <small>Will give you an information and answers for some inquiring about our products.</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container get-touch">
        <div class="row">
          <div class="col-lg-6 col-md-6 text-center">
            <div class="touch-box">
              <h3 class="title">GET IN TOUCH</h3>
              <br>
              <textarea
                v-model="message"
                name="message"
                v-validate="'required'"
                id
                class="form-control"
                placeholder="Leave a message or question"
                :class="errors.first('message') ? 'is-invalid form-control' : 'form-control'"
              ></textarea>
              <small
                class="invalid-feedback"
                v-if="errors.first('message')"
              >{{ errors.first('message') }}</small>
              <br>
              <input
                v-model="email"
                name="email"
                v-validate="'required|email'"
                type="email"
                :class="errors.first('email') ? 'is-invalid form-control' : 'form-control'"
                placeholder="Your Email (recommended Gmail)"
              >
              <small
                class="invalid-feedback"
                v-if="errors.first('email')"
              >{{ errors.first('email') }}</small>
              <br>
              <input
                v-model="fullname"
                name="fullname"
                v-validate="'required'"
                type="text"
                :class="errors.first('fullname') ? 'is-invalid form-control' : 'form-control'"
                placeholder="Your fullname"
              >
              <small
                class="invalid-feedback"
                v-if="errors.first('fullname')"
              >{{ errors.first('fullname') }}</small>
              <br>
              <!-- <button @click="inquire" type="button">Submit</button> -->
              <button @click="inquire" class="btn btn-outline-light btn-sm my-2 my-sm-0">Submit</button>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="services">
              <h4 class="title">WE OFFER MANY SERVICES, CLOTHES AND ACCESSORIES PRODUCTS</h4>
              <ul class="list-group">
                <li>
                  <i class="fas fa-check"></i> Meet up for orders
                </li>
                <li>
                  <i class="fas fa-check"></i> Quick assist for product issue
                </li>
                <li>
                  <i class="fas fa-check"></i> Ensured durability
                </li>
                <li>
                  <i class="fas fa-check"></i> Check if it has damage before delivery
                </li>
                <li>
                  <i class="fas fa-check"></i> Secured checkout
                </li>
                <li>
                  <i class="fas fa-check"></i> Customers account are secured
                </li>
                <li>
                  <i class="fas fa-check"></i> Get in touch for inquiry
                </li>
                <li>
                  <i class="fas fa-check"></i> Manage the days of delivery
                </li>
                <li>
                  <i class="fas fa-check"></i> Clear transaction
                </li>
                <li>
                  <i class="fas fa-check"></i> Website friendly
                </li>
              </ul>
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
  components: {
    RadarSpinner
  },
  data() {
    return {
      message: "",
      fullname: "",
      email: "",
      loading: false
    };
  },
  methods: {
    inquire: function() {
      this.$validator.validateAll().then(async result => {
        if (result) {
          this.loading = true;
          await axios
            .post("/inquire", {
              fullname: this.fullname,
              email: this.email,
              message: this.message
            })
            .then(response => {
              // console.log(response.data);
              this.fullname = "";
              this.email = "";
              this.message = "";
              if (response.data == "ok") {
                swal("", "Your message has been sent", "success");
              } else {
                swal("", "Something error", "error");
              }
              // console.log(response.data);
            });
          this.loading = false;
        } else {
        }
      });
    }
  },
  created() {}
};
</script>
<style>
.showcase {
  background-image: url("../../../public/storage/img/bg-img/bg-new3.jpg");
  background-repeat: no-repeat;
  background-size: 100% auto;
  position: relative;
  width: 100%;
  min-height: 100vh;
  margin: 0;
  padding: 0;
}

@media (max-width: 1000px) {
  .showcase {
    min-height: 70vh;
    margin-top: 70px;
  }
}

@media (max-width: 540px) {
  .showcase {
    background-image: url("../../../public/storage/img/bg-img/bg-new3-center.jpg");
  }
}

.message-intro {
  margin-top: 250px;
  background: transparent;
  padding: 0;
  margin-bottom: 50px;
}

@media (max-width: 690px) {
  .message-intro {
    margin-top: 250px;
    background: rgba(64, 64, 64, 0.7);
    padding: 2%;
    border-radius: 5px;
  }
}

li {
  list-style: none;
}

.jumbotron {
  margin-bottom: 0;
}
.fa-check {
  color: #62f442;
}
.get-touch {
  margin-top: 50px;
}

.choose-us {
  margin-bottom: 50px;
}

.button-social,
.button-social:focus {
  background: #db4437;
  color: #fff;
  outline: none;
  border: none;
}

.touch-box {
  background: #404040;
  padding: 2%;
}

.touch-box .title {
  color: #fff;
}

.services .title {
  color: #404040;
}

.touch-box button {
  border: none;
  outline: none;
  width: 70%;
}

.services {
  background: #fff;
  padding: 2%;
}

.intro-product {
  background: #727171;
  min-height: 100px;
  width: 100%;
  color: #fff;
}
</style>
