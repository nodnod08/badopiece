<template>
  <div>
    <navbar-component :username="auth"></navbar-component>
    <div>
      <div v-if="loading">
        <div class="loader-back"></div>
        <div class="loader">
          <radar-spinner :animation-duration="1500" :size="60" color="#18ffff" />
        </div>
      </div>
      <div class="container">
        <div class="products search row">
          <div class="col-lg-8 col-md-8">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <input
                  type="text"
                  placeholder="Search something or keyword.."
                  v-model="search"
                  class="form-control form-control-sm"
                />
              </div>
              <div class="col-lg-6 col-md-6">
                <button @click="getProducts" class="btn btn-outline-dark btn-sm my-2 my-sm-0">Search</button>
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
        <pagination :data="productsItem" @pagination-change-page="getProducts">
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
Vue.component("pagination", require("laravel-vue-pagination"));
import { RadarSpinner } from "epic-spinners";
export default {
  props: ["auth"],
  components: {
    RadarSpinner
  },
  mounted() {},
  data() {
    return {
      loading: true,
      path_name: "",
      search: "",
      productsItem: {}
    };
  },
  created() {
    this.getProducts();
    this.path_name = window.location.pathname;
  },
  methods: {
    getProducts: async function(page = 1) {
      this.loading = true;
      if (typeof this.search == "undefined" || this.search == "") {
        var url = "/getProducts/default?page=";
      } else {
        var url = "/getProducts/" + this.search + "?page=";
      }
      await axios.get(url + page).then(response => {
        // this.loading = true;
        this.productsItem = response.data;
        // this.loading = false;
      });
      this.loading = false;
    },
    addToCart: function(id) {
      alert(id);
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

.page-item {
  background: #000;
}
</style>

