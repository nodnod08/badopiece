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
      <div class="container cart"></div>
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
  data() {
    return {
      loading: false,
      path_name: "",
      cartCount: ""
    };
  },
  async created() {
    await this.countCart();
    this.path_name = await window.location.pathname;
  },
  methods: {
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

.cart {
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
</style>

