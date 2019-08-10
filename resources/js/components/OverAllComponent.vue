<template>
  <div>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#59ffa4" />
      </div>
    </div>
    <div class="transactions container">
      <div class="row">
        <div class="col-lg-6">
          <input
            type="text"
            v-on:keyup="search()"
            v-model="searchId"
            class="form-control form-control-sm mt-4 mb-3"
            placeholder="Search Transaction ID"
          />
        </div>
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
            <tbody v-if="transactions.data.length != 0">
              <tr v-for="(transaction, index) in transactions.data" v-bind:key="index">
                <td>{{ index+1 }}</td>
                <td>
                  <a :href="'/perTransactionView/'+transaction.id">
                    <button :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'" type="button">
                      View Transaction
                      <i class="ti-file"></i>
                    </button>
                  </a>
                  <a :href="'/view-status/'+transaction.id">
                    <button :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'" type="button">
                      Update Status
                      <i class="ti-panel"></i>
                    </button>
                  </a>
                </td>
                <td>{{ transaction.transaction_id }}</td>
                <td>{{ transaction.transaction_type.transaction_type }}</td>
                <td>{{ transaction.transaction_status.status }}</td>
                <td>{{ transaction.payment_type }}</td>
                <td>{{ transaction.payment_status.status }}</td>
                <td>{{ month[new Date(transaction.created_at).getMonth()] +' '+new Date(transaction.created_at).getDate()+', '+new Date(transaction.created_at).getFullYear() }}</td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="8">
                  <b>No transactions found</b>
                </td>
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
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";
Vue.component("pagination", require("laravel-vue-pagination"));

export default {
  props: [],
  components: {
    RadarSpinner
  },
  data() {
    return {
      transactions: {},
      loading: false,
      cartCount: "",
      searchId: "",
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
      axios.get("/getOverAllTransactions?page=" + page).then(response => {
        this.transactions = response.data;
        // console.log(this.transactions);
      });
    },
    search: async function(page = 1) {
      axios
        .get("/getOverAllTransactions/" + this.searchId + "?page=" + page)
        .then(response => {
          this.transactions = response.data;
          // console.log(this.transactions);
        });
    }
  }
};
</script>

<style>
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

