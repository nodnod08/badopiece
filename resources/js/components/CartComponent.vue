<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div>
      <div v-if="loading">
        <div class="loader-back"></div>
        <div class="loader">
          <radar-spinner :animation-duration="1500" :size="60" color="#59ffa4" />
        </div>
      </div>
      <div class="container cart mb-5">
        <div class="row">
          <div v-if="carts.length != 0" class="col-lg-12">
            <div class="row">
              <div class="col-lg-9 col-md-12">
                <h4>Item Collection</h4>
                <hr />
                <div class="row m-title-none">
                  <div class="col-lg-3">Item Photo</div>
                  <div class="col-lg-3">Item Details</div>
                  <div class="col-lg-3">Quantity</div>
                  <div class="col-lg-3">Subtotal</div>
                </div>
                <br />
                <div v-for="(cart, index) in carts" v-bind:key="index" class="row item-box mb-1">
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
                      <option v-for="n in cart.attributes.stocks" v-bind:key="n" :value="n">{{ n }}</option>
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
                          <div class="col-lg-12 mt-4 mb-4">
                            <a href="/billing">
                              <button
                                :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                                type="button"
                              >
                                Continue Checkout
                                <i class="fas fa-money-check"></i>
                              </button>
                            </a>
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
  async mounted() {
    this.getCartContent();
    this.getSubtotal();
    this.countCart();
    // console.log(this.details);
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
        console.log(response.data);
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
      swal({
        title: "Are you sure? you want to remove this item in your cart?",
        // text: "Are you sure, your order and other details are correct?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        closeOnClickOutside: false
      }).then(async willDelete => {
        if (willDelete) {
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
        }
      });
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

