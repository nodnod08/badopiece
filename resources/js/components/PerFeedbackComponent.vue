<template>
  <div>
    <br />
    <div class="transaction container">
      <div class="row mb-3">
        <div class="col-lg-12 mb-3">
          <h4>Feedback</h4>
        </div>
        <div class="col-lg-12">
          <img :src="'/storage/img/offer-img/'+feedback[0].item_photo" height="200" alt />
          <p>{{ feedback[0].item_name+" "+feedback[0].item_code }}</p>
        </div>
        <div class="col-lg-12">
          <h6>
            <b>Rating</b>
          </h6>
          <star-rating
            v-bind:increment="0.5"
            v-bind:max-rating="5"
            inactive-color="#c2c2c2"
            active-color="#ffe330"
            v-bind:star-size="25"
            v-model="feedback[0].rate"
            :read-only="true"
            :show-rating="false"
          ></star-rating>
          <h6 class="mt-4">
            <b>Feedback</b>
          </h6>
          <p>{{ feedback[0].feedback }}</p>
          <h6 class="mt-4">
            <b>By:</b>
          </h6>
          <p>{{ feedback[0].name }}</p>
          <small>
            <b>Date:</b>
            {{ month[new Date(feedback[0].created_at).getMonth()] +' '+new Date(feedback[0].created_at).getDate()+', '+new Date(feedback[0].created_at).getFullYear() }}
          </small>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";
import StarRating from "vue-star-rating";
Vue.component("star-rating", StarRating);
export default {
  props: ["id", "auth", "payment"],
  components: {
    RadarSpinner
  },
  data() {
    return {
      loading: true,
      cartCount: "",
      feedback: {},
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
      base_64: ""
    };
  },
  async created() {
    // this.countCart();
    await this.getFeedback();
  },
  methods: {
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
      });
    },
    getFeedback: async function() {
      await axios.get("/perFeedback/" + this.id).then(response => {
        this.feedback = response.data;
        console.log(response.data);
      });
    }
  }
};
</script>

<style>
.transaction {
  font-size: 15px;
}
</style>

