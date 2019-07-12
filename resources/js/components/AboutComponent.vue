<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div class="container">
      <div class="about row">
        <div class="CP col-lg-12 col-md-12 col-sm-12">
          <h4>Company Profile</h4>
          <p>Pro Prints Enterprise is generally a printer and printer consumables provider and reseller. We deliver a strategic solutions that will facilitate our client’s optimal balance between cost, quality, and productivity. The company concentrates on selling Brand New Alternative Toners which are compatible with the various models of Brother, HP, Samsung and Canon LaserJet Printers. It also offers Free Use of LaserJet printers for those clients who want to save on budget for their printer expenditures. Further, the company provides free repair and maintenance for clients owned and out of warranty LaserJet printers. We have develop and implement a system that listens and adopt the customer’s need. With our experience in management, we are providing superior quality, the most competitive price and the best after sales service in the market now a days. At Pro Prints Enterprise we innovate products thru consumer satisfaction, market demands and environmental concerns. We always driven our desire to give a good quality and affordable product to our valued clients and consumers. Pro Prints Enterprise was founded by a group of young and visionary professionals with strong belief that the continuous innovation is the keystone toward better living. The backbone of the company is a well knowledgeable in LaserJet Printers, Digital Marketing Expert and Sales and Marketing Enthusiast who participate their profession for more than 7 years. We aim to be one of the most trusted leading supplier and remanufacturer in our industry.</p>
        </div>
        <div class="M col-lg-6 col-md-6 col-sm-12">
          <h4>MISSION</h4>
          <p>Provide customers with high quality products and expertise to express their ideas and promote brand new alternative toner Cartridges.</p>
        </div>
        <div class="V col-lg-6 col-md-6 col-sm-12">
          <h4>VISION</h4>
          <p>Our vision is to become the country's largest provider of quality remanufactured and brand new compatible toner cartridges.</p>
        </div>
        <div class="FS col-lg-12">
          <h4>Facilities and Safety on Work Place</h4>
          <p>1. Take care in using facilities and equipment. It is in good form to handle them with care and use them solely on their purpose.</p>
          <p>2. Only use equipments that you already know how to use. Do not handle it until such time the teacher gives instructions on how to operate the said equipment. You could break the equipment or cause harm to yourself or others.</p>
          <p>3. Be Alert and Aware.</p>
          <p>4. In performing exercises and movement in general, practice good form first. Doing exercises in improper form deficit it's benefits.</p>
          <p>5. Bring back all equipment in place after use. This is to prevent having them misplaced, stolen or become unnecessary clutters in the repair area than can cause accidents.</p>
          <p>6. Do not monopolize the equipments. Allow everyone a fair use of the facilities. Presence of mind could help avoid accidents.</p>
          <p>7. Return the equipment properly or leave the venue clean. Do not leave or pass on equipments that is in complete disarray or dirty.</p>
          <p>8. Check Yourself - practice proper hygiene and care. Take a bath or a deodorant if needed. Do not force yourself to engage in work if you are feeling sick.</p>
          <p>9. Do not loiter around the repair area or hang on the equipment doing nothing.</p>
          <p>10. Be nice, as a general rule!</p>
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
