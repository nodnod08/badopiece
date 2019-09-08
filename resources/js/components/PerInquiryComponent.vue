<template>
  <div>
    <br />
    <div class="transaction container">
      <div class="row mb-3">
        <div class="col-lg-12 mb-3">
          <h4>Inquiry or Message</h4>
        </div>
        <div class="col-lg-12">
          <h6 class="mt-4">
            <b>Message</b>
          </h6>
          <p>{{ inquiry[0].message }}</p>
          <h6 class="mt-4">
            <b>Name:</b>
          </h6>
          <p>{{ inquiry[0].fullname }}</p>
          <h6 class="mt-4">
            <b>Email:</b>
          </h6>
          <p>{{ inquiry[0].email }}</p>
          <small>
            <b>Date:</b>
            {{ month[new Date(inquiry[0].created_at).getMonth()] +' '+new Date(inquiry[0].created_at).getDate()+', '+new Date(inquiry[0].created_at).getFullYear() }}
          </small>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-lg-12 mb-3">
          <h4>Reply to his/her Message</h4>
        </div>
        <div class="col-lg-12">
          <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  props: ["id", "auth", "payment"],
  components: {
    RadarSpinner
  },
  data() {
    return {
      loading: true,
      cartCount: "",
      inquiry: {},
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
      base_64: "",
      editor: ClassicEditor,
      editorData: "<p>Enter message.</p>",
      editorConfig: {
        // The configuration of the rich-text editor.
      }
    };
  },
  async created() {
    // this.countCart();
    await this.getInquiry();
  },
  methods: {
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
      });
    },
    getInquiry: async function() {
      await axios.get("/perInquiry/" + this.id).then(response => {
        this.inquiry = response.data;
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

