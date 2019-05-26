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
              <h3>We make your business comportable on our products.</h3>
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
                <small>Durability of all printers and cartridges are tested and ensured for the use of all.</small>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 text-center">
            <div class="card choose-us">
              <div class="text-center">
                <img height="150" class :src="'storage/img/bg-img/support.png'" alt>
              </div>
              <div class="card-body">
                <h5 class="card-title">GOOD ASSIST AND FAST SUPPORT</h5>
                <small>Will give you an immediate support and information, also a fast support for avoiding downtime.</small>
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
                placeholder="Your Email"
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
              <button @click="inquire" type="button">Submit</button>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="services">
              <h4 class="title">WE OFFER SERVICES AND PRODUCTS.</h4>
              <ul class="list-group">
                <li>
                  <i class="fas fa-check"></i> Multifuntion Printers
                </li>
                <li>
                  <i class="fas fa-check"></i> Colored And Monochrome
                </li>
                <li>
                  <i class="fas fa-check"></i> Lan, USB And WI-FI Connected
                </li>
                <li>
                  <i class="fas fa-check"></i> Fast And Reliable Printers
                </li>
                <li>
                  <i class="fas fa-check"></i> Good Quality Printout
                </li>
                <li>
                  <i class="fas fa-check"></i> Preventive Maintenance
                </li>
                <li>
                  <i class="fas fa-check"></i> Good Support And Downtime Blocker
                </li>
                <li>
                  <i class="fas fa-check"></i> Technical Support
                </li>
                <li>
                  <i class="fas fa-check"></i> Guide And Installation Instruction
                </li>
                <li>
                  <i class="fas fa-check"></i> Good Customer Assist
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="intro-product">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 text-center">
            <br>
            <br>
            <h3>Solid Waste and Recycling</h3>
            <br>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <h4>Recycle</h4>
            <br>
            <p>The impact of recycling ink cartridges, on our environment, is monumental. It isn’t simply the ink that is being recycled. Plastic and metal waste are being diverted from our landfills. When the plastic casings of the cartridges begin to decompose, poisonous toxins are seeping into our soil and water. Reducing cartridge manufacturing lowers net energy use, which ultimately impacts climate change. Further, reducing the amount of plastic products being used reduces the amount of oil that is consumed. Plastic cannot be manufactured, without oil. Eventually, greenhouse gases are affected, with respect to global climate change.</p>
          </div>
          <div class="col-lg-4 col-md-4">
            <h4>Recycling ink and toner cartridges keeps millions of pounds of solid waste each year from landfills.</h4>
            <br>
            <p>As a society we are printing, copying and faxing more than ever. Used ink and toner cartridges are clogging our nation’s landfills, as many as 400 million per year!</p>
            <p>Because cartridges are a petroleum based product, they take hundreds of years to decompose, adding to the already serious environmental problem. Cartridges are made of plastic, and it takes up to three quarts of oil to manufacture a single cartridge.</p>
            <p>Ink cartridges are considered e-waste; they are harmful to the environment and can take eons to decompose. Companies and consumers should recycle their old ones, and when ink cartridges are purchased, go with refilled ones, which work just like conventional cartridges.</p>
          </div>
          <div class="col-lg-4 col-md-4">
            <h4>Environmental Impact</h4>
            <br>
            <p>GHGs (green house gases) emissions from manufacturing a single mono toner cartridge have been calculated to approximately 4.8 kg CO2; per cartridge.</p>
            <p>Each year over 350 million cartridges are thrown out to landfills.</p>
            <p>By 2012 500 million laser cartridges and 1.8 billion ink cartridges will be dumped in landfills.</p>
            <p>Each cartridge becomes 3.5 pounds of solid waste sitting in a landfill and can take up to 450 to 1000 years to decompose.</p>
          </div>
        </div>
        <br>
      </div>
    </div>
    <div class="jumbotron client">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h4>HERE IS SOME OF OUR BIG CLIENTS</h4>
            <p>We introduce some of our long time clients who still trust our services.</p>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="https://online-appointment.marina.gov.ph/">
              <img height="150" :src="'storage/img/core-img/client-1.png'" alt>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="https://www.nykline.com/ecom/CUP_HOM_3000.do?redir=Y">
              <img height="150" :src="'storage/img/core-img/client-2.png'" alt>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="http://www.tsmphil.com.ph/">
              <img height="150" :src="'storage/img/core-img/client-3.png'" alt>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="http://www.elburgshipmanagement.com.ph/esmv2/">
              <img height="150" :src="'storage/img/core-img/client-4.png'" alt>
            </a>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="http://www.snackattack.ph/">
              <img height="150" :src="'storage/img/core-img/client-5.png'" alt>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="https://robocash.ph/">
              <img height="150" :src="'storage/img/core-img/client-6.png'" alt>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="http://ssc.edu.ph/">
              <img height="150" :src="'storage/img/core-img/client-7.png'" alt>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <a href="https://www.chinabank.ph/personal.aspx">
              <img height="150" :src="'storage/img/core-img/client-8.png'" alt>
            </a>
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
