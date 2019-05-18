<template>
  <div>
    <navbar-component></navbar-component>
    <h1>cartridge</h1>
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
      loading: false
    };
  },
  created() {
    this.getCartridges();
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
        this.loading = true;
        this.cartridgesItem = response.data;
        this.loading = false;
      });

      this.loading = false;
    }
  }
};
</script>

<style>
.items {
  margin-top: 30px;
  /* margin-left: 10px;
        margin-right: 10px; */
}

.img {
  width: 100px;
  height: 400px;
}

.opener {
  cursor: pointer;
}

.search {
  margin-bottom: -40px;
  margin-top: 20px;
  margin-left: -15px;
}
</style>

