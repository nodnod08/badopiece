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
            placeholder="Search.."
          />
        </div>
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
                  <small>Name</small>
                </th>
                <th scope="col">
                  <small>Item(s)</small>
                </th>
                <th scope="col">
                  <small>Rate</small>
                </th>
                <th scope="col">
                  <small>Feedback</small>
                </th>
                <th scope="col">
                  <small>Date</small>
                </th>
              </tr>
            </thead>
            <tbody v-if="feedbacks.data.length != 0">
              <tr v-for="(feedback, index) in feedbacks.data" v-bind:key="index">
                <td>
                  <small>{{ index+1 }}</small>
                </td>
                <td>
                  <small>
                    <a :href="'/perFeedbackView/'+feedback.id">
                      <button :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'" type="button">
                        View Feedback
                        <i class="ti-eye"></i>
                      </button>
                    </a>
                  </small>
                </td>
                <td>
                  <small>{{ feedback.name }}</small>
                </td>
                <td>
                  <small>{{ feedback.item_name+' '+feedback.item_code }}</small>
                </td>
                <td>
                  <small>{{ feedback.rate }} of 5</small>
                </td>
                <td>
                  <small>{{ (feedback.feedback.length > 15) ? "..." : "" }}</small>
                </td>
                <td>
                  <small>{{ month[new Date(feedback.created_at).getMonth()] +' '+new Date(feedback.created_at).getDate()+', '+new Date(feedback.created_at).getFullYear() }}</small>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="8">
                  <small>
                    <b>No feedback found</b>
                  </small>
                </td>
              </tr>
            </tbody>
          </table>
          <pagination
            :limit="1"
            :size="'small'"
            :data="feedbacks"
            @pagination-change-page="getFeedbacks"
          >
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
      feedbacks: {},
      loading: false,
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
    this.getFeedbacks();
  },
  methods: {
    getFeedbacks: async function(page = 1) {
      axios.get("/getFeedbacks?page=" + page).then(response => {
        this.feedbacks = response.data;
        console.log(this.feedbacks);
      });
    },
    search: async function(page = 1) {
      axios
        .get("/getFeedbacks/" + this.searchId + "?page=" + page)
        .then(response => {
          this.feedbacks = response.data;
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

