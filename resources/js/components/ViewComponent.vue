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
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <br />
          <br />
          <label>Product Name :</label>
          <span>{{ item.product_name }}</span>
          <br />
          <br />
          <label>Product Code :</label>
          <span>{{ item.product_code }}</span>
          <br />
          <br />
          <label>Product Price :</label>
          <span>{{ item.product_price }}.00</span>
          <br />
          <br />
          <label>Product Size :</label>
          <span>{{ item.product_size }}</span>
          <br />
          <br />
          <label>Product Category :</label>
          <span>{{ item.product_category }}</span>
          <br />
          <br />
          <label>Product Stocks :</label>
          <span>{{ item.product_stocks }}</span>
          <br />
          <br />
          <label>Product Description:</label>
          <span>{{ item.product_desc }}</span>
          <br />
          <br />
          <label>Product Date Uploaded :</label>
          <span>{{ item.product_date }}</span>
          <br />
        </div>
      </div>
      <br />
      <br />
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
import vZoom from "vue-zoom";
import { RadarSpinner } from "epic-spinners";
export default {
  props: ["id", "type", "auth"],
  components: {
    vZoom,
    RadarSpinner
  },
  data() {
    return {
      Items: {},
      loading: true,
      cartCount: ""
    };
  },
  created() {
    this.getItem();
    this.countCart();
  },
  methods: {
    getItem: async function() {
      // this.loading = true;

      var url = "/getItem/" + this.type + "/" + this.id;
      await axios.get(url).then(response => {
        this.Items = response.data;
        // console.log(this.Items);
      });

      this.loading = false;
    },
    countCart: async function() {
      axios.get("countCart").then(response => {
        this.cartCount = response.data;
        // console.log(response.data);
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
</style>

