<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#18ffff" />
      </div>
    </div>
    <div class="transaction container">
      <div v-for="transaction in transactions" v-bind:key="transaction.id" class="row mb-5">
        <div class="col-lg-6 col-md-6">
          <h3>Transaction Summary</h3>
        </div>
        <div class="col-lg-6 col-md-6">
          <button :class="'btn btn-outline-dark btn-md my-2 my-sm-0'">
            Download PDF
            <i class="fas fa-file-pdf"></i>
          </button>
          <button :class="'btn btn-outline-dark btn-md my-2 my-sm-0'">
            Print Now
            <i class="fas fa-print"></i>
          </button>
        </div>
        <hr />
        <div class="col-lg-12">
          <p>
            <b>Transaction Id:</b>
            {{ transaction.transaction_id }}
          </p>
          <p>
            <b>Transaction Type:</b>
            {{ transaction.transaction_type.transaction_type }}
          </p>
          <p>
            <b>Date:</b>
            {{ month[new Date(transaction.created_at).getMonth()] +' '+new Date(transaction.created_at).getDate()+', '+new Date(transaction.created_at).getFullYear() }}
          </p>
          <p>
            <b>Status:</b>
            {{ transaction.transaction_status.status }}
          </p>
          <p>
            <b>Payment Status:</b>
            {{ transaction.payment_status.status }}
          </p>
          <p v-if="transaction.transaction_type_id == 3">
            <b>Payment Type:</b>
            {{ transaction.payment_type }}
          </p>
        </div>
        <br />
        <div
          v-if="transaction.transaction_type_id == 3 || transaction.transaction_type_id == 1"
          class="col-lg-12"
        >
          <h3>Billing Details</h3>
          <hr />
        </div>
        <div v-if="transaction.transaction_type_id == 2" class="col-lg-12">
          <h3>Meeting Place Details</h3>
          <hr />
        </div>
        <div
          v-if="transaction.transaction_type_id == 3 || transaction.transaction_type_id == 1"
          class="col-lg-12"
        >
          <p>
            <b>Recipient Name:</b>
            {{ transaction.shipping.firstname }} {{ transaction.shipping.lastname }}
          </p>
          <p>
            <b>Phone:</b>
            0{{ transaction.shipping.phone }}
          </p>
          <p>
            <b>Email:</b>
            {{ transaction.shipping.email }}
          </p>
          <p>
            <b>Address / Shipping Destination:</b>
            {{ transaction.shipping.street_address }} {{ transaction.shipping.city }} {{ transaction.shipping.state }} {{ transaction.shipping.country }} {{ transaction.shipping.postal }}
          </p>
        </div>
        <div class="col-lg-12">
          <h3>Items Ordered</h3>
          <hr />
        </div>
        <table class="table table-borderless table-ligth">
          <thead>
            <tr>
              <th scope="col">Photo</th>
              <th scope="col">Product Code</th>
              <th scope="col">Product Quantity</th>
              <th scope="col">Product Price</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(item, index) in transaction.items">
              <th scope="row">{{ index+1 }}</th>
              <td>{{ item.product_code }}</td>
              <td>{{ item.product_quantity }}</td>
              <td>&#8369; {{ item.product_price }}.00</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <b>SubTotal:</b>
              </td>
              <td>{{ transaction.amount - transaction.shipping_amount }}.00</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <b>Shipping:</b>
              </td>
              <td>&#8369; {{ transaction.shipping_amount }}</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                <b>Total Amount:</b>
              </td>
              <td>&#8369; {{ transaction.amount }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
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
      transactions: {},
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
    this.getTransaction();
  },
  methods: {
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
        // console.log(response.data);
      });
    },
    getTransaction: async function() {
      await axios.get("/getTransaction/" + this.id).then(response => {
        this.transactions = response.data;
        console.log(response.data);
      });
    }
  }
};
</script>

<style>
.transaction {
  margin-top: 150px;
}
</style>

