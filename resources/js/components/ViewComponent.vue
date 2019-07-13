<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#18ffff" />
      </div>
    </div>
    <div class="view container">
      <div v-for="item in Items" v-bind:key="item.product_id" class="row">
        <div class="img_zoom col-lg-6 col-md-6 col-sm-12">
          <v-zoom
            class="responsive-img"
            :img="'/storage/img/offer-img/'+item.product_photo"
            :height="400"
            :width="300"
          ></v-zoom>
          <br />
          <div class="row">
            <div class="col-lg-12">
              <button
                v-on:click="addToCart(item.product_id)"
                class="mt-3 mb-3 text-center btn btn-outline-dark btn-sm"
              >
                Add to Cart
                <i class="fas fa-cart-plus"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <label>Product Name :</label>
          <span>
            <b>{{ item.product_name }}</b>
          </span>
          <br />
          <br />
          <label>Product Code :</label>
          <span>
            <b>{{ item.product_code }}</b>
          </span>
          <br />
          <br />
          <label>Product Price :</label>
          <span>
            <b>&#8369; {{ item.product_price }}.00</b>
          </span>
          <br />
          <br />
          <label>Product Size :</label>
          <span>
            <b>{{ item.product_size }}</b>
          </span>
          <br />
          <br />
          <label>Product Category :</label>
          <span>
            <b>{{ item.category.category }}</b>
          </span>
          <br />
          <br />
          <label>Product Stocks :</label>
          <span>
            <b>{{ item.product_stocks }}</b>
          </span>
          <br />
          <br />
          <label>Product Description:</label>
          <span>
            <b>{{ item.product_desc }}</b>
          </span>
          <br />
          <br />
          <label>Product Date Uploaded :</label>
          <span>
            <b>{{ month[new Date(item.product_date).getMonth() - 1] +' '+new Date(item.product_date).getDate()+', '+new Date(item.product_date).getFullYear() }}</b>
          </span>
          <br />
        </div>
      </div>
      <br />
      <br />
    </div>
    <div class="mb-5 review container">
      <h4>Item Reviews</h4>
      <hr />
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h6>
            <b>John Doe</b>
          </h6>
          <small>December 25, 2018</small>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, sint aliquam? Mollitia, quia adipisci corrupti harum saepe officiis explicabo deleniti cupiditate est, veniam modi excepturi magni culpa totam, magnam soluta.</p>
        </div>
      </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
import vZoom from "vue-zoom";
import { RadarSpinner } from "epic-spinners";

export default {
  props: ["tosearch", "type", "auth"],
  components: {
    vZoom,
    RadarSpinner
  },
  data() {
    return {
      Items: {},
      loading: true,
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
    this.getItem();
    this.countCart();
  },
  methods: {
    getItem: async function() {
      // this.loading = true;

      var url = "/getItem/" + this.type + "/" + this.tosearch;
      await axios.get(url).then(response => {
        this.Items = response.data;
      });

      this.loading = false;
    },
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
        // console.log(response.data);
      });
    },
    addToCart: async function(id) {
      this.loading = true;
      let options = {
        html: false,
        loader: false,
        reverse: false,
        okText: "Continue",
        cancelText: "Close",
        animation: "zoom",
        type: "basic",
        verification: "continue",
        verificationHelp: 'Type "[+:verification]" below to confirm',
        clicksCount: 3,
        backdropClose: true,
        customClass: ""
      };
      await axios
        .post("/add", {
          id: id
        })
        .then(response => {
          if (response.data == "already") {
            this.loading = false;
            this.$dialog
              .alert("Item is already in your cart", options)
              .then(function(dialog) {
                // console.log("Closed");
              });
          } else {
            this.loading = false;
            this.cartCount = response.data;
          }
        });
    }
  }
};
</script>

<style>
.view {
  margin-top: 150px;
}
.responsive-img {
  border: 1px solid #404040;
}
.responsive-img:hover {
  cursor: zoom-in;
}
</style>

