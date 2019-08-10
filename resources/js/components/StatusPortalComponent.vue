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
          </h5>
        </div>
        <div class="col-lg-12">
          <!-- <toggle-button
            id="toggle1"
            :width="200"
            :height="50"
            v-on:click="update(1)"
            :value="(transactions[0].item_status.id == 1) ? true : false"
            :color="'#ffc400'"
            :labels="{checked: 'Preparing Item', unchecked: 'Preparing Item'}"
          />
          <toggle-button
            id="toggle2"
            :width="200"
            :height="50"
            v-on:click="update(2)"
            :value="(transactions[0].item_status.id == 2) ? true : false"
            :color="'#02f2de'"
            :labels="{checked: 'Ready For Delivery', unchecked: 'Ready For Delivery'}"
          />
          <toggle-button
            id="toggle3"
            :width="200"
            :height="50"
            v-on:click="update(3)"
            :value="(transactions[0].item_status.id == 3) ? true : false"
            :color="'#247bff'"
            :labels="{checked: 'In Delivery Now', unchecked: 'In Delivery Now'}"
          />
          <toggle-button
            id="toggle4"
            :width="200"
            :height="50"
            v-on:change="update(4)"
            :value="(transactions[0].item_status.id == 4) ? true : false"
            :color="'#24ff71'"
            :labels="{checked: 'Receiving Item', unchecked: 'Receiving Item'}"
          />-->
          <switches
            width="250"
            v-model="status1"
            label="Preparing Item"
            color="green"
            @input="updateStatus(1)"
            :emit-on-mount="false"
          ></switches>
          <br />
          <switches
            width="250"
            v-model="status2"
            label="Ready For Delivery"
            color="green"
            @input="updateStatus(2)"
            :emit-on-mount="false"
          ></switches>
          <br />
          <switches
            width="250"
            v-model="status3"
            label="In Delivery Now"
            color="green"
            @input="updateStatus(3)"
            :emit-on-mount="false"
          ></switches>
          <br />
          <switches
            width="250"
            v-model="status4"
            label="Receiving Item"
            color="green"
            @input="updateStatus(4)"
            :emit-on-mount="false"
          ></switches>
        </div>
        <hr />
      </div>
    </div>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";
import Switches from "vue-switches";
export default {
  props: ["id"],
  components: {
    RadarSpinner,
    Switches
  },
  watch: {
    transactions: function(newVal, oldVal) {
      this.transactions = newVal;
    }
  },
  data() {
    return {
      loading: true,
      cartCount: "",
      transactions: {},
      enabled: true,
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
      ],
      status1: false,
      status2: false,
      status3: false,
      status4: false
    };
  },
  async created() {
    await this.getTransaction();
  },
  methods: {
    getTransaction: async function() {
      await axios.get("/getTransactionInfo/" + this.id).then(response => {
        this.transactions = response.data;
        this.status1 = this.transactions[0].item_status.id == 1 ? true : false;
        this.status2 = this.transactions[0].item_status.id == 2 ? true : false;
        this.status3 = this.transactions[0].item_status.id == 3 ? true : false;
        this.status4 = this.transactions[0].item_status.id == 4 ? true : false;
      });
    },
    updateStatus: async function(id) {
      var check = null;
      if (id == 1) {
        check = this.status1;
      } else if (id == 2) {
        check = this.status2;
      } else if (id == 3) {
        check = this.status3;
      } else {
        check = this.status4;
      }
      if (check === true) {
        swal({
          title: "You're about to change the status",
          text: "Would you like to proceed to change this status?",
          icon: "info",
          buttons: true,
          dangerMode: true,
          closeOnClickOutside: false
        }).then(willUpdate => {
          if (willUpdate) {
            axios
              .get("/updateNow/" + this.transactions[0].id + "/" + id)
              .then(response => {
                this.transactions = response.data;
                this.getTransaction();
                swal("", "Status has been updated.", "success");
              });
            console.log(response.data);
          }
        });
      }
    }
  }
};
</script>

<style>
.transaction {
  font-size: 15px;
}
</style>

