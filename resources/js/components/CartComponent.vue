<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div>
      <div v-if="loading">
        <div class="loader-back"></div>
        <div class="loader">
          <radar-spinner :animation-duration="1500" :size="60" color="#18ffff" />
        </div>
      </div>
      <div class="container cart">
        <div class="row">
          <div v-if="carts.length != 0" class="col-lg-12">
            <div class="row">
              <div v-if="!bill" class="col-lg-9 col-md-12">
                <h4>Item Collection</h4>
                <hr />
                <div class="row m-title-none">
                  <div class="col-lg-3">Item Photo</div>
                  <div class="col-lg-3">Item Details</div>
                  <div class="col-lg-3">Quantity</div>
                  <div class="col-lg-3">Subtotal</div>
                </div>
                <br />
                <div v-for="cart, index in carts" class="row item-box mb-1">
                  <div class="col-lg-3 col-md-6">
                    <p class="m-title mt-5">Item Photo</p>
                    <img
                      class="item-photo"
                      :src="'./storage/img/offer-img/' + cart.attributes.photo"
                      alt
                    />
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <p class="m-title mt-5">Item Details</p>
                    <b>{{ cart.name }}</b>
                    <br />
                    <small>{{ cart.attributes.code }}</small>
                    <br />
                    <b>&#8369; {{ cart.price }}.00</b>
                  </div>
                  <div class="col-lg-3">
                    <p class="m-title mt-5">Quantity</p>
                    <select
                      class="form-control form-control-sm col-lg-12"
                      :id="'itemCount'+cart.id"
                    >
                      <option v-for="n in cart.attributes.stocks" :value="n">{{ n }}</option>
                    </select>
                    <button
                      v-on:click="update(cart.id)"
                      class="mt-3 mb-3 text-center btn btn-outline-dark btn-sm col-lg-12"
                    >
                      Update
                      <i class="fas fa-sync"></i>
                    </button>
                    <button
                      v-on:click="remove(cart.id)"
                      class="text-center btn btn-outline-danger btn-sm col-lg-12"
                    >
                      Remove
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </div>
                  <div class="col-lg-3">
                    <p class="m-title mt-5">Subtotal</p>
                    <b>&#8369; {{ cart.price * cart.quantity }}.00</b>
                  </div>
                </div>
              </div>
              <div v-else class="col-lg-9 col-md-12">
                <h4>Billing Info</h4>
                <hr />
                <form>
                  <div class="row mt-4 mb-5">
                    <div class="col-lg-12">
                      <h5>
                        <b>Personal Information</b>
                      </h5>
                    </div>
                    <br />
                    <br />
                    <div class="col-lg-6 mb-2">
                      <label for>First Name</label>
                      <input v-model="firstname" type="text" class="form-control form-control-sm" />
                    </div>
                    <div class="col-lg-6 mb-2">
                      <label for>Last Name</label>
                      <input v-model="lastname" type="text" class="form-control form-control-sm" />
                    </div>
                    <div class="col-lg-6 mb-2">
                      <label for>Email</label>
                      <input v-model="email" type="email" class="form-control form-control-sm" />
                    </div>
                    <div class="col-lg-6 mb-2">
                      <label for>Phone Number</label>
                      <input v-model="phone" type="text" class="form-control form-control-sm" />
                    </div>
                    <br />
                    <div class="col-lg-12 mt-4 mb-4">
                      <h5>
                        <b>Shipping Address Information</b>
                      </h5>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <label for>Address</label>
                      <input v-model="address" type="text" class="form-control form-control-sm" />
                    </div>
                    <div class="col-lg-6 mb-2">
                      <label for>City</label>
                      <input v-model="city" type="text" class="form-control form-control-sm" />
                    </div>
                    <div class="col-lg-6 mb-2">
                      <label for>State / Province</label>
                      <input v-model="state" type="text" class="form-control form-control-sm" />
                    </div>
                    <div class="col-lg-6 mb-2">
                      <label for>Postal Code</label>
                      <input v-model="postal" type="text" class="form-control form-control-sm" />
                    </div>
                    <div class="col-lg-12 mb-2">
                      <label for>Tell something about your order. (optional)</label>
                      <textarea v-model="message" class="form-control"></textarea>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-lg-3">
                <h4>Item Summary</h4>
                <hr />
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row item-summary">
                      <div class="col-lg-12">
                        <br />
                        <h6>Summary</h6>
                        <br />
                        <div class="row">
                          <div class="col-lg-6">Subtotal</div>
                          <div class="col-lg-6">
                            <b>&#8369; {{ subTotal }}.00</b>
                          </div>
                          <div class="col-lg-6">Shipping fee</div>
                          <div class="col-lg-6">
                            <b>&#8369; {{ (subTotal > 500) ? 0 : 100}}.00</b>
                          </div>
                          <div class="col-lg-6">VAT</div>
                          <div class="col-lg-6">
                            <b>10%</b>
                          </div>
                          <br />
                          <br />
                          <div class="col-lg-6">
                            <b>Total</b>
                          </div>
                          <div class="col-lg-6">
                            <b>&#8369; {{ (subTotal > 500) ? subTotal : subTotal + 100 }}.00</b>
                          </div>
                          <br />
                          <div v-if="bill" class="col-lg-12 mt-4 mb-4">
                            <button
                              v-on:click="cartEdit()"
                              :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                              type="button"
                            >
                              <i class="fas fa-arrow-circle-left"></i> Back
                            </button>
                          </div>
                          <div v-if="!bill" class="col-lg-12 mt-4 mb-4">
                            <button
                              v-on:click="checkout()"
                              :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                              type="button"
                            >
                              Continue Checkout
                              <i class="fas fa-money-check"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div v-else class="col-lg-12">
            <h4>No Items in your Cart</h4>
            <hr />
            <div class="row">
              <div class="col-lg-12 text-center mt-4">
                <img class="empty" src="../../../public/storage/img/bg-img/empty.png" alt />
                <br />
                <p>It seems your cart doesn't have any item.</p>
                <a href="/products">
                  <button type="submit" class="text-center btn btn-outline-dark btn-sm">
                    Shop now
                    <i class="fas fa-shopping-bag"></i>
                  </button>
                </a>
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
Vue.component("pagination", require("laravel-vue-pagination"));
import { RadarSpinner } from "epic-spinners";

