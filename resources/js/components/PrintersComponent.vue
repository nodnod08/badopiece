<template>
  <div>
    <navbar-component :username="auth"></navbar-component>
    <div>
      <div class="container">
        <div class="printers row">
          <div
            v-for="item in printersItem.data"
            v-bind:key="item.id"
            class="col-lg-4 col-md-6 col-sm-12 card border-secondary mb-3"
          >
            <img
              :src="'storage/img/offer-img/'+item.printer_image1"
              class="card-img-top center"
              alt="..."
            >
            <div class="card-header">{{ item.printer_name }}</div>
            <div class="card-body text-secondary">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm 12">
                  <a :href="'/shop/printers/'+item.id">
                    <button class="btn btn-outline-dark btn-sm my-2 my-sm-0">View details</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h6>Showing from {{ this.printersItem.from }} to {{ this.printersItem.to }} of {{ this.printersItem.total }}</h6>
        <pagination :data="printersItem" @pagination-change-page="getPrinters">
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
export default {
  props: ["auth"],
  components: {},
  mounted() {},
  data() {
    return {
      path_name: "",
      printersItem: {}
    };
  },
  created() {
    this.getPrinters();
    this.path_name = window.location.pathname;
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
.shop {
  min-height: 70vh;
  margin-top: 100px;
}

.printers {
  margin-top: 150px;
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

