<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#18ffff" />
      </div>
    </div>
    <div class="transactions container">
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-hover table-bordered text-center mb-5">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Action</th>
                <th scope="col">Transaction Id</th>
                <th scope="col">Transaction Type</th>
                <th scope="col">Transaction Status</th>
                <th scope="col">Payment Type</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Date Created</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(transaction, index) in transactions.data" v-bind:key="index">
                <td>{{ index+1 }}</td>
                <td>
                  <a :href="'/transaction/'+transaction.id">
                    <button :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'" type="submit">
                      View Transaction
                      <i class="fas fa-file-alt"></i>
                    </button>
                  </a>
                </td>
                <td>{{ transaction.transaction_id }}</td>
                <td>{{ transaction.transaction_type.transaction_type }}</td>
                <td>{{ transaction.transaction_status.status }}</td>
                <td>{{ transaction.payment_type }}</td>
                <td>{{ transaction.payment_status.status }}</td>
                <td>{{ transaction.created_at }}</td>
              </tr>
            </tbody>
          </table>
          <pagination :data="transactions" @pagination-change-page="getTransactions">
            <span slot="prev-nav">Previous</span>
            <span slot="next-nav">Next</span>
          </pagination>
        </div>
      </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";
Vue.component("pagination", require("laravel-vue-pagination"));

export default {
  props: ["auth", "authdetails"],
  components: {
    RadarSpinner
  },
  data() {
    return {
      transactions: {},
      loading: false,
      cartCount: ""
    };
  },
  created() {
    this.countCart();
    this.getTransactions();
  },
  methods: {
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
      });
    },
    getTransactions: async function(page = 1) {
      axios.get("/getTransactions?page=" + page).then(response => {
        this.transactions = response.data;
        console.log(this.transactions);
      });
    }
  }
};
</script>

<style>
.transactions {
  margin-top: 150px;
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

