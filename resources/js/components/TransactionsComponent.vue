<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#59ffa4" />
      </div>
    </div>
    <div class="transactions container">
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-hover table-bordered text-center mb-5">
            <thead class="thead-dark">
              <tr>
                <th scope="col">
                  <small>#</small>
                </th>
                <th scope="col">
                  <small>Action</small>
                </th>
                <th scope="col">
                  <small>Transaction Id</small>
                </th>
                <th scope="col">
                  <small>Transaction Type</small>
                </th>
                <th scope="col">
                  <small>Transaction Status</small>
                </th>
                <th scope="col">
                  <small>Payment Type</small>
                </th>
                <th scope="col">
                  <small>Payment Status</small>
                </th>
                <th scope="col">
                  <small>Date Created</small>
                </th>
              </tr>
            </thead>
            <tbody v-if="transactions.data.length != 0">
              <tr v-for="(transaction, index) in transactions.data" v-bind:key="index">
                <td>
                  <small>{{ index+1 }}</small>
                </td>
                <td>
                  <small>
                    <a :href="'/transaction/'+transaction.id">
                      <button :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'" type="submit">
                        View Transaction
                        <i class="fas fa-file-alt"></i>
                      </button>
                    </a>
                    <a :href="'/status/'+transaction.id">
                      <button :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'" type="submit">
                        Transaction Status
                        <i class="fas fa-hourglass-half"></i>
                      </button>
                    </a>
                  </small>
                </td>
                <td>
                  <small>{{ transaction.transaction_id }}</small>
                </td>
                <td>
                  <small>{{ transaction.transaction_type.transaction_type }}</small>
                </td>
                <td>
                  <small>{{ transaction.transaction_status.status }}</small>
                </td>
                <td>
                  <small>{{ transaction.payment_type }}</small>
                </td>
                <td>
                  <small>{{ transaction.payment_status.status }}</small>
                </td>
                <td>
                  <small>{{ month[new Date(transaction.created_at).getMonth()] +' '+new Date(transaction.created_at).getDate()+', '+new Date(transaction.created_at).getFullYear() }}</small>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="8">
                  <small>
                    <b>No transactions found</b>
                  </small>
                </td>
              </tr>
            </tbody>
          </table>
          <pagination
            :limit="1"
            :size="'small'"
            :data="transactions"
            @pagination-change-page="getTransactions"
          >
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
      cartCount: "",
      month: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ]
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
        // console.log(this.transactions);
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

