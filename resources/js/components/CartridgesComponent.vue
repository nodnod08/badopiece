<template>
  <div>
    <navbar-component :username="auth"></navbar-component>
    <div>
      <div v-if="loading">
        <div class="loader-back"></div>
        <div class="loader">
          <radar-spinner :animation-duration="1500" :size="60" color="#18ffff"/>
        </div>
      </div>
      <div class="container">
        <div class="cartridges search row">
          <div class="col-lg-8 col-md-8">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <input
                  type="text"
                  placeholder="Search something or keyword.."
                  v-model="search"
                  class="form-control form-control-sm"
                >
              </div>
              <div class="col-lg-6 col-md-6">
                <button
                  @click="getCartridges"
                  class="btn btn-outline-dark btn-sm my-2 my-sm-0"
                >Search</button>
              </div>
            </div>
          </div>
        </div>
        <div class="search row">
          <div
            v-for="item in cartridgesItem.data"
            v-bind:key="item.id"
            class="col-lg-4 col-md-6 col-sm-12 card border-secondary mb-3"
          >
            <img
              :src="'storage/img/offer-img/'+item.cartridge_image"
              class="card-img-top center"
              alt="..."
            >
            <div class="card-header">{{ item.cartridge_name }}</div>
            <div class="card-body text-secondary">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm 12">
                  <p>₱ {{ item.cartridge_price.toLocaleString() }}</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm 12">
                  <a :href="'/shop/cartridges/'+item.id">
                    <button class="btn btn-outline-dark btn-sm my-2 my-sm-0">View details</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h6>Showing from {{ this.cartridgesItem.from }} to {{ this.cartridgesItem.to }} of {{ this.cartridgesItem.total }}</h6>
        <pagination :data="cartridgesItem" @pagination-change-page="getCartridges">
          <span slot="prev-nav">Previous</span>
          <span slot="next-nav">Next</span>
        </pagination>
        <br>
        <br>
        <br>
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
      path_name: "",
      search: "",
      loading: true,
      cartridgesItem: {}
    };
  },
  created() {
    this.getCartridges();
    this.path_name = window.location.pathname;
  },
  methods: {
    getCartridges: async function(page = 1) {
      this.loading = true;
      if (typeof this.search == "undefined" || this.search == "") {
        var url = "/getCartridges/default?page=";
      } else {
        var url = "/getCartridges/" + this.search + "?page=";
      }
      await axios.get(url + page).then(response => {
        // this.loading = true;
        this.cartridgesItem = response.data;
        // this.loading = false;
      });
      this.loading = false;
    }
  }
};
</script>

<style>
.shop {
  min-height: 70vh;
  margin-top: 100px;
}

.cartridges {
  margin-top: 150px;
}

.search {
  margin-bottom: 15px;
}

.card-img-top {
  height: 300px;
  width: 250px;
  margin-left: 50%;
  transform: translateX(-50%);
}

.card {
  padding: 0;
}
</style>

