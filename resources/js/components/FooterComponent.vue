<template>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <ul>
            <li>
              <h5>Our Team</h5>
            </li>
            <li>
              <i class="fas fa-user"></i> Ms. Emma Argon ( Owner )
            </li>
            <li>
              <i class="fas fa-user"></i> Ms. Trixie Racoma ( Web Developer of this site )
            </li>
            <li>
              <i class="fas fa-user"></i> Ms. Jeanne Paquia ( Web Developer of this site )
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul>
            <li>
              <h5>Contact us</h5>
            </li>
            <li>
              <i class="fas fa-envelope"></i> badopiece.store@gmail.com
            </li>
            <li>
              <i class="fas fa-envelope"></i> badopiece.inquire@gmail.com
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul>
            <li>
              <h5>Locate us</h5>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i> Calamba, Laguna
            </li>
            <li>
              <i class="fas fa-calendar-alt"></i> Store hrs. Monday to Friday ( 8:00 am to 5:00 pm )
            </li>
          </ul>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-6">
          <ul>
            <li>
              <p>© {{ year }} Copyright Badopiece Collection | Clothes and Accessories</p>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul>
            <li>
              <h5 class="text-right">
                <a :href="'https://www.facebook.com/badopiececollection/'">
                  <i class="fab fb-page fa-facebook-square"></i>
                </a>
              </h5>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      email: "",
      year: ""
    };
  },
  created() {
    this.year = new Date().getFullYear();
  }
};
</script>
<style>
.footer {
  padding-top: 20px;
  background: #404040;
  color: #ffffff;
}
li {
  list-style: none;
}
.footer h5 {
  margin-bottom: 10px;
}

.fb-page {
  color: #fff;
}
</style>

