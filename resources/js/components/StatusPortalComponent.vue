<template>
  <div>
    <br />
    <div class="transaction container">
      <div class="row mb-5">
        <div class="col-lg-12 mb-5">
          <h4>
            <b>Transaction ID : {{ transactions[0].transaction_id }}</b>
          </h4>
        </div>
        <div class="col-lg-12">
          <h6>
            <b>Date Created: {{ month[new Date(transactions[0].created_at).getMonth()] +' '+new Date(transactions[0].created_at).getDate()+', '+new Date(transactions[0].created_at).getFullYear() }}</b>
          </h6>
        </div>
        <div class="col-lg-12 mt-4">
          <h6>
            <b>Customer Info</b>
            <br />
            <small>----------------------------------------------------------------------------------</small>
          </h6>
        </div>
        <div class="col-lg-12 mt-2">
          <p>Receiver Name: {{ transactions[0].customer.name }}</p>
          <p>Shipping / Meeting place: {{ transactions[0].shipping.street_address+" "+transactions[0].shipping.city+" "+transactions[0].shipping.state+" "+transactions[0].shipping.country+" "+transactions[0].shipping.postal }}</p>
          <p>Total Amount: &#8369; {{ transactions[0].amount.toLocaleString()+".00" }}</p>
        </div>
        <div class="col-lg-12 mt-3 mb-3">
          <h5>
            <b>Status / Update Status</b>
            <button v-on:click="update2()">update</button>
          </h5>
        </div>
        <div class="col-lg-12">
          <toggle-button
            id="toggle1"
            :width="200"
            :height="50"
            v-on:click="update(1)"
            :value="(statusId == 1) ? true : false"
            :color="'#ffc400'"
            :labels="{checked: 'Preparing Item', unchecked: 'Preparing Item'}"
          />
          <toggle-button
            id="toggle2"
            :width="200"
            :height="50"
            v-on:click="update(2)"
            :value="(statusId == 2) ? true : false"
            :color="'#02f2de'"
            :labels="{checked: 'Ready For Delivery', unchecked: 'Ready For Delivery'}"
          />
          <toggle-button
            id="toggle3"
            :width="200"
            :height="50"
            v-on:click="update(3)"
            :value="(statusId == 3) ? true : false"
            :color="'#247bff'"
            :labels="{checked: 'In Delivery Now', unchecked: 'In Delivery Now'}"
          />
          <toggle-button
            id="toggle4"
            :width="200"
            :height="50"
            v-on:change="update(4)"
            :value="(statusId == 4) ? true : false"
            :color="'#24ff71'"
            :labels="{checked: 'Receiving Item', unchecked: 'Receiving Item'}"
          />
        </div>
        <hr />
      </div>
    </div>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";
import ToggleButton from "vue-js-toggle-button";

Vue.use(ToggleButton);
export default {
  props: ["id"],
  components: {
    RadarSpinner
  },
  watch: {
    statusId: function(newVal, oldVal) {
      this.statusId = newVal;
    }
  },
  data() {
    return {
      loading: true,
      statusId: 0,
      cartCount: "",
      transactions: {},
      logo: "",
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
  async created() {
    await this.getTransaction();
  },
  methods: {
    getTransaction: async function() {
      await axios.get("/getTransactionInfo/" + this.id).then(response => {
        this.transactions = response.data;
        this.statusId = this.transactions[0].item_status.id;
        console.log(response.data);
      });
    },
    getTransaction2: async function() {
      await axios.get("/getTransactionInfo/21").then(response => {
        this.transactions = response.data;
        this.statusId = this.transactions[0].item_status.id;
        console.log(response.data);
      });
    },
    update: async function(id) {
      swal({
        title: "You're about to change the status",
        text: "Would you like to proceed to change this status?",
        icon: "info",
        buttons: true,
        dangerMode: true,
        closeOnClickOutside: false
      }).then(willUpdate => {
        if (willUpdate) {
          this.getTransaction2();
        }
      });
    },
    update2: async function() {
      this.statusId = 2;
    }
  }
};
</script>

<style>
.transaction {
  font-size: 15px;
}
</style>

