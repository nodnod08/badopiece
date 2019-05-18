<template>
  <div>
    <navbar-component></navbar-component>
    <div class="container shop">
      <h1 v-if="path_name == '/shop/printers'">Printer</h1>
      <h1 v-else>Cartridge</h1>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
Vue.component("pagination", require("laravel-vue-pagination"));
import { RadarSpinner } from "epic-spinners";
export default {
  components: {
    RadarSpinner
  },
  mounted() {
    // console.log('Printers mounted.')
  },
  data() {
    return {
      cartridgesItem: {},
      search: "",
      loading: false,
      sample: "mehehe",
      path_name: ""
    };
  },
  created() {
    // this.getCartridges();
    this.path_name = window.location.pathname;
    // console.log(this.path_name);
  },
  methods: {
    // getCartridges: async function(page = 1) {
    //   this.loading = true;
    //   if (typeof this.search == "undefined" || this.search == "") {
    //     var url = "/getCartridges/default?page=";
    //   } else {
    //     var url = "/getCartridges/" + this.search + "?page=";
    //   }
    //   await axios.get(url + page).then(response => {
    //     this.loading = true;
    //     this.cartridgesItem = response.data;
    //     this.loading = false;
    //   });
    //   this.loading = false;
    // }
  }
};
</script>

<style>
.shop {
  min-height: 70vh;
  margin-top: 100px;
}
</style>

