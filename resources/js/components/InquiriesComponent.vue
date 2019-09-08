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
                  <small>Email</small>
                </th>
                <th scope="col">
                  <small>Message</small>
                </th>
                <th scope="col">
                  <small>Date</small>
                </th>
              </tr>
            </thead>
            <tbody v-if="inquiries.data.length != 0">
              <tr v-for="(inquiry, index) in inquiries.data" v-bind:key="index">
                <td>
                  <small>{{ index+1 }}</small>
                </td>
                <td>
                  <small>
                    <a :href="'/perInquiryView/'+inquiry.id">
                      <button :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'" type="button">
                        View Inquiry
                        <i class="ti-eye"></i>
                      </button>
                    </a>
                  </small>
                </td>
                <td>
                  <small>{{ inquiry.fullname }}</small>
                </td>
                <td>
                  <small>{{ inquiry.email }}</small>
                </td>
                <td>
                  <small>{{ (inquiry.message.length > 15) ? "..." : "" }}</small>
                </td>
                <td>
                  <small>{{ month[new Date(inquiry.created_at).getMonth()] +' '+new Date(inquiry.created_at).getDate()+', '+new Date(inquiry.created_at).getFullYear() }}</small>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="8">
                  <small>
                    <b>No Inquiries found</b>
                  </small>
                </td>
              </tr>
            </tbody>
          </table>
          <pagination
            :limit="1"
            :size="'small'"
            :data="inquiries"
            @pagination-change-page="getInquiries"
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
      inquiries: {},
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
    this.getInquiries();
  },
  methods: {
    getInquiries: async function(page = 1) {
      axios.get("/getInquiries?page=" + page).then(response => {
        this.inquiries = response.data;
        console.log(this.inquiries);
      });
    },
    search: async function(page = 1) {
      axios
        .get("/getInquiries/" + this.searchId + "?page=" + page)
        .then(response => {
          this.inquiries = response.data;
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

