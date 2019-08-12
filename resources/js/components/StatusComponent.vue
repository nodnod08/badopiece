<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#59ffa4" />
      </div>
    </div>
    <div class="status container mb-5">
      <div class="row">
        <div class="col-lg-12">
          <h4>
            <b
              v-if="transaction.length"
            >Status for Transaction ID: {{ transaction[0].transaction_id }}</b>
          </h4>
        </div>
        <div class="col-lg-12 text-center">
          <img :src="'/storage/img/core-img/status'+transaction[0].item_status.id+'.png'" alt />
        </div>
      </div>
    </div>
    <br />
    <br />
    <footer-component></footer-component>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";

export default {
  props: ["id", "auth"],
  components: {
    RadarSpinner
  },
  data() {
    return {
      loading: false,
      cartCount: "",
      opassword: "",
      npassword: "",
      cpassword: "",
      realId: 1,
      transaction: {}
    };
  },
  async created() {
    // this.listen();
    this.countCart();
    await this.getTrasaction();
    await this.startInterval();
  },
  methods: {
    countCart: async function() {
      axios.get("/countCart").then(response => {
        this.cartCount = response.data;
        // console.log(response.data);
      });
    },
    getTrasaction: async function() {
      await axios.get("/getTransactionInfo/" + this.id).then(response => {
        this.transaction = response.data;
        console.log(response.data);
      });
    },
    listen() {
      Echo.channel("transaction_31").listen("UpdateStatus", transaction => {
        alert(transaction);
      });
    },
    startInterval: function() {
      setInterval(() => {
        this.getTrasaction();
      }, 1000);
    }
  }
};
</script>

<style>
.status {
  margin-top: 180px;
}
</style>

