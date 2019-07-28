<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div class="container">
      <div class="about row">
        <div class="CP col-lg-12 col-md-12 col-sm-12">
          <h4>Company Profile</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="M col-lg-6 col-md-6 col-sm-12">
          <h4>MISSION</h4>
          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo</p>
        </div>
        <div class="V col-lg-6 col-md-6 col-sm-12">
          <h4>VISION</h4>
          <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>
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