export default {
  props: ["auth", "details"],
  components: {
    RadarSpinner
  },
  data() {
    return {
      loading: false,
      path_name: "",
      cartCount: "",
      carts: {},
      subTotal: "",
      bill: false,
      firstname: "",
      lastname: "",
      email: "",
      phone: "",
      address: "",
      city: "",
      state: "",
      postal: "",
      message: ""
    };
  },
  mounted() {
    this.getCartContent();
    this.getSubtotal();
    this.countCart();
    console.log(this.details);
    this.path_name = window.location.pathname;
  },
  methods: {
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
        // console.log(response.data);
      });
    },
    getCartContent: function() {
      axios.get("/getCartContent").then(async response => {
        this.carts = await response.data;
        // console.log(response.data);
      });
    },
    getSubtotal: function() {
      axios.get("/getSubtotal").then(async response => {
        this.subTotal = await response.data;
        // console.log(response.data);
      });
    },
    update: async function(id) {
      var valueNow = document.getElementById("itemCount" + id).value;

      await axios
        .post("/updateCart", {
          id: id,
          count: valueNow
        })
        .then(response => {
          this.loading = false;
          swal("", "Item updated", "success");
        });

      this.getCartContent();
      this.getSubtotal();
      this.countCart();
    },
    remove: async function(id) {
      await axios
        .post("/removeItem", {
          id: id
        })
        .then(response => {
          this.loading = false;
          swal("", "Item removed", "success");
        });

      this.getCartContent();
      this.getSubtotal();
      this.countCart();
    },
    checkout: async function() {
      this.bill = await true;
    },
    cartEdit: async function() {
      this.bill = await false;
    }
  }
};
</script>

<style>
.cart {
  min-height: 70vh;
  margin-top: 100px;
}

.card {
  padding: 0;
}

.item-photo {
  height: 120px;
  width: 120px;
}

.item-box {
  padding: 2%;
  background: #ebebeb;
}

.item-summary {
  margin: 2%;
  background: #ebebeb;
}

.m-title {
  display: none;
}

@media (max-width: 991px) {
  .m-title {
    display: block;
  }
  .m-title-none {
    display: none;
  }
}

.empty {
  width: 200px;
  height: 200px;
}
</style>

