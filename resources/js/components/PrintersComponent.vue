<template>
  <div>
    <navbar-component></navbar-component>
    <h1>printer</h1>
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
  data() {
    return {
      printersItem: {},
      search: "",
      loading: false
    };
  },
  created() {
    this.getPrinters();
  },
  methods: {
    getPrinters: async function(page = 1) {
      this.loading = true;

      if (typeof this.search == "undefined" || this.search == "") {
        var url = "/getPrinters/default?page=";
      } else {
        var url = "/getPrinters/" + this.search + "?page=";
      }
      await axios.get(url + page).then(response => {
        this.printersItem = response.data;
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

