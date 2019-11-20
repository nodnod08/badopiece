<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div class="container">
      <div class="about row">
        <div class="V col-lg-12 col-md-12 col-sm-12">
          <h4>Badopiece Collection</h4>
          <p>
            Bado came from the Bicolano word which means "clothes". Badopiece collection is an online selling store of clothes.
    We started selling only a ready-to-wear or RTWs clothes but in all good as new condition. Costumers can purchased bulk order and be a reseller of fashion clothes in different design and style that is in every now and then and never been fade when it comes to fashion for a more category to avail. You can now purchased trendy and brand new product and design of bags,dresses,shoes, fashion items like accessories and beauty products that will your fashion wear.
          </p>
        </div>
      </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
export default {
  props: ["auth"],
  data() {
    return {
      cartCount: ""
    };
  },
  created() {
    this.countCart();
  },
  methods: {
    countCart: async function() {
      axios.get("/countCart").then(response => {
        this.cartCount = response.data;
        // console.log(response.data);
      });
    }
  }
};
</script>

<style>
.about {
  margin-top: 100px;
}

.CP,
.FS {
  background: #404040;
  color: #fff;
  padding: 2%;
  margin-bottom: 50px;
}
.M,
.V {
  background: #dcdee2;
  color: #000;
  padding: 2%;
  margin-bottom: 50px;
}
</style>
