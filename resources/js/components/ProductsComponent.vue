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
      <div class="container">
        <div class="products search row">
          <button
            type="button"
            class="btn btn-outline-dark btn-md my-2 my-sm-0"
            data-toggle="modal"
            data-target="#exampleModal"
          >
            <i class="fas fa-filter"></i> Filter Products
          </button>
        </div>
        <div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Products</h5>
                <button
                  type="button"
                  id="close"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h6>By Price</h6>
                <vue-slider ref="slider" v-model="value" v-bind="options"></vue-slider>
                <br />
                <h6>By Category</h6>
                <select v-model="category" class="form-control" id="exampleFormControlSelect1">
                  <option
                    v-bind:key="category.id"
                    v-for="category in categories"
                    :value="category.id"
                  >{{ category.category }}</option>
                  <option value="all">All</option>
                </select>
              </div>
              <div class="modal-footer">
                <button
                  v-on:click="filterProducts()"
                  type="button"
                  class="btn btn-primary"
                >Filter Now</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div
            v-for="item in productsItem.data"
            v-bind:key="item.id"
            class="col-lg-4 col-md-6 col-sm-12 card border-secondary mb-3"
          >
            <img
              :src="'storage/img/offer-img/'+item.product_photo"
              class="card-img-top center"
              alt="..."
            />
            <div class="card-header">{{ item.product_name }}</div>
            <div class="card-body text-secondary">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm 12">
                  <a :href="'/shop/products/'+item.product_id">
                    <button class="btn btn-outline-dark btn-sm my-2 my-sm-0">View details</button>
                  </a>
                  <button
                    @click="addToCart(item.product_id)"
                    :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                  >
                    <i class="fas fa-cart-plus"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h6>Showing from {{ this.productsItem.from }} to {{ this.productsItem.to }} of {{ this.productsItem.total }}</h6>
        <pagination v-if="filter" :data="productsItem" @pagination-change-page="filterProducts">
          <span slot="prev-nav">Previous</span>
          <span slot="next-nav">Next</span>
        </pagination>
        <pagination v-else :data="productsItem" @pagination-change-page="getProducts">
          <span slot="prev-nav">Previous</span>
          <span slot="next-nav">Next</span>
        </pagination>
        <br />
        <br />
        <br />
      </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
import VueSlider from "vue-slider-component";
import "vue-slider-component/theme/antd.css";
Vue.component("pagination", require("laravel-vue-pagination"));
import { RadarSpinner } from "epic-spinners";

export default {
  props: ["auth"],
  components: {
    RadarSpinner,
    VueSlider
  },
  mounted() {},
  data() {
    return {
      loading: true,
      path_name: "",
      productsItem: {},
      category: "all",
      categories: {},
      cartCount: "",
      value: [0, 10000],
      filter: false,
      options: {
        dotSize: 16,
        width: "auto",
        height: 7,
        contained: false,
        direction: "ltr",
        data: null,
        min: 0,
        max: 10000,
        interval: 1,
        disabled: false,
        clickable: true,
        duration: 0.5,
        adsorb: false,
        lazy: false,
        tooltip: "focus",
        tooltipPlacement: "top",
        tooltipFormatter: v =>
          `₱ ${("" + v).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`,
        useKeyboard: false,
        enableCross: false,
        fixed: false,
        minRange: void 0,
        maxRange: void 0,
        order: true,
        marks: false,
        dotOptions: void 0,
        process: true,
        dotStyle: void 0,
        railStyle: void 0,
        processStyle: void 0,
        tooltipStyle: void 0,
        stepStyle: void 0,
        stepActiveStyle: void 0,
        labelStyle: void 0,
        labelActiveStyle: void 0
      }
    };
  },
  created() {
    this.getProducts();
    this.countCart();
    this.getCategories();
    this.path_name = window.location.pathname;
  },
  methods: {
    filterProducts: async function(page = 1) {
      var url =
        (await "/getProducts/") +
        this.value[0] +
        "/" +
        this.value[1] +
        "/" +
        this.category +
        "?page=";

      await axios.get(url + page).then(response => {
        document.getElementById("close").click();
        // this.loading = true;
        this.productsItem = response.data;
        // this.loading = false;
        console.log(response.data);
        if (this.category != "all") {
          this.filter = true;
        } else {
          this.filter = false;
        }
      });
      this.loading = false;
    },
    getCategories: async function() {
      axios.get("/getCategories").then(response => {
        this.categories = response.data;
      });
    },
    getProducts: async function(page = 1) {
      this.loading = true;
      var url = await "/getProducts?page=";
      await axios.get(url + page).then(response => {
        // this.loading = true;
        this.productsItem = response.data;
        this.filter = false;
        // this.loading = false;
        // console.log(response.data);
      });
      this.loading = false;
    },
    addToCart: async function(id) {
      this.loading = true;
      let options = {
        html: false,
        loader: false,
        reverse: false,
        okText: "Continue",
        cancelText: "Close",
        animation: "zoom",
        type: "basic",
        verification: "continue",
        verificationHelp: 'Type "[+:verification]" below to confirm',
        clicksCount: 3,
        backdropClose: true,
        customClass: ""
      };
      await axios
        .post("/add", {
          id: id
        })
        .then(response => {
          if (response.data == "already") {
            this.loading = false;
            this.$dialog
              .alert("Item is already in your cart", options)
              .then(function(dialog) {
                // console.log("Closed");
              });
          } else {
            this.loading = false;
            this.cartCount = response.data;
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
.shop {
  min-height: 70vh;
  margin-top: 100px;
}
.search {
  margin-bottom: 15px;
}

.products {
  margin-top: 150px;
}

.card-img-top {
  height: 300px;
  width: 250px;
  margin-left: 50%;
  margin-top: 15px;
  transform: translateX(-50%);
}

.card {
  padding: 0;
}
ul.pagination > li > a.page-link {
  box-shadow: none;
}

ul.pagination > li.active > a.page-link {
  background: #404040;
  border-color: #404040;
  color: #fff;
}

ul.pagination > li > a.page-link {
  background: #fff;
  border-color: #404040;
  color: #404040;
}

ul.pagination > li > a.page-link:hover {
  background: #404040;
  border-color: #404040;
  color: #fff;
}
</style>

